<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MercadopagoLog
 *
 * @property int $id_campania
 * @property string|null $respuesta
 * @property string $email
 * @property string|null $nombre
 * @property string|null $apellido
 * @property string $dni
 * @property int $cantidad
 * @property Carbon $fecha
 * @property int|null $id_inicio
 * @property int $ID
 * @property bool $exito
 * @property string $id_operation
 * @property string $entidad
 * @property string|null $requestkey
 * @property float|null $preciounitario_sin
 * @property float|null $preciounitario_con
 * @property float $preciototal
 * @property int $id_tipoent
 * @property string|null $nombremediodepago
 * @property string $tipomediodepago
 * @property string|null $situaciondepago
 * @property string $nom_ape
 * @property int|null $id_credenciales_mp
 *
 * @package App\Models
 */
class MercadopagoLog extends Model
{
	protected $table = 'mercadopago_log';
	protected $primaryKey = 'id_operation';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_campania' => 'int',
		'cantidad' => 'int',
		'id_inicio' => 'int',
		'ID' => 'int',
		'exito' => 'bool',
		'preciounitario_sin' => 'float',
		'preciounitario_con' => 'float',
		'preciototal' => 'float',
		'id_tipoent' => 'int',
		'id_credenciales_mp' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'id_campania',
		'respuesta',
		'email',
		'nombre',
		'apellido',
		'dni',
		'cantidad',
		'fecha',
		'id_inicio',
		'ID',
		'exito',
		'entidad',
		'requestkey',
		'preciounitario_sin',
		'preciounitario_con',
		'preciototal',
		'id_tipoent',
		'nombremediodepago',
		'tipomediodepago',
		'situaciondepago',
		'nom_ape',
		'id_credenciales_mp'
	];

	public function marketplaceLog(){
		return $this->hasOne(MarketplaceLog::class, 'id_log_mp', 'id_operation');
	}

	public function campania(){
		return $this->hasOne(Campanium::class, 'id_campania', 'id_campania');
	}
}
