<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Listado
 * 
 * @property int $id_lista
 * @property string $nombre
 * @property int $id_usuario
 * @property int $estado
 * @property int $id_campania
 * @property int $tipo
 * @property string $email
 *
 * @package App\Models
 */
class Listado extends Model
{
	protected $table = 'listado';
	protected $primaryKey = 'id_lista';
	public $timestamps = false;

	protected $casts = [
		'id_usuario' => 'int',
		'estado' => 'int',
		'id_campania' => 'int',
		'tipo' => 'int'
	];

	protected $fillable = [
		'nombre',
		'id_usuario',
		'estado',
		'id_campania',
		'tipo',
		'email'
	];
}
