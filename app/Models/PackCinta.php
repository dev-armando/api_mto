<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PackCinta
 * 
 * @property int $id_pack_cintas
 * @property float $pack_min_cintas
 * @property float $pack_importe_cintas
 *
 * @package App\Models
 */
class PackCinta extends Model
{
	protected $table = 'pack_cintas';
	protected $primaryKey = 'id_pack_cintas';
	public $timestamps = false;

	protected $casts = [
		'pack_min_cintas' => 'float',
		'pack_importe_cintas' => 'float'
	];

	protected $fillable = [
		'pack_min_cintas',
		'pack_importe_cintas'
	];
}
