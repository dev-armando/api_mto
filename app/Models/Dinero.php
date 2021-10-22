<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Dinero
 * 
 * @property int $id_dinero
 * @property int $id_campania
 * @property int $estadopago
 * @property string $codigo
 * @property string $fecha
 * @property string $cbu
 * @property string $importe
 * @property string $bene
 * @property string $banco
 * @property int $tipoPago
 * @property string $observaciones
 *
 * @package App\Models
 */
class Dinero extends Model
{
	protected $table = 'dinero';
	protected $primaryKey = 'id_dinero';
	public $timestamps = false;

	protected $casts = [
		'id_campania' => 'int',
		'estadopago' => 'int',
		'tipoPago' => 'int'
	];

	protected $fillable = [
		'id_campania',
		'estadopago',
		'codigo',
		'fecha',
		'cbu',
		'importe',
		'bene',
		'banco',
		'tipoPago',
		'observaciones'
	];
}
