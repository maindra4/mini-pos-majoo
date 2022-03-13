<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
	public function index() {
		$data = [
			"active_menu" => 'user',
			"title" => 'User'
		];

		return view('user.index', $data);
	}

	public function addView() {
		$data = [
			"active_menu" => 'user',
			"title" => 'Add User'
		];

		return view('user.add', $data);
	}

	public function add(Request $request) {
		$validate = $request->validate([
			'name' => 'required|max:20|unique:users',
			'username' => 'required|max:20|unique:users',
			'password' => 'required',
		]);

		try {
			DB::beginTransaction();

			$validate['password'] = Hash::make($request->post('password'));
			$user = User::create($validate);

			if($user) {
				DB::commit();
				return redirect('/user')->with('success', 'New user has been added');
			}
		} catch(Exception $e) {
			DB::rollback();
			return redirect('/user')->with('error', 'Add user error');
		}
	}

	public function updateView($id) {
		$data = [
			"active_menu" => 'user',
			"title" => 'Update User',
			"user" => User::getDataUser($id)
		];
		
		return view('user.update', $data);
	}

	public function update(Request $request, $id) {
		$rules = [];
		try {
			DB::beginTransaction();

			$check_user = User::find($id);
			if($check_user->name != $request->name) {
				$rules['name'] = 'required|unique:users';
			}
			if($check_user->username != $request->username) {
				$rules['username'] = 'required|unique:users';
			}
			$validateData = $request->validate($rules);

			$update_user = User::find($id)->update($validateData);

			if($update_user) {
				DB::commit();
				return redirect('/user')->with('success', 'Update user has been success');
			}
		} catch(Exception $e) {
			DB::rollback();
			return redirect('/user')->with('error', 'Update user error');
		}
	}

	public function delete($id) {
		$delete_user = User::find($id)->delete();
		if($delete_user) {
			$response = [
				"status" => true,
				"message" => 'Delete user has been success'
			];
		} else {
			$response = [
				"status" => false,
				"message" => 'Delete user error'
			];
		}
		
		echo json_encode($response);
	}

	function getDataUser() {
		return User::getDataUser();
	}
}
