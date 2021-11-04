<?php
namespace App\Http\Controllers\Api;

use DB, Log, Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Models\{Usuariosbanda as User , MercadopagoLog, Campanium };
use App\Http\Resources\MercadopagoLogCollection as ResourceCollection;

class MercadoPagoController extends Controller
{

    const URL_AUTH =  'https://auth.mercadopago.com.ar/authorization';
    const URL_OAUTH = 'https://api.mercadopago.com/oauth/token';

    public function authorization(Request $request , $user_id){

        try {
            DB::beginTransaction();

            $entity = User::find($user_id);
            if(!$entity) throw new Exception("User not found", 404);

            $app_id = env('MP_APP_ID');
            $redirect_url = env('MP_URL_CB');
            $random_id =  Str::random(40);
            $url =  SELF::URL_AUTH . "?client_id={$app_id}&response_type=code&platform_id=mp&state={$random_id}&redirect_uri={$redirect_url}";

            $entity->number_random = $random_id;
            $entity->save();

            DB::commit();
            Log::info(" Usuario para redirigir" . json_encode( compact('user_id') ));

        } catch (\Exception $e) {
            DB::rollBack();
            $code = $this->getCleanCode($e);
            $response= $this->getErrorResponse($e, 'Error al redireccionar el usuario');
            $url = env('URL_ADMIN_PANEL') . '?error=1';
            Log::error("No Redirect Mercado Pago" . json_encode( compact('code' , 'response') ));

        }//catch
        return redirect($url);
    }

    public function redirect(Request $request){

        $state = $request->input('state');
        $code = $request->input('code');

        try{

            if(!$state) throw new Exception("State not found", 404);
            if(!$code) throw new Exception("Code not found", 404);

            DB::beginTransaction();

            $entity = User::where('number_random' ,  $state)->first();

            if(!$entity) throw new Exception("User not found", 404);

            $body = [
                'client_secret' => env('MP_CLIENT_SECRET'),
                'client_id' => env('MP_CLIENT_ID'),
                'grant_type' => 'authorization_code',
                'code' => $code ,
                'redirect_uri' => env('MP_URL_CB'),
            ];

            $response = Http::post( SELF::URL_OAUTH  , $body);

            $entity->number_random = $response['user_id'];
            $entity->refresh_token = $response['refresh_token'];
            $entity->access_token = $response['access_token'];
            $entity->public_key = $response['public_key'];
            $entity->time_token = now()->format('Y-m-d');
            $entity->save();

            $events = Campanium::where('usuario' , $entity->id)
            ->where('estado' , 2)->where('pausado' , 1)
            ->get();

            if($events){

                foreach ($events as  $event) {
                    $event->pausado = 0;
                    $event->save();
                }
            }



            DB::commit();
            Log::info("Usuario Vinculado" . json_encode( compact('code' , 'response') ));
            $url = env('URL_ADMIN_PANEL') . '?success=1';

        }catch(\Exception $e){
            DB::rollBack();
            $code = $this->getCleanCode($e);
            $response= $this->getErrorResponse($e, 'Error al redireccionar el usuario');
            Log::error("No Redirect Mercado Pago" . json_encode( compact('code' , 'state', 'code', 'body' , 'response') ));
            $url = env('URL_ADMIN_PANEL') . '?error=2';
        }


        return redirect($url);
    }

    public function index(Request $request){

        $include = $request->input('include') ?? [];
        $id_campania = $request->input('id_campania');
        $payment_status = $request->input('payment_status');
        $date = $request->input('date');
        $page  = $request->input('page');
        $orderBy= $request->input('orderBy');
        $orderDirection= $request->input('orderDirection');

        try {

            $query = MercadopagoLog::with($include)->has('marketplaceLog');

            if($id_campania) $query->where('id_campania' , $id_campania);
            if($payment_status){

                if($payment_status == 'PENDING')
                    $query->whereIn('situaciondepago' , [$payment_status  , 'pendiente']);
                else
                    $query->where('situaciondepago' , $payment_status);

            }
            if($date) $query->whereDate('fecha',  '>=', $date);

            if($orderBy) $query->orderBy($orderBy,$orderDirection);
            else $query->orderBy("fecha","DESC");

            if($page) $query=$query->paginate();
            else $query=$query->get();

            $data = $page ? $query->items() : $query;
            $data = ResourceCollection::collection($data);

            $response = [
                'data' => $data,
                "message"=>"Listado de marketplace logs"
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

    public function notification(Request $request){
        try{
            $time = now();
            $data = $request->all();
            DB::beginTransaction();
            switch ($data['type']) {
                case 'mp-connect':
                    if($data['action'] == 'application.deauthorized'){

                        $user = User::where('number_random' , $data['user_id'] )->first();
                        if(!$user)  throw new Exception("User not found", 404);

                        $user->number_random = '';
                        $user->refresh_token = '';
                        $user->access_token = '';
                        $user->public_key = '';
                        $user->save();
                    }
                break;
            }
            Log::info("# Notificacion recibida " . json_encode( compact('data','time') ));
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            $code = $this->getCleanCode($e);
            $response= $this->getErrorResponse($e, 'Error al recibir la notificacion');
            Log::error("# Error al recibir notificacion " . json_encode( compact('code' ,'data','time') ));
        }


    }

    public function desauthorization(Request $request , $user_id){

        try {
            DB::beginTransaction();

            $entity = User::find($user_id);
            if(!$entity) throw new Exception("User not found", 404);


            $entity->number_random = '';
            $entity->access_token = '';
            $entity->save();

            $events = Campanium::where('usuario' , $user_id)
            ->where('estado' , 2)->where('pausado' , '0')->get();

            if($events){

                foreach ($events as  $event) {
                    $event->pausado = 1;
                    $event->save();
                }
            }

            DB::commit();
            Log::info(" Token Retirado" . json_encode( compact('user_id') ));
            $url = env('URL_ADMIN_PANEL') . '?success=2';

        } catch (\Exception $e) {
            DB::rollBack();
            $code = $this->getCleanCode($e);
            $response= $this->getErrorResponse($e, 'Error al desvincular el usuario');
            $url = env('URL_ADMIN_PANEL') . '?error=3';
            Log::error("No Redirect Mercado Pago" . json_encode( compact('code' , 'response') ));

        }//catch
        return redirect($url);
    }

}
