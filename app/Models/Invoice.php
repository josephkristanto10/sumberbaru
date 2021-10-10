<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Invoice
 * 
 * @property int $id
 * @property string $transaction_no
 * @property Carbon $transaction_date
 * @property string $transaction_method
 * @property string $transaction_shipment_delivery
 * @property int $transaction_shipment_delivery_cost
 * @property string $transaction_note
 * @property int $qty_item
 * @property int $total
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|InvoiceDetail[] $invoice_details
 *
 * @package App\Models
 */
class Invoice extends Model
{
	protected $table = 'invoice';

	protected $casts = [
		'transaction_shipment_delivery_cost' => 'int',
		'qty_item' => 'int',
		'total' => 'int'
	];

	protected $dates = [
		'transaction_date'
	];

	protected $fillable = [
		'transaction_no',
		'transaction_date',
		'transaction_method',
		'transaction_shipment_delivery',
		'transaction_shipment_delivery_cost',
		'transaction_note',
		'qty_item',
		'total'
	];

	public function invoice_details()
	{
		return $this->hasMany(InvoiceDetail::class, 'idtransaction');
	}
}
