<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DineroBCK08092020
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
class DineroBCK08092020 extends Model
{
	protected $table = 'dinero_BCK_08_09_2020';
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
