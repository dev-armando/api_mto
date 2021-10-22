<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Revendedorlistado
 * 
 * @property int $id_revendedor
 * @property int $cantidad
 * @property int $id_revlist
 *
 * @package App\Models
 */
class Revendedorlistado extends Model
{
	protected $table = 'revendedorlistado';
	protected $primaryKey = 'id_revlist';
	public $timestamps = false;

	protected $casts = [
		'id_revendedor' => 'int',
		'cantidad' => 'int'
	];

	protected $fillable = [
		'id_revendedor',
		'cantidad'
	];
}
