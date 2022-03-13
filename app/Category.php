<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
	use SoftDeletes;
	
	protected $table = 'categories';
	protected $guarded = [];
	public $incrementing = true;
	public $timestamps = true;

	static function getDataCategory($id = null) {
		if($id == null) {
			$category = Category::all();

			$result = [];
			$result['data'] = [];
			foreach($category as $row) {
				$item = [
					"id" => $row->id,
					"category_name" => $row->category_name
				];

				array_push($result['data'], $item);
			}

			$result['draw'] = 1;
			$result['recordsTotal'] = count($category);
			$result['recordsFiltered'] = count($category);
		} else {
			$result = Category::find($id);
		}
		
		return $result;
	}
}
