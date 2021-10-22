<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Puntoventum
 * 
 * @property int $id_punto
 * @property string $nombre
 * @property string $usuario
 * @property string $pass
 * @property string $passdeco
 * @property int $id_usuario
 * @property int $id_campania
 * @property string $estado
 * @property int $tipo_usuario_control
 *
 * @package App\Models
 */
class Puntoventum extends Model
{
	protected $table = 'puntoventa';
	protected $primaryKey = 'id_punto';
	public $timestamps = false;

	protected $casts = [
		'id_usuario' => 'int',
		'id_campania' => 'int',
		'tipo_usuario_control' => 'int'
	];

	protected $fillable = [
		'nombre',
		'usuario',
		'pass',
		'passdeco',
		'id_usuario',
		'id_campania',
		'estado',
		'tipo_usuario_control'
	];
}
