<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Reembolso
 * 
 * @property int $id_reembolso
 * @property string $tiporeembolso
 * @property string $descripcion
 *
 * @package App\Models
 */
class Reembolso extends Model
{
	protected $table = 'reembolso';
	protected $primaryKey = 'id_reembolso';
	public $timestamps = false;

	protected $fillable = [
		'tiporeembolso',
		'descripcion'
	];
}
