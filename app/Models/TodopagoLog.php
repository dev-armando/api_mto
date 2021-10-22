<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TodopagoLog
 * 
 * @property int $id_operation
 * @property int|null $id_inicio
 * @property string $entidad
 * @property string|null $requestkey
 * @property string $dni
 * @property string|null $nombre
 * @property string|null $apellido
 * @property string $nom_ape
 * @property string $email
 * @property int $cantidad
 * @property float|null $preciounitario_sin
 * @property float|null $preciounitario_con
 * @property float $preciototal
 * @property int $id_campania
 * @property int $id_tipoent
 * @property bool $exito
 * @property string|null $nombremediodepago
 * @property string $tipomediodepago
 * @property string|null $situaciondepago
 * @property string|null $respuesta
 * @property int $ID
 * @property Carbon $fecha
 *
 * @package App\Models
 */
class TodopagoLog extends Model
{
	protected $table = 'todopago_log';
	protected $primaryKey = 'id_operation';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_operation' => 'int',
		'id_inicio' => 'int',
		'cantidad' => 'int',
		'preciounitario_sin' => 'float',
		'preciounitario_con' => 'float',
		'preciototal' => 'float',
		'id_campania' => 'int',
		'id_tipoent' => 'int',
		'exito' => 'bool',
		'ID' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'id_inicio',
		'entidad',
		'requestkey',
		'dni',
		'nombre',
		'apellido',
		'nom_ape',
		'email',
		'cantidad',
		'preciounitario_sin',
		'preciounitario_con',
		'preciototal',
		'id_campania',
		'id_tipoent',
		'exito',
		'nombremediodepago',
		'tipomediodepago',
		'situaciondepago',
		'respuesta',
		'ID',
		'fecha'
	];
}
