<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Categorium
 * 
 * @property int $id_categoria
 * @property string $categoria
 * @property string $estado
 *
 * @package App\Models
 */
class Categorium extends Model
{
	protected $table = 'categoria';
	protected $primaryKey = 'id_categoria';
	public $timestamps = false;

	protected $fillable = [
		'categoria',
		'estado'
	];
}
