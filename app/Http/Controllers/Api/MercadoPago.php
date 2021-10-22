<?php
namespace App\Http\Controllers\Api;

use JWTAuth , DB;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Controllers\Controller;


class MercadoPago extends Controller
{

    public function authorization(){
        try {

        } catch (Throwable $th) {

        }
    }

    public function auth(Request $request){
        /*try {
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
        return $this->response($response, $code ?? 200);*/
    }

}
