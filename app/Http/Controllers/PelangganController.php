<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;

class PelangganController extends Controller
{
	public function index() {
		$data = [
			"active_menu" => 'pelanggan',
			"title" => 'Pelanggan'
		];

		return view('pelanggan.index', $data);
	}

	public function detail($id) {}
	
	public function delete($id) {}

	public function getDataPelanggan() {
		return Pelanggan::getDataPelanggan();
	}
}
