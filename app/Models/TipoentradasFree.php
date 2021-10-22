<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoentradasFree
 * 
 * @property int $id_tipoent
 * @property int $id_campania
 * @property string $nombre
 * @property int $cantidad
 * @property float $precio
 * @property int $estado
 * @property float $importeinicial
 * @property int $cantidadVendida
 * @property int $cantidadReserva
 * @property int $cantidad_por_persona
 * @property Carbon $fechaPedido
 * @property Carbon|null $fechaActivacion
 * @property Carbon|null $fechaExpiracion
 *
 * @package App\Models
 */
class TipoentradasFree extends Model
{
	protected $table = 'tipoentradas_free';
	protected $primaryKey = 'id_tipoent';
	public $timestamps = false;

	protected $casts = [
		'id_campania' => 'int',
		'cantidad' => 'int',
		'precio' => 'float',
		'estado' => 'int',
		'importeinicial' => 'float',
		'cantidadVendida' => 'int',
		'cantidadReserva' => 'int',
		'cantidad_por_persona' => 'int'
	];

	protected $dates = [
		'fechaPedido',
		'fechaActivacion',
		'fechaExpiracion'
	];

	protected $fillable = [
		'id_campania',
		'nombre',
		'cantidad',
		'precio',
		'estado',
		'importeinicial',
		'cantidadVendida',
		'cantidadReserva',
		'cantidad_por_persona',
		'fechaPedido',
		'fechaActivacion',
		'fechaExpiracion'
	];
}
