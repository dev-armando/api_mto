<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MercadopagoStockImpresionLog
 * 
 * @property int $ID
 * @property int $id_usuario
 * @property string|null $respuesta
 * @property Carbon $fecha
 * @property int|null $id_producto
 * @property bool $exito
 * @property int $id_pedido
 * @property string $entidad
 * @property string|null $requestkey
 * @property float|null $preciounitario_sin
 * @property float|null $preciounitario_con
 * @property float $preciototal
 * @property string $tipomediodepago
 * @property string|null $situaciondepago
 *
 * @package App\Models
 */
class MercadopagoStockImpresionLog extends Model
{
	protected $table = 'mercadopago_stock_impresion_log';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'id_usuario' => 'int',
		'id_producto' => 'int',
		'exito' => 'bool',
		'id_pedido' => 'int',
		'preciounitario_sin' => 'float',
		'preciounitario_con' => 'float',
		'preciototal' => 'float'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'id_usuario',
		'respuesta',
		'fecha',
		'id_producto',
		'exito',
		'id_pedido',
		'entidad',
		'requestkey',
		'preciounitario_sin',
		'preciounitario_con',
		'preciototal',
		'tipomediodepago',
		'situaciondepago'
	];
}
