<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Revtipoentrada
 * 
 * @property int $id_reventa
 * @property int $estadoRevendedor
 * @property int $id_usuario
 * @property int $id_campania
 * @property int $id_tipoentrada
 * @property int $cantidad
 * @property int $revVendidas
 * @property int $organizador
 * @property int|null $id_tipoent
 * @property string|null $nombre
 * @property float|null $precio
 * @property int|null $estado
 * @property string|null $usuariotie
 *
 * @package App\Models
 */
class Revtipoentrada extends Model
{
	protected $table = 'revtipoentradas';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_reventa' => 'int',
		'estadoRevendedor' => 'int',
		'id_usuario' => 'int',
		'id_campania' => 'int',
		'id_tipoentrada' => 'int',
		'cantidad' => 'int',
		'revVendidas' => 'int',
		'organizador' => 'int',
		'id_tipoent' => 'int',
		'precio' => 'float',
		'estado' => 'int'
	];

	protected $fillable = [
		'id_reventa',
		'estadoRevendedor',
		'id_usuario',
		'id_campania',
		'id_tipoentrada',
		'cantidad',
		'revVendidas',
		'organizador',
		'id_tipoent',
		'nombre',
		'precio',
		'estado',
		'usuariotie'
	];
}
