<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Modificarentrada
 * 
 * @property int $id_mod
 * @property int $id_campania
 * @property int $cantidad
 * @property string $operador
 * @property int $estado
 * @property int $id_calendario
 * @property int $usuario
 * @property int $id_especial
 * @property Carbon $fechamod
 *
 * @package App\Models
 */
class Modificarentrada extends Model
{
	protected $table = 'modificarentradas';
	protected $primaryKey = 'id_mod';
	public $timestamps = false;

	protected $casts = [
		'id_campania' => 'int',
		'cantidad' => 'int',
		'estado' => 'int',
		'id_calendario' => 'int',
		'usuario' => 'int',
		'id_especial' => 'int'
	];

	protected $dates = [
		'fechamod'
	];

	protected $fillable = [
		'id_campania',
		'cantidad',
		'operador',
		'estado',
		'id_calendario',
		'usuario',
		'id_especial',
		'fechamod'
	];
}
