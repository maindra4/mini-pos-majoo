<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pelanggan extends Model
{
	use SoftDeletes;
	
	protected $table = 'customers';
	protected $guarded = [];
	public $incrementing = true;
	public $timestamps = true;

	static function getDataPelanggan($id = null) {
		if($id == null) {
			$pelanggan = Pelanggan::all();
			
			$result = [];
			$result['data'] = [];
			foreach($pelanggan as $row) {
				$item = [
					"id" => $row->id,
					"name" => $row->customer_name,
					"phone" => $row->customer_phone,
					"address" => $row->customer_address,
				];

				array_push($result['data'], $item);
			}

			$result['draw'] = 1;
			$result['recordsTotal'] = count($pelanggan);
			$result['recordsFiltered'] = count($pelanggan);
		} else {
			$result = Pelanggan::find($id);
		}

		return $result;
	}
}
