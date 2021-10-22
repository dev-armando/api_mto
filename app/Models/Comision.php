<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Comision
 * 
 * @property float $ticket
 * @property float $pulsera
 * @property float $iibb
 * @property float $ml
 * @property float $monotributo
 * @property float $ganancia
 * @property int $id_usuario
 * @property int|null $modificado
 *
 * @package App\Models
 */
class Comision extends Model
{
	protected $table = 'comision';
	protected $primaryKey = 'id_usuario';
	public $timestamps = false;

	protected $casts = [
		'ticket' => 'float',
		'pulsera' => 'float',
		'iibb' => 'float',
		'ml' => 'float',
		'monotributo' => 'float',
		'ganancia' => 'float',
		'modificado' => 'int'
	];

	protected $fillable = [
		'ticket',
		'pulsera',
		'iibb',
		'ml',
		'monotributo',
		'ganancia',
		'modificado'
	];
}
