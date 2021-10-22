<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BlackList
 * 
 * @property int $id_black_list
 * @property string $black_list_dato
 * @property string $black_list_mail
 * @property int $black_list_dni
 * @property int $black_list_id_usuario
 * @property int $black_list_id_evento
 * @property Carbon $black_list_fecha
 *
 * @package App\Models
 */
class BlackList extends Model
{
	protected $table = 'black_list';
	protected $primaryKey = 'id_black_list';
	public $timestamps = false;

	protected $casts = [
		'black_list_dni' => 'int',
		'black_list_id_usuario' => 'int',
		'black_list_id_evento' => 'int'
	];

	protected $dates = [
		'black_list_fecha'
	];

	protected $fillable = [
		'black_list_dato',
		'black_list_mail',
		'black_list_dni',
		'black_list_id_usuario',
		'black_list_id_evento',
		'black_list_fecha'
	];
}
