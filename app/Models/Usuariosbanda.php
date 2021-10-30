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
 * Class Usuariosbanda
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
 * @property string $fechaMod
 *
 * @package App\Models
 */
class Usuariosbanda extends Authenticatable implements JWTSubject
{
	protected $table = 'usuariosbandas';
	protected $primaryKey = 'idusuario';
	public $timestamps = false;

    use Notifiable, HasRoles;

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
		'documento',
		'fechaMod',
	];

	public  $hidden = [ 'contrasena'  ];

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
