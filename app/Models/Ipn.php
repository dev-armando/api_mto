<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ipn
 * 
 * @property int $id
 * @property string $detalles
 * @property Carbon $fecha
 * @property int $id_inicio
 *
 * @package App\Models
 */
class Ipn extends Model
{
	protected $table = 'ipn';
	public $timestamps = false;

	protected $casts = [
		'id_inicio' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'detalles',
		'fecha',
		'id_inicio'
	];
}
