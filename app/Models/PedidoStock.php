<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PedidoStock
 * 
 * @property int $id_pedido_stock
 * @property int $pedido_stock_usuario
 * @property int $pedido_stock_producto
 * @property int $pedido_stock_cantidad
 * @property int $pedido_stock_cantidad_parcial
 * @property float $pedido_stock_precio
 * @property int $pedido_stock_estado
 * @property string $metodo_pago
 * @property Carbon $pedido_stock_fecha_pedido
 * @property int $lote_inicial
 * @property Carbon $pedido_stock_fecha_actualizado
 *
 * @package App\Models
 */
class PedidoStock extends Model
{
	protected $table = 'pedido_stock';
	protected $primaryKey = 'id_pedido_stock';
	public $timestamps = false;

	protected $casts = [
		'pedido_stock_usuario' => 'int',
		'pedido_stock_producto' => 'int',
		'pedido_stock_cantidad' => 'int',
		'pedido_stock_cantidad_parcial' => 'int',
		'pedido_stock_precio' => 'float',
		'pedido_stock_estado' => 'int',
		'lote_inicial' => 'int'
	];

	protected $dates = [
		'pedido_stock_fecha_pedido',
		'pedido_stock_fecha_actualizado'
	];

	protected $fillable = [
		'pedido_stock_usuario',
		'pedido_stock_producto',
		'pedido_stock_cantidad',
		'pedido_stock_cantidad_parcial',
		'pedido_stock_precio',
		'pedido_stock_estado',
		'metodo_pago',
		'pedido_stock_fecha_pedido',
		'lote_inicial',
		'pedido_stock_fecha_actualizado'
	];
}
