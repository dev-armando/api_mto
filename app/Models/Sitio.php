<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Sitio
 * 
 * @property string $estado
 *
 * @package App\Models
 */
class Sitio extends Model
{
	protected $table = 'sitio';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'estado'
	];
}
