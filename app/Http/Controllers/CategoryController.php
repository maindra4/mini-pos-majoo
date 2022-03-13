<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;

class CategoryController extends Controller
{
	public function index() {
		$data = [
			"active_menu" => 'category',
			"title" => 'Category'
		];

		return view('category.index', $data);
	}

	public function addView() {
		$data = [
			"active_menu" => 'category',
			"title" => 'Category'
		];

		return view('category.add', $data);
	}

	public function add(Request $request) {
		$validate = $request->validate([
			'category_name' => 'required|max:20|unique:categories',
		]);

		try {
			DB::beginTransaction();

			$product = Category::create($validate);

			if($product) {
				DB::commit();
				return redirect('/category')->with('success', 'New category has been added');
			}
		} catch(Exception $e) {
			DB::rollback();
			return redirect('/category')->with('error', 'Add category error');
		}
	}

	public function updateView($id) {
		$data = [
			"active_menu" => 'category',
			"title" => 'Update Category',
			"category" => Category::getDataCategory($id)
		];

		return view('category.update', $data);
	}

	public function update(Request $request, $id) {
		$rules = [];

		try {
			DB::beginTransaction();

			$check_category = Category::find($id);
			if($check_category->category_name != $request->category_name) {
				$rules['category_name'] = 'required|unique:categories';
			}
			$validateData = $request->validate($rules);

			$update_category = Category::find($id)->update($validateData);

			if($update_category) {
				DB::commit();
				return redirect('/category')->with('success', 'Update category has been success');
			}
		} catch(Exception $e) {
			DB::rollback();
			return redirect('/category')->with('error', 'Update category error');
		}
	}

	public function delete($id) {
		$delete_category = Category::find($id)->delete();
		if($delete_category) {
			$response = [
				"status" => true,
				"message" => 'Delete category has been success'
			];
		} else {
			$response = [
				"status" => false,
				"message" => 'Delete category error'
			];
		}
		
		echo json_encode($response);
	}

	public function getDataCategory() {
		return Category::getDataCategory();
	}
}
