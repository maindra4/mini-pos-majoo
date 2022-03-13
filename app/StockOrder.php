<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockOrder extends Model
{
    use SoftDeletes;
    
    protected $table = 'stock_order';
    protected $guarded = [];
    public $incrementing = true;
    public $timestamps = true;

    public function detail() {
		return $this->hasMany('App\StockOrderDetail', 'stock_order_id');
	}

	public function supplier() {
		return $this->belongsTo('App\Supplier', 'supplier_id');
	}

    static function getDataStockOrder() {
		$trx = StockOrder::with(['detail', 'supplier'])->get();
		
		$result = [];
		$result['data'] = [];
		foreach($trx as $row) {
			$item = [
				"id" => $row->id,
				"supplier" => $row->supplier->supplier_name,
				"date" => date("d F Y", strtotime($row->stock_order_date)),
				"total_buying" => "Rp. ".number_format($row->pay),
				"total_item" => $row->detail->sum('quantity'),
				"status" => $row->stock_order_status
			];

			array_push($result['data'], $item);
		}

		$result['draw'] = 1;
		$result['recordsTotal'] = count($trx);
		$result['recordsFiltered'] = count($trx);

		return $result;
	}
}
