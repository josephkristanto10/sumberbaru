<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cart
 * 
 * @property int $id
 * @property int $idproduct
 * @property int $qty
 * @property int $selling_price
 * @property int $subtotal
 * 
 * @property Product $product
 *
 * @package App\Models
 */
class Cart extends Model
{
	protected $table = 'cart';
	public $timestamps = false;

	protected $casts = [
		'idproduct' => 'int',
		'qty' => 'int',
		'selling_price' => 'int',
		'subtotal' => 'int'
	];

	protected $fillable = [
		'idproduct',
		'qty',
		'selling_price',
		'subtotal'
	];

	public function product()
	{
		return $this->belongsTo(Product::class, 'idproduct');
	}
}
