<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 * 
 * @property int $id_producto
 * @property string $producto
 *
 * @package App\Models
 */
class Producto extends Model
{
	protected $table = 'productos';
	protected $primaryKey = 'id_producto';
	public $timestamps = false;

	protected $fillable = [
		'producto'
	];
}
