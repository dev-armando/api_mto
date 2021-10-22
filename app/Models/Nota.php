<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Nota
 * 
 * @property string $nota1
 * @property string $nota2
 * @property string $nota3
 * @property string $nota4
 *
 * @package App\Models
 */
class Nota extends Model
{
	protected $table = 'notas';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'nota1',
		'nota2',
		'nota3',
		'nota4'
	];
}
