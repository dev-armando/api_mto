<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MercadopagoPago
 * 
 * @property int $id_pago
 * @property string $respuesta
 * @property string $id_operation
 * @property Carbon $fecha_pago
 *
 * @package App\Models
 */
class MercadopagoPago extends Model
{
	protected $table = 'mercadopago_pagos';
	protected $primaryKey = 'id_pago';
	public $timestamps = false;

	protected $dates = [
		'fecha_pago'
	];

	protected $fillable = [
		'respuesta',
		'id_operation',
		'fecha_pago'
	];
}
