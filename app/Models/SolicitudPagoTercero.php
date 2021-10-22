<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SolicitudPagoTercero
 * 
 * @property int $id_solicitud
 * @property int $id_usuario
 * @property string $nombre
 * @property string $apellido
 * @property int $dni
 * @property string $email
 * @property string $cbu
 * @property string $beneficiario
 * @property string $banco
 * @property int $tipoPago
 * @property int $id_campania
 * @property Carbon $fecha
 * @property Carbon $fecha_pago
 * @property string $mp
 * @property string $tipo_cuenta
 * @property float $importe_pago_terceros
 * @property float $estado_pago_terceros
 * @property string $observaciones
 * @property int $numero_transferencia
 *
 * @package App\Models
 */
class SolicitudPagoTercero extends Model
{
	protected $table = 'solicitud_pago_terceros';
	protected $primaryKey = 'id_solicitud';
	public $timestamps = false;

	protected $casts = [
		'id_usuario' => 'int',
		'dni' => 'int',
		'tipoPago' => 'int',
		'id_campania' => 'int',
		'importe_pago_terceros' => 'float',
		'estado_pago_terceros' => 'float',
		'numero_transferencia' => 'int'
	];

	protected $dates = [
		'fecha',
		'fecha_pago'
	];

	protected $fillable = [
		'id_usuario',
		'nombre',
		'apellido',
		'dni',
		'email',
		'cbu',
		'beneficiario',
		'banco',
		'tipoPago',
		'id_campania',
		'fecha',
		'fecha_pago',
		'mp',
		'tipo_cuenta',
		'importe_pago_terceros',
		'estado_pago_terceros',
		'observaciones',
		'numero_transferencia'
	];
}
