<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PedidosImpresionTicketOffline
 * 
 * @property int $id_pedido_ticket_offline
 * @property string $pedido_offline_lote
 * @property string $pedido_offline_lugar
 * @property string $pedido_offline_direccion
 * @property string $pedido_offline_localidad
 * @property string $pedido_offline_fecha_evento
 * @property string $pedido_offline_hora_evento
 * @property string $pedido_offline_tipo_publico
 * @property string $pedido_offline_artista
 * @property string $pedido_offline_campania
 * @property string $pedido_offline_invitados
 *
 * @package App\Models
 */
class PedidosImpresionTicketOffline extends Model
{
	protected $table = 'pedidos_impresion_ticket_offline';
	protected $primaryKey = 'id_pedido_ticket_offline';
	public $timestamps = false;

	protected $fillable = [
		'pedido_offline_lote',
		'pedido_offline_lugar',
		'pedido_offline_direccion',
		'pedido_offline_localidad',
		'pedido_offline_fecha_evento',
		'pedido_offline_hora_evento',
		'pedido_offline_tipo_publico',
		'pedido_offline_artista',
		'pedido_offline_campania',
		'pedido_offline_invitados'
	];
}
