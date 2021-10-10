<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Supplier
 * 
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property string|null $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|StokLog[] $stok_logs
 * @property Collection|Product[] $products
 *
 * @package App\Models
 */
class Supplier extends Model
{
	protected $table = 'supplier';

	protected $fillable = [
		'name',
		'phone',
		'address',
		'status'
	];

	public function stok_logs()
	{
		return $this->hasMany(StokLog::class, 'idsupplier');
	}

	public function products()
	{
		return $this->belongsToMany(Product::class, 'supplier_product', 'idsupplier', 'idproduct')
					->withPivot('id', 'price', 'status')
					->withTimestamps();
	}
}
