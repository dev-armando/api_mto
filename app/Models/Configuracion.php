<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Configuracion
 * 
 * @property string $atributo
 * @property string|null $valor
 *
 * @package App\Models
 */
class Configuracion extends Model
{
	protected $table = 'configuracion';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'atributo',
		'valor'
	];
}
