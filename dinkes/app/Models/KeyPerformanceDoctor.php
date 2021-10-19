<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class KeyPerformanceDoctor
 * 
 * @property int $id
 * @property string $name
 * @property string $score
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|ActionDoctor[] $action_doctors
 *
 * @package App\Models
 */
class KeyPerformanceDoctor extends Model
{
	protected $table = 'key_performance_doctor';

	protected $fillable = [
		'name',
		'score'
	];

	public function action_doctors()
	{
		return $this->hasMany(ActionDoctor::class, 'id_key_performance');
	}
}
