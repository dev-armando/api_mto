<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PedidosImpresionTicket
 * 
 * @property int $id_pedido
 * @property int $usuario
 * @property int $id_campania
 * @property string $lote_pedido
 * @property int $id_tipoent
 * @property string $ubicacion
 * @property float $importe_entrada_pedido
 * @property int $cantidad
 * @property int $id_pack_ticket
 * @property float $pack_importe_ticket
 * @property float $precio_parcial
 * @property float $precio_total_pedido
 * @property string $metodo_pago
 * @property int $estado
 * @property string $imagen_entrada
 * @property string $invitados
 * @property string $publico_evento
 * @property string $observaciones
 * @property Carbon $fecha_pedido
 * @property Carbon $fecha_impresion
 * @property int $estado_pago
 * @property Carbon|null $fecha_pago
 * @property int $id_pvi
 * @property int $id_pvi_impresion
 *
 * @package App\Models
 */
class PedidosImpresionTicket extends Model
{
	protected $table = 'pedidos_impresion_tickets';
	protected $primaryKey = 'id_pedido';
	public $timestamps = false;

	protected $casts = [
		'usuario' => 'int',
		'id_campania' => 'int',
		'id_tipoent' => 'int',
		'importe_entrada_pedido' => 'float',
		'cantidad' => 'int',
		'id_pack_ticket' => 'int',
		'pack_importe_ticket' => 'float',
		'precio_parcial' => 'float',
		'precio_total_pedido' => 'float',
		'estado' => 'int',
		'estado_pago' => 'int',
		'id_pvi' => 'int',
		'id_pvi_impresion' => 'int'
	];

	protected $dates = [
		'fecha_pedido',
		'fecha_impresion',
		'fecha_pago'
	];

	protected $fillable = [
		'usuario',
		'id_campania',
		'lote_pedido',
		'id_tipoent',
		'ubicacion',
		'importe_entrada_pedido',
		'cantidad',
		'id_pack_ticket',
		'pack_importe_ticket',
		'precio_parcial',
		'precio_total_pedido',
		'metodo_pago',
		'estado',
		'imagen_entrada',
		'invitados',
		'publico_evento',
		'observaciones',
		'fecha_pedido',
		'fecha_impresion',
		'estado_pago',
		'fecha_pago',
		'id_pvi',
		'id_pvi_impresion'
	];
}
