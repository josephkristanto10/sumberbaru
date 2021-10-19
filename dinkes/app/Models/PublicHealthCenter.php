<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PublicHealthCenter
 * 
 * @property int $id
 * @property int $id_public_health_office
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property PublicHealthOffice $public_health_office
 * @property Collection|PublicHealthCenterDoctor[] $public_health_center_doctors
 *
 * @package App\Models
 */
class PublicHealthCenter extends Model
{
	protected $table = 'public_health_center';

	protected $casts = [
		'id_public_health_office' => 'int'
	];

	protected $fillable = [
		'id_public_health_office',
		'name',
		'phone',
		'address'
	];

	public function public_health_office()
	{
		return $this->belongsTo(PublicHealthOffice::class, 'id_public_health_office');
	}

	public function public_health_center_doctors()
	{
		return $this->hasMany(PublicHealthCenterDoctor::class, 'public_health_center');
	}
}
