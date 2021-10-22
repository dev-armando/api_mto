<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PackTicket
 * 
 * @property int $id_pack_ticket
 * @property float $pack_min_ticket
 * @property float $pack_importe_ticket
 *
 * @package App\Models
 */
class PackTicket extends Model
{
	protected $table = 'pack_ticket';
	protected $primaryKey = 'id_pack_ticket';
	public $timestamps = false;

	protected $casts = [
		'pack_min_ticket' => 'float',
		'pack_importe_ticket' => 'float'
	];

	protected $fillable = [
		'pack_min_ticket',
		'pack_importe_ticket'
	];
}
