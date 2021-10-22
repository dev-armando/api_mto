<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TransferenciasImpresionesPvi
 * 
 * @property int $id_transferencia
 * @property int $id_pedido
 * @property int $id_pvi_origen
 * @property int $id_pvi_destino
 * @property Carbon $fecha_transferencia
 * @property string $observaciones_transferencia
 *
 * @package App\Models
 */
class TransferenciasImpresionesPvi extends Model
{
	protected $table = 'transferencias_impresiones_pvi';
	protected $primaryKey = 'id_transferencia';
	public $timestamps = false;

	protected $casts = [
		'id_pedido' => 'int',
		'id_pvi_origen' => 'int',
		'id_pvi_destino' => 'int'
	];

	protected $dates = [
		'fecha_transferencia'
	];

	protected $fillable = [
		'id_pedido',
		'id_pvi_origen',
		'id_pvi_destino',
		'fecha_transferencia',
		'observaciones_transferencia'
	];
}
