<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarketplaceLog extends Model
{
    protected $table = 'marketplace_logs';

	protected $fillable = [
		'id_log_mp',
		'fee_mto',
		'fixed_value',
		'unit_price',
		'fee_total'
	];

}
