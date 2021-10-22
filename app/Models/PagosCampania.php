<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PagosCampania
 * 
 * @property int $id_pago_evento
 * @property int $id_usuario
 * @property int $id_campania
 * @property Carbon $fecha_solicitud
 * @property Carbon $fecha_pago
 * @property string $observacion
 * @property float $importe_comision
 * @property int $estado_pago
 *
 * @package App\Models
 */
class PagosCampania extends Model
{
	protected $table = 'pagos_campanias';
	protected $primaryKey = 'id_pago_evento';
	public $timestamps = false;

	protected $casts = [
		'id_usuario' => 'int',
		'id_campania' => 'int',
		'importe_comision' => 'float',
		'estado_pago' => 'int'
	];

	protected $dates = [
		'fecha_solicitud',
		'fecha_pago'
	];

	protected $fillable = [
		'id_usuario',
		'id_campania',
		'fecha_solicitud',
		'fecha_pago',
		'observacion',
		'importe_comision',
		'estado_pago'
	];
}
