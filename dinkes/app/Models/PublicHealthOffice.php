<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PublicHealthOffice
 * 
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|PublicHealthCenter[] $public_health_centers
 * @property Collection|PublicHealthOfficeOfficer[] $public_health_office_officers
 *
 * @package App\Models
 */
class PublicHealthOffice extends Model
{
	protected $table = 'public_health_office';

	protected $fillable = [
		'name'
	];

	public function public_health_centers()
	{
		return $this->hasMany(PublicHealthCenter::class, 'id_public_health_office');
	}

	public function public_health_office_officers()
	{
		return $this->hasMany(PublicHealthOfficeOfficer::class, 'id_public_health_office');
	}
}
