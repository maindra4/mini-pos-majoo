<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
  use SoftDeletes;
	
	protected $table = 'detail_transaction';
	protected $guarded = [];
	public $incrementing = true;
	public $timestamps = true;
}
