<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MensajesChatEvento
 * 
 * @property int $id_mensaje
 * @property int $id_campania
 * @property string $nombre_usuario
 * @property string $texto_mensaje
 * @property int $estado_usuario_mensaje
 * @property Carbon $hora_mensaje
 *
 * @package App\Models
 */
class MensajesChatEvento extends Model
{
	protected $table = 'mensajes_chat_evento';
	protected $primaryKey = 'id_mensaje';
	public $timestamps = false;

	protected $casts = [
		'id_campania' => 'int',
		'estado_usuario_mensaje' => 'int'
	];

	protected $dates = [
		'hora_mensaje'
	];

	protected $fillable = [
		'id_campania',
		'nombre_usuario',
		'texto_mensaje',
		'estado_usuario_mensaje',
		'hora_mensaje'
	];
}
