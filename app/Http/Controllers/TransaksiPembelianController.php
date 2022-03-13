<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StockOrder;

class TransaksiPembelianController extends Controller
{
    public function index() {
		$data = [
			"active_menu" => 'transaksi_pembelian',
			"title" => 'Transaksi Pembelian'
		];

		return view('transaksi_pembelian.index', $data);
	}

	public function get_data() {
		return StockOrder::getDataStockOrder();
	}
}
