<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoDeEntrada
 * 
 * @property int $id_t_entrada
 * @property string $nombre
 * @property string $estado
 *
 * @package App\Models
 */
class TipoDeEntrada extends Model
{
	protected $table = 'tipo_de_entrada';
	protected $primaryKey = 'id_t_entrada';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'estado'
	];
}
