<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EspectadoresTotalesEventosOnline
 * 
 * @property int $id_espectador
 * @property string|null $ip_espectador
 * @property Carbon|null $fecha_primer_espectador
 * @property string|null $entrada_espectador
 * @property int|null $campania_espectador
 * @property int|null $estado_espectador
 * @property string $session_espectador
 * @property string|null $mail_espectador
 * @property string|null $ip_segundo_espectador
 * @property Carbon|null $fecha_segundo_espectador
 * @property Carbon $fecha_actualizado
 * @property Carbon $fecha_creado
 * @property Carbon $fecha_liberacion
 * @property string $navegador
 *
 * @package App\Models
 */
class EspectadoresTotalesEventosOnline extends Model
{
	protected $table = 'espectadores_totales_eventos_online';
	protected $primaryKey = 'id_espectador';
	public $timestamps = false;

	protected $casts = [
		'campania_espectador' => 'int',
		'estado_espectador' => 'int'
	];

	protected $dates = [
		'fecha_primer_espectador',
		'fecha_segundo_espectador',
		'fecha_actualizado',
		'fecha_creado',
		'fecha_liberacion'
	];

	protected $fillable = [
		'ip_espectador',
		'fecha_primer_espectador',
		'entrada_espectador',
		'campania_espectador',
		'estado_espectador',
		'session_espectador',
		'mail_espectador',
		'ip_segundo_espectador',
		'fecha_segundo_espectador',
		'fecha_actualizado',
		'fecha_creado',
		'fecha_liberacion',
		'navegador'
	];
}
