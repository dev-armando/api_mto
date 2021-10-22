<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Termino
 * 
 * @property int $id_termino
 * @property string $termino
 * @property int $sector
 *
 * @package App\Models
 */
class Termino extends Model
{
	protected $table = 'terminos';
	protected $primaryKey = 'id_termino';
	public $timestamps = false;

	protected $casts = [
		'sector' => 'int'
	];

	protected $fillable = [
		'termino',
		'sector'
	];
}
