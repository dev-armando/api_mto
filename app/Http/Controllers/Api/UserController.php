<?php
namespace App\Http\Controllers\Api;

use JWTAuth , DB, Auth;
use App\Models\{Usuariosbanda , Preregisstro };
use App\Http\Requests\Api\PreRegisterRequest;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Controllers\Controller;
use App\Http\Resources\UsuariosBandaCollection;


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
            $credentials = [
              'usu00' => strtoupper($request->input('usu00')),
              'contra00' => strtoupper($request->input('contra00'))
            ];

            $user = Usuariosbanda::where(function ($query)use($credentials){
                $query->where('usuariotie', $credentials['usu00'])
                    ->OrWhere('usuariotie' , 'like' , "%{$credentials['usu00']}@%")
                    ->OrWhere('email' , $credentials['usu00'] );
            })->where('contrasena' , md5($credentials['contra00']) )
                ->first();


            if(!$user) throw new JWTException('Credenciales inválidas',400);

            if (!$token = JWTAuth::fromUser($user) )
                throw new JWTException('Credenciales inválidas',400);

            $response=[
                "token"=>$token,
                "user"=>  $user->usuariotie,
                "message"=>"Autenticación exitosa"
            ];

        } catch (\Exception $e) {
            $code = $this->getCleanCode($e);
            $response= $this->getErrorResponse($e,  "No se ha podido crear el token de usuario");
        }//catch
        return $this->response($response, $code ?? 200);
  }

  public function index(Request $request){
    $include = $request->input('include') ?? [];
    $status_mercadopago = $request->input('status_mercadopago');
    $page  = $request->input('page');
    $orderBy= $request->input('orderBy');
    $orderDirection= $request->input('orderDirection');

    try {

        $query = Usuariosbanda::with($include);

        if($status_mercadopago){

          switch ($status_mercadopago) {
            case '1': $query->where('access_token' , ''); break;
            case '2': $query->where('access_token' , '<>', ''); break;
            case '3': $query->whereDate('time_token' , '>=' ,  now()->date('Y-m-d') ); break;
          }
        }

        if($orderBy) $query->orderBy($orderBy,$orderDirection);
        else $query->orderBy("fecha","DESC");

        if($page) $query=$query->paginate();
        else $query=$query->get();

        $data = $page ? $query->items() : $query;
        $data = UsuariosBandaCollection::collection($data);

        $response = [
            'data' => $data,
            "message"=>"Listado de usuarios"
        ];

      if($page)
        $response['meta'] = [
            'page' => [
            "total" => $query->total(),
            "lastPage" => $query->lastPage(),
            "perPage" => $query->perPage(),
            "currentPage" => $query->currentPage()
            ]
        ];


    } catch (Exception $e) {

        $code = $this->getCleanCode($e);
        $response= $this->getErrorResponse($e, 'Error al consultar los registros');

    }

    return $this->response($response, $code ?? 200);
  }

  public function logout()
  {
      JWTAuth::invalidate(JWTAuth::getToken());
      return $this->response(["message"=> "Sesión cerrada"], 200);
  }

}
