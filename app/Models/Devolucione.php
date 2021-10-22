<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Devolucione
 * 
 * @property int $id_devoluciones
 * @property string|null $id_entrada
 * @property Carbon|null $fecha
 *
 * @package App\Models
 */
class Devolucione extends Model
{
	protected $table = 'devoluciones';
	protected $primaryKey = 'id_devoluciones';
	public $timestamps = false;

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'id_entrada',
		'fecha'
	];
}
