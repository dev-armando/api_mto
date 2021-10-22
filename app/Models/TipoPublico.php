<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoPublico
 * 
 * @property int $id_tipo_publico
 * @property string $nombre_tipo_publico
 * @property int $priority
 *
 * @package App\Models
 */
class TipoPublico extends Model
{
	protected $table = 'tipo_publico';
	protected $primaryKey = 'id_tipo_publico';
	public $timestamps = false;

	protected $casts = [
		'priority' => 'int'
	];

	protected $fillable = [
		'nombre_tipo_publico',
		'priority'
	];
}
