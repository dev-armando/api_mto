<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CredencialesMp
 * 
 * @property int $id_credenciales_mp
 * @property int $id_usuario_credenciales
 * @property string $client_id_credenciales
 * @property string $client_secret_credenciales
 * @property string $acces_token_credenciales
 * @property string $code
 * @property int|null $estado_credenciales
 * @property string $site_id
 * @property string $nick_name
 * @property int|null $user_id_credenciales
 * @property string $refresh_token
 * @property int|null $expires_in
 * @property string $registration_date
 * @property string $first_name
 * @property string $last_name
 * @property string $gender
 * @property string $country_id
 * @property string $email
 * @property string $type_identification
 * @property int|null $number_identification
 * @property string $direction_address
 * @property string $city_address
 * @property int|null $zip_code_address
 * @property string|null $phone_area_code
 * @property string $phone_extension
 * @property string $phone_number
 * @property string $alternative_phone_area_code
 * @property string $alternative_phone_extension
 * @property string $alternative_phone_number
 * @property string $permalink
 *
 * @package App\Models
 */
class CredencialesMp extends Model
{
	protected $table = 'credenciales_mp';
	protected $primaryKey = 'id_credenciales_mp';
	public $timestamps = false;

	protected $casts = [
		'id_usuario_credenciales' => 'int',
		'estado_credenciales' => 'int',
		'user_id_credenciales' => 'int',
		'expires_in' => 'int',
		'number_identification' => 'int',
		'zip_code_address' => 'int'
	];

	protected $hidden = [
		'client_secret_credenciales',
		'refresh_token'
	];

	protected $fillable = [
		'id_usuario_credenciales',
		'client_id_credenciales',
		'client_secret_credenciales',
		'acces_token_credenciales',
		'code',
		'estado_credenciales',
		'site_id',
		'nick_name',
		'user_id_credenciales',
		'refresh_token',
		'expires_in',
		'registration_date',
		'first_name',
		'last_name',
		'gender',
		'country_id',
		'email',
		'type_identification',
		'number_identification',
		'direction_address',
		'city_address',
		'zip_code_address',
		'phone_area_code',
		'phone_extension',
		'phone_number',
		'alternative_phone_area_code',
		'alternative_phone_extension',
		'alternative_phone_number',
		'permalink'
	];
}
