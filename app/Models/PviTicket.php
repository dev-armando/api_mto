<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PviTicket
 * 
 * @property int $id_pvi_ticket
 * @property int $id_usuario
 * @property float $lote_inicio
 * @property float $lote_final
 * @property Carbon $fecha_pedido_pvi_ticket
 * @property int $estado_pvi_ticket
 * @property float $costo_pvi_ticket
 *
 * @package App\Models
 */
class PviTicket extends Model
{
	protected $table = 'pvi_ticket';
	protected $primaryKey = 'id_pvi_ticket';
	public $timestamps = false;

	protected $casts = [
		'id_usuario' => 'int',
		'lote_inicio' => 'float',
		'lote_final' => 'float',
		'estado_pvi_ticket' => 'int',
		'costo_pvi_ticket' => 'float'
	];

	protected $dates = [
		'fecha_pedido_pvi_ticket'
	];

	protected $fillable = [
		'id_usuario',
		'lote_inicio',
		'lote_final',
		'fecha_pedido_pvi_ticket',
		'estado_pvi_ticket',
		'costo_pvi_ticket'
	];
}
