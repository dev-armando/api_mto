<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ComisionesVariable
 * 
 * @property int $id_comision_variable
 * @property float $valor_entrada
 * @property float $comision_mto
 * @property float $comision_usuario
 * @property float $comision_fija_mto
 *
 * @package App\Models
 */
class ComisionesVariable extends Model
{
	protected $table = 'comisiones_variables';
	protected $primaryKey = 'id_comision_variable';
	public $timestamps = false;

	protected $casts = [
		'valor_entrada' => 'float',
		'comision_mto' => 'float',
		'comision_usuario' => 'float',
		'comision_fija_mto' => 'float'
	];

	protected $fillable = [
		'valor_entrada',
		'comision_mto',
		'comision_usuario',
		'comision_fija_mto'
	];
}
