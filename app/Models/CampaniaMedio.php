<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CampaniaMedio
 * 
 * @property int $id_medio
 * @property int $id_campania
 * @property string $url_medio
 * @property int $tipo_medio
 *
 * @package App\Models
 */
class CampaniaMedio extends Model
{
	protected $table = 'campania_medios';
	protected $primaryKey = 'id_medio';
	public $timestamps = false;

	protected $casts = [
		'id_campania' => 'int',
		'tipo_medio' => 'int'
	];

	protected $fillable = [
		'id_campania',
		'url_medio',
		'tipo_medio'
	];
}
