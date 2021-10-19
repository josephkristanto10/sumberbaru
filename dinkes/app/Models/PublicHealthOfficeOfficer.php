<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PublicHealthOfficeOfficer
 * 
 * @property int $id
 * @property int $id_public_health_office
 * @property string $name
 * @property string $nik
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property string $password
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property PublicHealthOffice $public_health_office
 *
 * @package App\Models
 */
class PublicHealthOfficeOfficer extends Model
{
	protected $table = 'public_health_office_officer';

	protected $casts = [
		'id_public_health_office' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'id_public_health_office',
		'name',
		'nik',
		'address',
		'phone',
		'email',
		'password',
		'status'
	];

	public function public_health_office()
	{
		return $this->belongsTo(PublicHealthOffice::class, 'id_public_health_office');
	}
}
