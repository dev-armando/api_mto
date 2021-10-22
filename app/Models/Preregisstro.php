<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Preregisstro
 *
 * @property int $id_pre
 * @property string $nombre
 * @property string $email
 * @property string $empresa
 * @property string $telefono
 * @property string $estado
 *
 * @package App\Models
 */
class Preregisstro extends Model
{
	protected $table = 'preregisstro';
	protected $primaryKey = 'id_pre';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'email',
		'empresa',
		'telefono',
        'estado'
	];
}
