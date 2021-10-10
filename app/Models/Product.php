<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * 
 * @property int $id
 * @property string $name
 * @property int|null $stok
 * @property string|null $kode
 * @property int|null $harga1
 * @property int|null $harga2
 * @property int|null $harga3
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|StokLog[] $stok_logs
 * @property Collection|Supplier[] $suppliers
 *
 * @package App\Models
 */
class Product extends Model
{
	protected $table = 'product';

	protected $casts = [
		'stok' => 'int',
		'harga1' => 'int',
		'harga2' => 'int',
		'harga3' => 'int'
	];

	protected $fillable = [
		'name',
		'stok',
		'kode',
		'harga1',
		'harga2',
		'harga3'
	];

	public function stok_logs()
	{
		return $this->hasMany(StokLog::class, 'idproduct');
	}

	public function suppliers()
	{
		return $this->belongsToMany(Supplier::class, 'supplier_product', 'idproduct', 'idsupplier')
					->withPivot('id', 'price', 'status')
					->withTimestamps();
	}
}
