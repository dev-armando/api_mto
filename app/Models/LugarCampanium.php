<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LugarCampanium
 * 
 * @property int $id_lugar_campania
 * @property string $nombre
 * @property int $id_pais
 * @property int $id_provincia
 * @property int $id_localidad
 * @property string $direccion
 * @property int $capacidadLugar
 *
 * @package App\Models
 */
class LugarCampanium extends Model
{
	protected $table = 'lugar_campania';
	protected $primaryKey = 'id_lugar_campania';
	public $timestamps = false;

	protected $casts = [
		'id_pais' => 'int',
		'id_provincia' => 'int',
		'id_localidad' => 'int',
		'capacidadLugar' => 'int'
	];

	protected $fillable = [
		'nombre',
		'id_pais',
		'id_provincia',
		'id_localidad',
		'direccion',
		'capacidadLugar'
	];
}
