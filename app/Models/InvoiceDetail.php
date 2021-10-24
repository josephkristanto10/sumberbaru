<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class InvoiceDetail
 * 
 * @property int $id
 * @property int $idproduct
 * @property int $idtransaction
 * @property int $qty
 * @property int $selling_price
 * @property int $subtotal
 * @property int|null $buyingprice
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Product $product
 * @property Invoice $invoice
 *
 * @package App\Models
 */
class InvoiceDetail extends Model
{
	protected $table = 'invoice_detail';

	protected $casts = [
		'idproduct' => 'int',
		'idtransaction' => 'int',
		'qty' => 'int',
		'selling_price' => 'int',
		'subtotal' => 'int',
		'buyingprice' => 'int'
	];

	protected $fillable = [
		'idproduct',
		'idtransaction',
		'qty',
		'selling_price',
		'subtotal',
		'buyingprice'
	];

	public function product()
	{
		return $this->belongsTo(Product::class, 'idproduct');
	}

	public function invoice()
	{
		return $this->belongsTo(Invoice::class, 'idtransaction');
	}
}
