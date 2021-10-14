<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TransactionReturn
 * 
 * @property int $id
 * @property int $idproduct
 * @property int $idsupplier
 * @property string $returndate
 * @property string|null $confirmationdate
 * @property string|null $returnitemqty
 * @property string|null $returnitemmoney
 * @property string $qty
 * @property string $info
 * @property string|null $solution
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Product $product
 * @property Supplier $supplier
 *
 * @package App\Models
 */
class TransactionReturn extends Model
{
	protected $table = 'transaction_return';

	protected $casts = [
		'idproduct' => 'int',
		'idsupplier' => 'int'
	];

	protected $fillable = [
		'idproduct',
		'idsupplier',
		'returndate',
		'confirmationdate',
		'returnitemqty',
		'returnitemmoney',
		'qty',
		'info',
		'solution',
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
}
