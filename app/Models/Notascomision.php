<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Notascomision
 * 
 * @property string $nota1
 * @property string $nota2
 * @property string $nota3
 * @property string $nota4
 *
 * @package App\Models
 */
class Notascomision extends Model
{
	protected $table = 'notascomision';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'nota1',
		'nota2',
		'nota3',
		'nota4'
	];
}
