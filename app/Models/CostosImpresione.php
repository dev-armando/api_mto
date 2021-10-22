<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CostosImpresione
 * 
 * @property int $id_costos_impresiones
 * @property int $id_usuario_costos_impresiones
 * @property int $id_producto_costos_impresiones
 * @property float $Costos_impresiones
 *
 * @package App\Models
 */
class CostosImpresione extends Model
{
	protected $table = 'costos_impresiones';
	protected $primaryKey = 'id_costos_impresiones';
	public $timestamps = false;

	protected $casts = [
		'id_usuario_costos_impresiones' => 'int',
		'id_producto_costos_impresiones' => 'int',
		'Costos_impresiones' => 'float'
	];

	protected $fillable = [
		'id_usuario_costos_impresiones',
		'id_producto_costos_impresiones',
		'Costos_impresiones'
	];
}
