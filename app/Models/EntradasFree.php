<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EntradasFree
 * 
 * @property int $id_entrada
 * @property int $campania
 * @property string $entrada
 * @property int $estado
 * @property int $cantidad
 * @property int $especial
 * @property int $documento
 * @property string $mail
 * @property string $nombreComprador
 * @property Carbon $fecha_compra
 * @property Carbon|null $fecha_ingreso
 * @property int $id_usuario_control_ingreso
 *
 * @package App\Models
 */
class EntradasFree extends Model
{
	protected $table = 'entradas_free';
	protected $primaryKey = 'id_entrada';
	public $timestamps = false;

	protected $casts = [
		'campania' => 'int',
		'estado' => 'int',
		'cantidad' => 'int',
		'especial' => 'int',
		'documento' => 'int',
		'id_usuario_control_ingreso' => 'int'
	];

	protected $dates = [
		'fecha_compra',
		'fecha_ingreso'
	];

	protected $fillable = [
		'campania',
		'entrada',
		'estado',
		'cantidad',
		'especial',
		'documento',
		'mail',
		'nombreComprador',
		'fecha_compra',
		'fecha_ingreso',
		'id_usuario_control_ingreso'
	];
}
