<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tipocampanium
 * 
 * @property int $id_tipo
 * @property string $tipo
 *
 * @package App\Models
 */
class Tipocampanium extends Model
{
	protected $table = 'tipocampania';
	protected $primaryKey = 'id_tipo';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_tipo' => 'int'
	];

	protected $fillable = [
		'tipo'
	];
}
