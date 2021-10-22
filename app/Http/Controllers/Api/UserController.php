<?php
namespace App\Http\Controllers\Api;

use JWTAuth , DB, Auth;
use App\Models\{Usuariosbanda , Preregisstro };
use App\Http\Requests\Api\PreRegisterRequest;
//use App\Services\SendToken;
//use App\Http\Requests\Api\{SendTokenRequest , EmailTokenRequest};
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    public function store(PreRegisterRequest $request){
        try {
            DB::beginTransaction();
            $data=$request->all();
            $data['estado'] = 1;
            $entity=Preregisstro::create($data);
            DB::commit();
            $response = $this->getSuccessResponse($entity,"Registro de usuario exitoso");
        } catch (\Exception $e) {
            DB::rollBack();
            $code = $this->getCleanCode($e);
            $response= $this->getErrorResponse($e, 'Error al registrar el usuario');
        }//catch
        return $this->response($response, $code ?? 200);
    }

    public function auth(Request $request){
        try {
            $credentials = $request->only('usu00', 'contra00');

            $user = Usuariosbanda::where(function ($query)use($credentials){
                $query->where('usuariotie', $credentials['usu00'])
                    ->OrWhere('usuariotie' , 'like' , "%{$credentials['usu00']}@%")
                    ->OrWhere('email' , $credentials['usu00'] );
            })->where('contrasena' , md5($credentials['contra00']) )
                ->first();


            if (!$token = JWTAuth::fromUser($user) )
                throw new JWTException('Credenciales inválidas',400);

            $response=[
                "token"=>$token,
                "user"=>  $user ,
                "message"=>"Autenticación exitosa"
            ];

        } catch (\Exception $e) {
            $code = $this->getCleanCode($e);
            $response= $this->getErrorResponse($e,  "No se ha podido crear el token de usuario");
        }//catch
        return $this->response($response, $code ?? 200);
    }
  /*public function verifyEmail(SendTokenRequest $request){
    try {
      $entity=User::whereEmail($request->email)->first();

      $sendToken= new SendToken($entity);
      $sendToken->send();

      $response = $this->getSuccessResponse('', "Se ha enviado un correo electrónico para cambiar la contraseña");

    } catch (\Exception $e) {
      $code = $this->getCleanCode($e);
      $response= $this->getErrorResponse($e, 'Error al intentar reiniciar la contraseña');
    }//catch
    return $this->response($response, $code ?? 200);
  }//verifyEmail()

  public function resetPassword(EmailTokenRequest $request){
    try {

      DB::beginTransaction();

      $entity= PasswordReset::where('token',$request->input('token'))->first();
      $dateExpireToken = $entity->created_at->addHours(11);

      if($entity->status != 1)
      $this->executeMessageError('El token ha sido utilizado');

      if(now()->diffInHours($dateExpireToken) <= 0)
      $this->executeMessageError('El token ha expirado');

      $user = User::where('email' , $entity->email)->first();
      $user->password = bcrypt($request->new_password);
      $user->save();

      $entity->status = 0;
      $entity->save();

      $response = $this->getSuccessResponse('', "Cambio de clave exitoso");
      DB::commit();

    } catch (\Exception $e) {
      DB::rollBack();
      $code = $this->getCleanCode($e);
      $response= $this->getErrorResponse($e, 'Error al intentar reiniciar la contraseña');
    }//catch
    return $this->response($response, 200);
  }//verifyEmail()

  public function authenticate($role,Request $request)
  {
    $credentials = $request->only('email', 'password');
    try {

      if (! $token = JWTAuth::attempt($credentials)) {
        throw new JWTException('Credenciales inválidas',400);
      }
      $user=\Auth::user();
      if($user->hasRole($role)){
        if($role=="university")
        $user->load('university');
        if($role=='student' || $role=='organization')
        $user->load('participant');
        $response=[
          "token"=>$token,
          "user"=>   new UserCollection( $user ) ,
          "message"=>"Autenticación exitosa"
        ];
      }else{
        return response()->json(["message"=>'No cuentas con los permisos necesarios para acceder.'],404);
      }

    } catch (JWTException $e) {
      $code = $this->getCleanCode($e);
      $response= $this->getErrorResponse($e,  "No se ha podido crear el token de usuario");
    }//catch
    return $this->response($response, $code ?? 200);
  }

  public function getAuthenticatedUser()
  {
    if (!$user = JWTAuth::parseToken()->authenticate())
    return response()->json(["message"=>"Usuario no encontrado"],404);
    if($user->hasRole('university'))
    $user->load('university');
    if($user->hasRole('student') || $user->hasRole('organization'))
    $user->load('participant');
    return $this->response([
        "data"=>new UserCollection($user),
        "message"=>"Datos de usuario autenticado"
      ],$code ?? 200);
  }

  public function logout()
  {
      JWTAuth::invalidate(JWTAuth::getToken());
      return $this->response(["message"=> "Sesión cerrada"], 200);
  }*/

}
