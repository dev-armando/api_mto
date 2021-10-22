<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Medio
 * 
 * @property int $tarjeta
 * @property int $pagoFacil
 * @property int $rapiPago
 * @property int $link
 * @property int $banelco
 * @property int $provincia
 *
 * @package App\Models
 */
class Medio extends Model
{
	protected $table = 'medios';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'tarjeta' => 'int',
		'pagoFacil' => 'int',
		'rapiPago' => 'int',
		'link' => 'int',
		'banelco' => 'int',
		'provincia' => 'int'
	];

	protected $fillable = [
		'tarjeta',
		'pagoFacil',
		'rapiPago',
		'link',
		'banelco',
		'provincia'
	];
}
