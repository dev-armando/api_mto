<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MercadoPago
 * 
 * @property int $id_mercado_pago
 * @property string|null $info
 * @property string|null $reason
 * @property string|null $external_reference
 * @property string|null $status
 * @property Carbon|null $fecha
 *
 * @package App\Models
 */
class MercadoPago extends Model
{
	protected $table = 'mercado_pago';
	protected $primaryKey = 'id_mercado_pago';
	public $timestamps = false;

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'info',
		'reason',
		'external_reference',
		'status',
		'fecha'
	];
}
