<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Solicitud
 * 
 * @property int $id_solicitud
 * @property int $id_usuario
 * @property string $nombre
 * @property string $apellido
 * @property int $dni
 * @property string $email
 * @property string $cbu
 * @property string $beneficiario
 * @property string $banco
 * @property int $tipoPago
 * @property int $id_campania
 * @property Carbon $fecha
 * @property string $mp
 *
 * @package App\Models
 */
class Solicitud extends Model
{
	protected $table = 'solicitud';
	protected $primaryKey = 'id_solicitud';
	public $timestamps = false;

	protected $casts = [
		'id_usuario' => 'int',
		'dni' => 'int',
		'tipoPago' => 'int',
		'id_campania' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'id_usuario',
		'nombre',
		'apellido',
		'dni',
		'email',
		'cbu',
		'beneficiario',
		'banco',
		'tipoPago',
		'id_campania',
		'fecha',
		'mp'
	];
}
