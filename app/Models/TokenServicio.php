<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TokenServicio
 * 
 * @property int $id_token
 * @property string $token
 * @property int $id_usuario
 * @property int $estado
 * @property Carbon $fecha
 * @property string $usuario_control
 *
 * @package App\Models
 */
class TokenServicio extends Model
{
	protected $table = 'token_servicios';
	protected $primaryKey = 'id_token';
	public $timestamps = false;

	protected $casts = [
		'id_usuario' => 'int',
		'estado' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $hidden = [
		'id_token',
		'token'
	];

	protected $fillable = [
		'token',
		'id_usuario',
		'estado',
		'fecha',
		'usuario_control'
	];
}
