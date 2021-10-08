<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class StokLog
 * 
 * @property int $id
 * @property int $idproduct
 * @property int $idsupplier
 * @property int $qty
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Product $product
 * @property Supplier $supplier
 *
 * @package App\Models
 */
class StokLog extends Model
{
	protected $table = 'stok_log';

	protected $casts = [
		'idproduct' => 'int',
		'idsupplier' => 'int',
		'qty' => 'int'
	];

	protected $fillable = [
		'idproduct',
		'idsupplier',
		'qty'
	];

	public function product()
	{
		return $this->belongsTo(Product::class, 'idproduct');
	}

	public function supplier()
	{
		return $this->belongsTo(Supplier::class, 'idsupplier');
	}
}
