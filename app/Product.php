<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	use SoftDeletes;
	
	protected $table = 'products';
	protected $guarded = [];
	public $incrementing = true;
	public $timestamps = true;

	public function category() {
		return $this->belongsTo('App\Category', 'category_id');
	}

	public function transaction() {
		return $this->hasMany('App\TransactionDetail', 'product_id');
	}

	public function stock_order() {
		return $this->hasMany('App\StockOrderDetail', 'product_id');
	}

	static function getDataProduct($id = null) {
		if($id == null) {
			$product = Product::with(['category'])->get();
			
			$result = [];
			$result['data'] = [];
			foreach($product as $row) {
				$item = [
					"id" => $row->id,
					"name" => $row->product_name,
					"category" => $row->category->category_name,
					"description" => $row->description,
					"price_sell" => "Rp. ".number_format($row->price_sell),
					"price_buy" => "Rp. ".number_format($row->price_buy),
					"stock" => $row->stock,
					"image" => url('storage/'.$row->product_image)
				];

				array_push($result['data'], $item);
			}

			$result['draw'] = 1;
			$result['recordsTotal'] = count($product);
			$result['recordsFiltered'] = count($product);
		} else {
			$result = Product::with(['category'])->find($id);
		}

		return $result;
	}

	static function getDataTransaction($id) {
		$product = Product::with(['transaction.transaction.customer'])->find($id);

		$result = [];
		$result['data'] = [];
		foreach($product->transaction as $row) {
			$customer = $row->transaction->customer;

			$item = [
				"date" => date("d F Y", strtotime($row->transaction->transaction_date)),
				"customer_name" => $customer->customer_name,
				"quantity" => $row->quantity,
				"total" => "Rp. ".number_format($row->subtotal)
			];

			array_push($result['data'], $item);
		}

		$result['draw'] = 1;
		$result['recordsTotal'] = count($product->transaction);
		$result['recordsFiltered'] = count($product->transaction);

		return $result;
	}

	static function getDataStockDiary($id) {
		$product = Product::with(['stock_order.stock_order.supplier'])->find($id);

		$result = [];
		$result['data'] = [];
		foreach($product->stock_order as $row) {
			$supplier = $row->stock_order->supplier;

			$item = [
				"date" => date("d F Y", strtotime($row->stock_order->stock_order_date)),
				"supplier_name" => $supplier->supplier_name,
				"quantity" => $row->quantity,
				"total" => "Rp. ".number_format($row->subtotal)
			];

			array_push($result['data'], $item);
		}

		$result['draw'] = 1;
		$result['recordsTotal'] = count($product->stock_order);
		$result['recordsFiltered'] = count($product->stock_order);

		return $result;
	}
}
