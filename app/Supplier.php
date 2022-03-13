<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
	use SoftDeletes;
	
	protected $table = 'suppliers';
	protected $guarded = [];
	public $incrementing = true;
	public $timestamps = true;

	static function getDataSupplier($id = null) {
		if($id == null) {
			$supplier = Supplier::all();
			
			$result = [];
			$result['data'] = [];
			foreach($supplier as $row) {
				$item = [
					"id" => $row->id,
					"name" => $row->supplier_name,
					"address" => $row->supplier_address,
					"created_at" => date("d F Y", strtotime($row->created_at))
				];

				array_push($result['data'], $item);
			}

			$result['draw'] = 1;
			$result['recordsTotal'] = count($supplier);
			$result['recordsFiltered'] = count($supplier);
		} else {
			$result = Supplier::find($id);
		}

		return $result;
	}
}
