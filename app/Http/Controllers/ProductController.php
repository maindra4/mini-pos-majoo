<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;

class ProductController extends Controller
{
	public function index() {
		$data = [
			"active_menu" => 'product',
			"title" => 'Product'
		];

		return view('product.index', $data);
	}

	public function detail($id) {
		$data = [
			"active_menu" => 'product',
			"title" => 'Detail Product',
			"product" => Product::getDataProduct($id)
		];

		return view('product.detail', $data);
	}

	public function addView() {
		$data = [
			"active_menu" => 'product',
			"title" => 'Add Product',
			"category" => Category::getDataCategory()
		];

		return view('product.add', $data);
	}

	public function add(Request $request) {
		$validate = $request->validate([
			'product_name' => 'required|max:30|unique:products',
			'category_id' => 'required',
			'description' => 'required',
			'price_sell' => 'required|numeric',
			'price_buy' => 'required|numeric',
			'stock' => 'required|numeric',
			'product_image' => 'image|file'
		]);

		try {
			DB::beginTransaction();

			if($request->file('product_image')) {
				$validate['product_image'] = $request->file('product_image')->store('product');
			}

			$validate['product_status'] = $request->post('product_status');

			$product = Product::create($validate);

			if($product) {
				DB::commit();
				return redirect('/product')->with('success', 'New product has been added');
			}
		} catch(Exception $e) {
			DB::rollback();
			return redirect('/product')->with('error', 'Add product error');
		}
	}

	public function updateView($id) {
		$data = [
			"active_menu" => 'product',
			"title" => 'Update Product',
			"product" => Product::getDataProduct($id),
			"category" => Category::getDataCategory()
		];

		return view('product.update', $data);
	}

	public function update(Request $request, $id) {
		$rules = [
			'category_id' => 'required',
			'description' => 'required',
			'price_sell' => 'required|numeric',
			'price_buy' => 'required|numeric',
			'stock' => 'required|numeric',
		];

		try {
			DB::beginTransaction();

			$check_product = Product::find($id);
			if($check_product->product_name != $request->product_name) {
				$rules['product_name'] = 'required|unique:products';
			}
			$validateData = $request->validate($rules);

			if($request->file('product_image')) {
				$validateData['product_image'] = $request->file('product_image')->store('product');
			}

			$validateData['product_status'] = $request->post('product_status');

			$update_product = Product::find($id)->update($validateData);

			if($update_product) {
				DB::commit();
				return redirect('/product')->with('success', 'Update product has been success');
			}
		} catch(Exception $e) {
			DB::rollback();
			return redirect('/product')->with('error', 'Update product error');
		}
	}

	public function delete($id) {
		$delete_product = Product::find($id)->delete();
		if($delete_product) {
			$response = [
				"status" => true,
				"message" => 'Delete product has been success'
			];
		} else {
			$response = [
				"status" => false,
				"message" => 'Delete product error'
			];
		}
		
		echo json_encode($response);
	}

	public function getDataProduct() {
		return Product::getDataProduct();
	}
}
