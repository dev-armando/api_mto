<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pvi
 * 
 * @property int $id_pvi
 * @property int $id_usuario
 * @property string $nombre_contacto_pvi
 * @property string $apellido_contacto_pvi
 * @property string $nombre_local_pvi
 * @property string $mail_contacto_pvi
 * @property string $domicilio_pvi
 * @property int $pais_pvi
 * @property int $provincia_pvi
 * @property int $localidad_pvi
 * @property string $cp_pvi
 * @property int $telefono_pvi
 * @property string $horarios_pvi
 *
 * @package App\Models
 */
class Pvi extends Model
{
	protected $table = 'pvi';
	protected $primaryKey = 'id_pvi';
	public $timestamps = false;

	protected $casts = [
		'id_usuario' => 'int',
		'pais_pvi' => 'int',
		'provincia_pvi' => 'int',
		'localidad_pvi' => 'int',
		'telefono_pvi' => 'int'
	];

	protected $fillable = [
		'id_usuario',
		'nombre_contacto_pvi',
		'apellido_contacto_pvi',
		'nombre_local_pvi',
		'mail_contacto_pvi',
		'domicilio_pvi',
		'pais_pvi',
		'provincia_pvi',
		'localidad_pvi',
		'cp_pvi',
		'telefono_pvi',
		'horarios_pvi'
	];
}
