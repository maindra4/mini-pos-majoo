<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class TransaksiPenjualanController extends Controller
{
	public function index() {
		$data = [
			"active_menu" => 'transaksi_penjualan',
			"title" => 'Transaksi Penjualan'
		];

		return view('transaksi_penjualan.index', $data);
	}

	public function get_data() {
		return Transaction::getDataTransaction();
	}
}
