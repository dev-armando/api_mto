<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SubCategorium
 * 
 * @property int $id_sub_categoria
 * @property int $id_categoria
 * @property string $subcategoria
 * @property string $estado
 *
 * @package App\Models
 */
class SubCategorium extends Model
{
	protected $table = 'sub_categoria';
	protected $primaryKey = 'id_sub_categoria';
	public $timestamps = false;

	protected $casts = [
		'id_categoria' => 'int'
	];

	protected $fillable = [
		'id_categoria',
		'subcategoria',
		'estado'
	];
}
