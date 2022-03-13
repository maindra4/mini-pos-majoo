<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
  use SoftDeletes;
	
	protected $table = 'transactions';
	protected $guarded = [];
	public $incrementing = true;
	public $timestamps = true;

	public function detail() {
		return $this->hasMany('App\TransactionDetail', 'transaction_id');
	}

	public function customer() {
		return $this->belongsTo('App\Pelanggan', 'customer_id');
	}

	static function getDataTransaction() {
		$trx = Transaction::with(['detail', 'customer'])->get();
		
		$result = [];
		$result['data'] = [];
		foreach($trx as $row) {
			$item = [
				"id" => $row->id,
				"name" => $row->customer->customer_name,
				"date" => date("d F Y", strtotime($row->transaction_date)),
				"total_selling" => "Rp. ".number_format($row->total_price),
				"total_item" => $row->detail->sum('quantity'),
				"status" => $row->transaction_status
			];

			array_push($result['data'], $item);
		}

		$result['draw'] = 1;
		$result['recordsTotal'] = count($trx);
		$result['recordsFiltered'] = count($trx);

		return $result;
	}
}
