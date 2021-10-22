<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Reevendedor
 * 
 * @property int $id_reventa
 * @property int $id_usuario
 * @property int $id_campania
 * @property int $id_tipoentrada
 * @property int $cantidad
 * @property int $organizador
 * @property int $estado
 * @property int $revVendidas
 * @property int $cantidadl
 *
 * @package App\Models
 */
class Reevendedor extends Model
{
	protected $table = 'reevendedor';
	protected $primaryKey = 'id_reventa';
	public $timestamps = false;

	protected $casts = [
		'id_usuario' => 'int',
		'id_campania' => 'int',
		'id_tipoentrada' => 'int',
		'cantidad' => 'int',
		'organizador' => 'int',
		'estado' => 'int',
		'revVendidas' => 'int',
		'cantidadl' => 'int'
	];

	protected $fillable = [
		'id_usuario',
		'id_campania',
		'id_tipoentrada',
		'cantidad',
		'organizador',
		'estado',
		'revVendidas',
		'cantidadl'
	];
}
