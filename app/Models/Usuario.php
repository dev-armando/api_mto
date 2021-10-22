<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class Usuario
 *
 * @property int $idusuario
 * @property string $usuariotie
 * @property string $nombre
 * @property string $apellido
 * @property string $pais
 * @property string $localidad
 * @property string $contrasena
 * @property string $fecha
 * @property int $estado
 * @property string $provincia
 * @property string $direccion
 * @property string $email
 * @property string $cp
 * @property string $telefono
 * @property string $documento
 *
 * @package App\Models
 */
class Usuario extends Model
{
    use Notifiable, HasRoles;

	protected $table = 'usuario';
	protected $primaryKey = 'idusuario';
	public $timestamps = false;

	protected $casts = [
		'estado' => 'int'
	];



	protected $fillable = [
		'usuariotie',
		'nombre',
		'apellido',
		'pais',
		'localidad',
		'contrasena',
		'fecha',
		'estado',
		'provincia',
		'direccion',
		'email',
		'cp',
		'telefono',
		'documento'
	];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
