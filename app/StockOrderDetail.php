<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockOrderDetail extends Model
{
    use SoftDeletes;
    
    protected $table = 'detail_stock_order';
    protected $guarded = [];
    public $incrementing = true;
    public $timestamps = true;

	public function stock_order() {
		return $this->belongsTo('App\StockOrder', 'stock_order_id');
	}
}
