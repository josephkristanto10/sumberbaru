<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SupplierProduct
 * 
 * @property int $id
 * @property int $idsupplier
 * @property int $idproduct
 * @property int $price
 * @property string|null $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Product $product
 * @property Supplier $supplier
 * @property Collection|SupplierProductLog[] $supplier_product_logs
 *
 * @package App\Models
 */
class SupplierProduct extends Model
{
	protected $table = 'supplier_product';

	protected $casts = [
		'idsupplier' => 'int',
		'idproduct' => 'int',
		'price' => 'int'
	];

	protected $fillable = [
		'idsupplier',
		'idproduct',
		'price',
		'status'
	];

	public function product()
	{
		return $this->belongsTo(Product::class, 'idproduct');
	}

	public function supplier()
	{
		return $this->belongsTo(Supplier::class, 'idsupplier');
	}

	public function supplier_product_logs()
	{
		return $this->hasMany(SupplierProductLog::class, 'idsupplierproduct');
	}
}
