<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Pelanggan;
use App\Transaction;
use App\TransactionDetail;

class FrontpageController extends Controller
{
	public function index() {
		$product = Product::getDataProduct();

		$data = [
			"product" => $product
		];
		
		return view('frontpage.index', $data);
	}

	public function checkout($id) {
		$product = Product::getDataProduct($id);

		$data = [
			"product" => $product
		];
		return view('frontpage.checkout', $data);
	}

	public function checkoutProcess(Request $request) {
		if($request->post('total') > $request->post('pay')) {
			return redirect('/checkout/'.$request->post('product_id'))->with('error', 'Insufficient money');
		} else {
			$validate = $request->validate([
				'name' => 'required',
				'phone' => 'required',
				'address' => 'required',
				'pay' => 'required|numeric'
			]);

			try {
				DB::beginTransaction();

				$pelanggan = Pelanggan::create([
					"customer_name" => $request->post('name'),
					"customer_phone" => $request->post('phone'),
					"customer_address" => $request->post('address')
				]);

				$transaction = Transaction::create([
					"customer_id" => $pelanggan->id,
					"transaction_date" => date("Y-m-d"),
					"total_price" => $request->post('total'),
					"transaction_status" => "success"
				]);

				$transaction_detail = TransactionDetail::create([
					"transaction_id" => $transaction->id,
					"product_id" => $request->post('product_id'),
					"quantity" => $request->post('quantity'),
					"subtotal" => $request->post('total')
				]);

				if($pelanggan && $transaction && $transaction_detail) {
					// pengurangan stock
					$product = Product::find($request->post('product_id'));
					$product->stock -= $request->post('quantity');
					$product->save();

					DB::commit();
					return redirect('/')->with('success', 'Checkout success');
				}
			} catch(Exception $e) {
				DB::rollback();
				return redirect('/checkout/'.$request->post('product_id'))->with('error', 'Checkout failed');
			}
		}
		
	}
}
