<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SupplierProductLog
 * 
 * @property int $id
 * @property int $idsupplierproduct
 * @property int $price
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property SupplierProduct $supplier_product
 *
 * @package App\Models
 */
class SupplierProductLog extends Model
{
	protected $table = 'supplier_product_log';

	protected $casts = [
		'idsupplierproduct' => 'int',
		'price' => 'int'
	];

	protected $fillable = [
		'idsupplierproduct',
		'price'
	];

	public function supplier_product()
	{
		return $this->belongsTo(SupplierProduct::class, 'idsupplierproduct');
	}
}
