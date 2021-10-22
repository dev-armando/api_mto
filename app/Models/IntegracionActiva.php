<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class IntegracionActiva
 * 
 * @property string $integracion
 * @property bool $estado
 * @property int $id
 *
 * @package App\Models
 */
class IntegracionActiva extends Model
{
	protected $table = 'integracion_activa';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'estado' => 'bool',
		'id' => 'int'
	];

	protected $fillable = [
		'integracion',
		'estado'
	];
}
