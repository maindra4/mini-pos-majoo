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
}
