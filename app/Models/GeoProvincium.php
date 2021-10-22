<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GeoProvincium
 * 
 * @property int $id
 * @property int|null $geo_pais_id
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
 * @property GeoPai|null $geo_pai
 * @property Collection|GeoLocalidad[] $geo_localidads
 *
 * @package App\Models
 */
class GeoProvincium extends Model
{
	protected $table = 'geo_provincia';
	public $timestamps = false;

	protected $casts = [
		'geo_pais_id' => 'int',
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
		'geo_pais_id',
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

	public function geo_pai()
	{
		return $this->belongsTo(GeoPai::class, 'geo_pais_id');
	}

	public function geo_localidads()
	{
		return $this->hasMany(GeoLocalidad::class, 'geo_provincia_id');
	}
}
