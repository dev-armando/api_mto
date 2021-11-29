<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tipoentrada
 *
 * @property int $id_tipoent
 * @property int $id_campania
 * @property string $nombre
 * @property int $cantidad
 * @property float $precio
 * @property int $estado
 * @property float $importeinicial
 * @property string $comision
 * @property float $comision_mto
 * @property float $comision_usuario
 * @property int $cantidadVendida
 * @property int $cantidadReserva
 * @property int $cantidad_por_persona
 * @property string|null $valor_entrada_free
 * @property Carbon $fechaPedido
 * @property Carbon|null $fechaActivacion
 * @property Carbon|null $fechaExpiracion
 *
 * @package App\Models
 */
class Tipoentrada extends Model
{
	protected $table = 'tipoentradas';
	protected $primaryKey = 'id_tipoent';
	public $timestamps = false;
	public $incrementing = false;

	protected $casts = [
		'id_campania' => 'int',
		'cantidad' => 'int',
		'precio' => 'float',
		'estado' => 'int',
		'importeinicial' => 'float',
		'comision_mto' => 'float',
		'comision_usuario' => 'float',
		'cantidadVendida' => 'int',
		'cantidadReserva' => 'int',
		'cantidad_por_persona' => 'int'
	];

	protected $dates = [
		'fechaPedido',
		'fechaActivacion',
		'fechaExpiracion'
	];

	protected $fillable = [
		'id_campania',
		'nombre',
		'cantidad',
		'precio',
		'estado',
		'importeinicial',
		'comision',
		'comision_mto',
		'comision_usuario',
		'cantidadVendida',
		'cantidadReserva',
		'cantidad_por_persona',
		'valor_entrada_free',
		'fechaPedido',
		'fechaActivacion',
		'fechaExpiracion',
		'id_tipoent'
	];

	public static function lastId()
    {
        return (int)static::orderBy('id_tipoent', 'DESC')->first()->id_tipoent ?? 0;
    }
}
