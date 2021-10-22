<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ComisionesGatewaysImpresion
 * 
 * @property int $id_comision_gateway
 * @property string $nombre_gateway
 * @property string $sigla_gateway
 * @property float $comision_gateway
 *
 * @package App\Models
 */
class ComisionesGatewaysImpresion extends Model
{
	protected $table = 'comisiones_gateways_impresion';
	protected $primaryKey = 'id_comision_gateway';
	public $timestamps = false;

	protected $casts = [
		'comision_gateway' => 'float'
	];

	protected $fillable = [
		'nombre_gateway',
		'sigla_gateway',
		'comision_gateway'
	];
}
