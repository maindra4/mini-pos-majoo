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
					"stock" => $row->stock
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
}
