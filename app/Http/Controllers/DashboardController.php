<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
	public function index() {
		$data = [
			"active_menu" => 'dashboard',
			"title" => 'Dashboard',
		];
		
		return view('dashboard', $data);
	}
}
