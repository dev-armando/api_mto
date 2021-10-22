<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class StockUsuario
 * 
 * @property int $id_stock_usuario
 * @property int $id_usuario
 * @property int $id_producto
 * @property int $stock
 * @property Carbon $fecha_actualizacion
 *
 * @package App\Models
 */
class StockUsuario extends Model
{
	protected $table = 'stock_usuario';
	protected $primaryKey = 'id_stock_usuario';
	public $timestamps = false;

	protected $casts = [
		'id_usuario' => 'int',
		'id_producto' => 'int',
		'stock' => 'int'
	];

	protected $dates = [
		'fecha_actualizacion'
	];

	protected $fillable = [
		'id_usuario',
		'id_producto',
		'stock',
		'fecha_actualizacion'
	];
}
