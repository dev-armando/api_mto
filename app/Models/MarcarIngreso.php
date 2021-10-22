<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MarcarIngreso
 * 
 * @property string $json
 *
 * @package App\Models
 */
class MarcarIngreso extends Model
{
	protected $table = 'marcar_ingreso';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'json'
	];
}
