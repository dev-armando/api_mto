<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Registro
 * 
 * @property int $id
 * @property string $tipo
 * @property Carbon $fecha_hora
 * @property string $volcado
 *
 * @package App\Models
 */
class Registro extends Model
{
	protected $table = 'registro';
	public $timestamps = false;

	protected $dates = [
		'fecha_hora'
	];

	protected $fillable = [
		'tipo',
		'fecha_hora',
		'volcado'
	];
}
