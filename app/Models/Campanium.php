<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Campanium
 *
 * @property int $id_campania
 * @property int $id_comercio
 * @property int $id_artista
 * @property int $id_calendario
 * @property int $cantidad
 * @property Carbon $fecha
 * @property string $lugar
 * @property float $importe
 * @property int $estado
 * @property bool $bloquea_edicion
 * @property int|null $id_restriccion
 * @property string $direccion
 * @property string $localidad
 * @property string $provincia
 * @property int $usuario
 * @property int $vendidas
 * @property int $tipo
 * @property int $opcion_stream
 * @property int $evento_accion_al_finalizar
 * @property string $nombreCampania
 * @property float $importeinicial
 * @property float $iibb
 * @property float $ml
 * @property float $monotributo
 * @property float $ganancia
 * @property Carbon $fechaMod
 * @property Carbon $fechaEvento
 * @property string $lugarEvento
 * @property string $pais
 * @property string $hora_puerta
 * @property string $hora_evento
 * @property string $facebook
 * @property string $twitter
 * @property string $youtube
 * @property string $instagramOficial
 * @property string $spotifyOficial
 * @property int $categoria_id
 * @property int $subcategoria_id
 * @property int $id_reembolso
 * @property int $cantidadFecha
 * @property string $destacado
 * @property string $slider
 * @property int $popup
 * @property string|null $imagen
 * @property string|null $titulo
 * @property string|null $descripcion
 * @property string $sitio_oficial
 * @property string|null $artistaEvento
 * @property Carbon|null $fecha_mod
 * @property string|null $metodo_pago
 * @property int $pausado
 * @property string|null $info_cambios
 * @property string $slug_campania
 * @property string|null $publico_evento
 * @property int $mostrarEventoEnSitio
 * @property string|null $link_del_stream
 * @property string|null $campania_url_servidor
 * @property string|null $campania_clave_transmision
 * @property int|null $id_credenciales_mp
 *
 * @package App\Models
 */
class Campanium extends Model
{
	protected $table = 'campania';
	protected $primaryKey = 'id_campania';
	public $timestamps = false;


	protected $casts = [
		'id_comercio' => 'int',
		'id_artista' => 'int',
		'id_calendario' => 'int',
		'cantidad' => 'int',
		'importe' => 'float',
		'estado' => 'int',
		'bloquea_edicion' => 'bool',
		'id_restriccion' => 'int',
		'usuario' => 'int',
		'vendidas' => 'int',
		'tipo' => 'int',
		'opcion_stream' => 'int',
		'evento_accion_al_finalizar' => 'int',
		'importeinicial' => 'float',
		'iibb' => 'float',
		'ml' => 'float',
		'monotributo' => 'float',
		'ganancia' => 'float',
		'categoria_id' => 'int',
		'subcategoria_id' => 'int',
		'id_reembolso' => 'int',
		'cantidadFecha' => 'int',
		'popup' => 'int',
		'pausado' => 'int',
		'mostrarEventoEnSitio' => 'int',
		'id_credenciales_mp' => 'int'
	];

	protected $dates = [
		'fecha',
		'fechaMod',
		'fechaEvento',
		'fecha_mod'
	];

	protected $fillable = [
		'id_comercio',
		'id_artista',
		'id_calendario',
		'cantidad',
		'fecha',
		'lugar',
		'importe',
		'estado',
		'bloquea_edicion',
		'id_restriccion',
		'direccion',
		'localidad',
		'provincia',
		'usuario',
		'vendidas',
		'tipo',
		'opcion_stream',
		'evento_accion_al_finalizar',
		'nombreCampania',
		'importeinicial',
		'iibb',
		'ml',
		'monotributo',
		'ganancia',
		'fechaMod',
		'fechaEvento',
		'lugarEvento',
		'pais',
		'hora_puerta',
		'hora_evento',
		'facebook',
		'twitter',
		'youtube',
		'instagramOficial',
		'spotifyOficial',
		'categoria_id',
		'subcategoria_id',
		'id_reembolso',
		'cantidadFecha',
		'destacado',
		'slider',
		'popup',
		'imagen',
		'titulo',
		'descripcion',
		'sitio_oficial',
		'artistaEvento',
		'fecha_mod',
		'metodo_pago',
		'pausado',
		'info_cambios',
		'slug_campania',
		'publico_evento',
		'mostrarEventoEnSitio',
		'link_del_stream',
		'campania_url_servidor',
		'campania_clave_transmision',
		'id_credenciales_mp',
		'id_campania'
	];

	public function mercadopagoLog(){
		return $this->hasMany(MercadopagoLog::class , 'id_campania' , 'id_campania' );
	}

	public function artist(){
		return $this->hasOne(Usuariosbanda::class , 'idusuario' , 'id_artista');
	}

	public function entradas(){
		return $this->hasMany(Tipoentrada::class , 'id_campania' , 'id_campania' );
	}

}


