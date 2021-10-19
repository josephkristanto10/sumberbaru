<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ActionDoctor
 * 
 * @property int $id
 * @property int $id_key_performance
 * @property int $id_public_health_doctor
 * @property int $quantity
 * @property int $score_per_action
 * @property int $total_score
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property KeyPerformanceDoctor $key_performance_doctor
 * @property PublicHealthCenterDoctor $public_health_center_doctor
 *
 * @package App\Models
 */
class ActionDoctor extends Model
{
	protected $table = 'action_doctor';

	protected $casts = [
		'id_key_performance' => 'int',
		'id_public_health_doctor' => 'int',
		'quantity' => 'int',
		'score_per_action' => 'int',
		'total_score' => 'int'
	];

	protected $fillable = [
		'id_key_performance',
		'id_public_health_doctor',
		'quantity',
		'score_per_action',
		'total_score'
	];

	public function key_performance_doctor()
	{
		return $this->belongsTo(KeyPerformanceDoctor::class, 'id_key_performance');
	}

	public function public_health_center_doctor()
	{
		return $this->belongsTo(PublicHealthCenterDoctor::class, 'id_public_health_doctor');
	}
}
