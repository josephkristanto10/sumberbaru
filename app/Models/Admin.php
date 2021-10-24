<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Admin
 * 
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $password
 *
 * @package App\Models
 */
class Admin extends Model
{
	protected $table = 'admin';
	public $timestamps = false;

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'name',
		'username',
		'password'
	];
}
