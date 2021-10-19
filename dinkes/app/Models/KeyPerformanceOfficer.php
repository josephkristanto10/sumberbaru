<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class KeyPerformanceOfficer
 * 
 * @property int $id
 * @property string $name
 * @property string $score
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class KeyPerformanceOfficer extends Model
{
	protected $table = 'key_performance_officer';

	protected $fillable = [
		'name',
		'score'
	];
}
