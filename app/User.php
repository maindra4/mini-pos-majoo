<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'username', 'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	static function getDataUser($id = null) {
		if($id == null) {
			$user = User::all();

			$result = [];
			$result['data'] = [];
			foreach($user as $row) {
				$item = [
					"id" => $row->id,
					"name" => $row->name,
					"username" => $row->username,
					"created_at" => date("d F Y", strtotime($row->created_at))
				];

				array_push($result['data'], $item);
			}

			$result['draw'] = 1;
			$result['recordsTotal'] = count($user);
			$result['recordsFiltered'] = count($user);
		} else {
			$result = User::find($id);
		}

		return $result;
	}
}
