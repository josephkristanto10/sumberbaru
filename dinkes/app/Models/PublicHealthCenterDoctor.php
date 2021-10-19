<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PublicHealthCenterDoctor
 * 
 * @property int $id
 * @property int $public_health_center
 * @property string $name
 * @property string $nik
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property string $password
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|ActionDoctor[] $action_doctors
 *
 * @package App\Models
 */
class PublicHealthCenterDoctor extends Model
{
	protected $table = 'public_health_center_doctor';

	protected $casts = [
		'public_health_center' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'public_health_center',
		'name',
		'nik',
		'address',
		'phone',
		'email',
		'password'
	];

	public function public_health_center()
	{
		return $this->belongsTo(PublicHealthCenter::class, 'public_health_center');
	}

	public function action_doctors()
	{
		return $this->hasMany(ActionDoctor::class, 'id_public_health_doctor');
	}
}
