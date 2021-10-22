<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TiposRestriccion
 * 
 * @property int $id_restriccion
 * @property string $descripcion
 *
 * @package App\Models
 */
class TiposRestriccion extends Model
{
	protected $table = 'tipos_restriccion';
	protected $primaryKey = 'id_restriccion';
	public $timestamps = false;

	protected $fillable = [
		'descripcion'
	];
}
