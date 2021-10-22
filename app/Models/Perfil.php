<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Perfil
 * 
 * @property int $id_perfil
 * @property int $id_usuario
 * @property string $razon_social
 * @property string $cuil
 * @property string $empresa
 * @property string $domicilio_fiscal
 * @property string $nombre_contacto
 * @property string $apellido_contacto
 * @property string $telefono
 * @property string $telefono2
 * @property string $direccion
 * @property int $pais_id
 * @property int $provincia_id
 * @property int $localidad_id
 * @property string $cp
 * @property string $email
 * @property string|null $artista
 * @property bool $tiene_perfil
 * @property string $slug_empresa
 * @property int $pago_terceros
 * @property int $id_pvi
 * @property string|null $condicion_iva
 * @property string|null $img_dni_frente
 * @property string|null $img_dni_dorso
 * @property int|null $servicios
 * @property int $id_lugar_dedicado
 * @property int|null $evento_free
 * @property int|null $evento_streaming
 *
 * @package App\Models
 */
class Perfil extends Model
{
	protected $table = 'perfil';
	protected $primaryKey = 'id_perfil';
	public $timestamps = false;

	protected $casts = [
		'id_usuario' => 'int',
		'pais_id' => 'int',
		'provincia_id' => 'int',
		'localidad_id' => 'int',
		'tiene_perfil' => 'bool',
		'pago_terceros' => 'int',
		'id_pvi' => 'int',
		'servicios' => 'int',
		'id_lugar_dedicado' => 'int',
		'evento_free' => 'int',
		'evento_streaming' => 'int'
	];

	protected $fillable = [
		'id_usuario',
		'razon_social',
		'cuil',
		'empresa',
		'domicilio_fiscal',
		'nombre_contacto',
		'apellido_contacto',
		'telefono',
		'telefono2',
		'direccion',
		'pais_id',
		'provincia_id',
		'localidad_id',
		'cp',
		'email',
		'artista',
		'tiene_perfil',
		'slug_empresa',
		'pago_terceros',
		'id_pvi',
		'condicion_iva',
		'img_dni_frente',
		'img_dni_dorso',
		'servicios',
		'id_lugar_dedicado',
		'evento_free',
		'evento_streaming'
	];
}
