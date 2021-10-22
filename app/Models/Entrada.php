<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Entrada
 * 
 * @property int $id_entrada
 * @property int $campania
 * @property string $entrada
 * @property int $estado
 * @property int $iniciocompra
 * @property int $tipoEntrada
 * @property int $cantidad
 * @property float $precioEnt
 * @property int $especial
 * @property float $precioIni
 * @property int $reveendedor
 * @property float $comision_gateway
 * @property float $comision_mto
 * @property float $comision_usuario
 * @property int|null $id_credenciales_mp
 * @property Carbon|null $fecha_ingreso
 * @property Carbon|null $fecha_alquiler
 * @property int $id_usuario_control_ingreso
 *
 * @package App\Models
 */
class Entrada extends Model
{
	protected $table = 'entradas';
	protected $primaryKey = 'id_entrada';
	public $timestamps = false;

	protected $casts = [
		'campania' => 'int',
		'estado' => 'int',
		'iniciocompra' => 'int',
		'tipoEntrada' => 'int',
		'cantidad' => 'int',
		'precioEnt' => 'float',
		'especial' => 'int',
		'precioIni' => 'float',
		'reveendedor' => 'int',
		'comision_gateway' => 'float',
		'comision_mto' => 'float',
		'comision_usuario' => 'float',
		'id_credenciales_mp' => 'int',
		'id_usuario_control_ingreso' => 'int'
	];

	protected $dates = [
		'fecha_ingreso',
		'fecha_alquiler'
	];

	protected $fillable = [
		'campania',
		'entrada',
		'estado',
		'iniciocompra',
		'tipoEntrada',
		'cantidad',
		'precioEnt',
		'especial',
		'precioIni',
		'reveendedor',
		'comision_gateway',
		'comision_mto',
		'comision_usuario',
		'id_credenciales_mp',
		'fecha_ingreso',
		'fecha_alquiler',
		'id_usuario_control_ingreso'
	];
}
