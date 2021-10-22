<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GeoPai
 * 
 * @property int $id
 * @property string|null $descripcion
 * @property string|null $codigo
 * @property string|null $codigo_numerico
 * @property string|null $observacion
 * @property int|null $orden
 * @property int|null $estado
 * @property Carbon|null $creado
 * @property int|null $creado_por
 * @property Carbon|null $modificado
 * @property int|null $modificado_por
 * 
 * @property Collection|GeoProvincium[] $geo_provincia
 *
 * @package App\Models
 */
class GeoPai extends Model
{
	protected $table = 'geo_pais';
	public $timestamps = false;

	protected $casts = [
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
		'descripcion',
		'codigo',
		'codigo_numerico',
		'observacion',
		'orden',
		'estado',
		'creado',
		'creado_por',
		'modificado',
		'modificado_por'
	];

	public function geo_provincia()
	{
		return $this->hasMany(GeoProvincium::class, 'geo_pais_id');
	}
}
