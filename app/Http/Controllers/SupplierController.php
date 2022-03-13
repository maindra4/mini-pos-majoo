<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Supplier;

class SupplierController extends Controller
{
	public function index() {
		$data = [
			"active_menu" => 'supplier',
			"title" => 'Supplier'
		];

		return view('supplier.index', $data);
	}

	public function addView() {
		$data = [
			"active_menu" => 'supplier',
			"title" => 'Add Supplier'
		];

		return view('supplier.add', $data);
	}

	public function add(Request $request) {
		$validate = $request->validate([
			'supplier_name' => 'required|max:30|unique:suppliers',
			'supplier_address' => 'required',
		]);

		try {
			DB::beginTransaction();
			
			$supplier = Supplier::create($validate);

			if($supplier) {
				DB::commit();
				return redirect('/supplier')->with('success', 'New supplier has been added');
			}
		} catch(Exception $e) {
			DB::rollback();
			return redirect('/supplier')->with('error', 'Add supplier error');
		}
	}

	public function updateView($id) {
		$data = [
			"active_menu" => 'supplier',
			"title" => 'Add Supplier',
			"supplier" => Supplier::getDataSupplier($id)
		];

		return view('supplier.update', $data);
	}

	public function update(Request $request, $id) {
		$rules = [
			'supplier_address' => 'required',
		];

		try {
			DB::beginTransaction();

			$check_supplier = Supplier::find($id);
			if($check_supplier->supplier_name != $request->supplier_name) {
				$rules['supplier_name'] = 'required|unique:suppliers';
			}
			$validateData = $request->validate($rules);

			$update_suppliers = Supplier::find($id)->update($validateData);

			if($update_suppliers) {
				DB::commit();
				return redirect('/supplier')->with('success', 'Update suppliers has been success');
			}
		} catch(Exception $e) {
			DB::rollback();
			return redirect('/supplier')->with('error', 'Update suppliers error');
		}
	}

	public function delete($id) {
		$delete_suppliers = Supplier::find($id)->delete();
		if($delete_suppliers) {
			$response = [
				"status" => true,
				"message" => 'Delete suppliers has been success'
			];
		} else {
			$response = [
				"status" => false,
				"message" => 'Delete suppliers error'
			];
		}
		
		echo json_encode($response);
	}

	public function getDataSupplier() {
		return Supplier::getDataSupplier();
	}
}
