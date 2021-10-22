<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Personaslistado
 * 
 * @property int $id_persona
 * @property string $nombre
 * @property string $apellido
 * @property string $email
 * @property string $detalle
 * @property int $id_listado
 * @property int $id_revlist
 *
 * @package App\Models
 */
class Personaslistado extends Model
{
	protected $table = 'personaslistado';
	protected $primaryKey = 'id_persona';
	public $timestamps = false;

	protected $casts = [
		'id_listado' => 'int',
		'id_revlist' => 'int'
	];

	protected $fillable = [
		'nombre',
		'apellido',
		'email',
		'detalle',
		'id_listado',
		'id_revlist'
	];
}
