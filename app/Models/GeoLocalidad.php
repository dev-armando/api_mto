<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GeoLocalidad
 * 
 * @property int $id
 * @property int|null $geo_provincia_id
 * @property string|null $descripcion
 * @property string|null $codigo
 * @property string|null $observacion
 * @property int|null $orden
 * @property int|null $estado
 * @property Carbon|null $creado
 * @property int|null $creado_por
 * @property Carbon|null $modificado
 * @property int|null $modificado_por
 * 
 * @property GeoProvincium|null $geo_provincium
 *
 * @package App\Models
 */
class GeoLocalidad extends Model
{
	protected $table = 'geo_localidad';
	public $timestamps = false;

	protected $casts = [
		'geo_provincia_id' => 'int',
		'orden' => 'int',
		'estado' => 'int',
		'creado_por' => 'int',
		'modificado_por' => 'int'
	];

	protected $dates = [
		'creado',
		'modificado'
	];

	protected $fillable = [
		'geo_provincia_id',
		'descripcion',
		'codigo',
		'observacion',
		'orden',
		'estado',
		'creado',
		'creado_por',
		'modificado',
		'modificado_por'
	];

	public function geo_provincium()
	{
		return $this->belongsTo(GeoProvincium::class, 'geo_provincia_id');
	}
}
