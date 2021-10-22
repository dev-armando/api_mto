<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Iniciocompra
 * 
 * @property int $id_inicio
 * @property int $documento
 * @property string $mail
 * @property string $clave
 * @property Carbon $fecha
 * @property int $estado
 * @property int $id_campania
 * @property int $cantidadinicio
 * @property int $reevendedor
 * @property string $nombreComprador
 * @property int $categoria
 * @property string|null $fin_compra
 *
 * @package App\Models
 */
class Iniciocompra extends Model
{
	protected $table = 'iniciocompra';
	protected $primaryKey = 'id_inicio';
	public $timestamps = false;

	protected $casts = [
		'documento' => 'int',
		'estado' => 'int',
		'id_campania' => 'int',
		'cantidadinicio' => 'int',
		'reevendedor' => 'int',
		'categoria' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'documento',
		'mail',
		'clave',
		'fecha',
		'estado',
		'id_campania',
		'cantidadinicio',
		'reevendedor',
		'nombreComprador',
		'categoria',
		'fin_compra'
	];
}
