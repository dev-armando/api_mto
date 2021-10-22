<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ImpresionesDefectuosa
 * 
 * @property int $id_impresion_defectuosa
 * @property int $id_usuario
 * @property int $id_tipoent
 * @property int $id_producto
 * @property int $cantidad_defectuosas
 * @property int $estado_devolucion
 * @property Carbon $fecha_impresion_defectuosa
 *
 * @package App\Models
 */
class ImpresionesDefectuosa extends Model
{
	protected $table = 'impresiones_defectuosas';
	protected $primaryKey = 'id_impresion_defectuosa';
	public $timestamps = false;

	protected $casts = [
		'id_usuario' => 'int',
		'id_tipoent' => 'int',
		'id_producto' => 'int',
		'cantidad_defectuosas' => 'int',
		'estado_devolucion' => 'int'
	];

	protected $dates = [
		'fecha_impresion_defectuosa'
	];

	protected $fillable = [
		'id_usuario',
		'id_tipoent',
		'id_producto',
		'cantidad_defectuosas',
		'estado_devolucion',
		'fecha_impresion_defectuosa'
	];
}
