<?php
namespace App\Http\Controllers\Api;

use DB, Log, Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Models\Usuariosbanda as User;

class MercadoPago extends Controller
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

            return $body;

            //$response = Http::post( SELF::URL_OAUTH  , $body);

            if($response->throw()) throw new Exception("Http Error", 400);

            $entity->number_random = '';
            $entity->refresh_token = $response['refresh_token'];
            $entity->access_token = $response['access_token'];
            $entity->public_key = $response['public_key'];
            $entity->time_token = now()->format('Y-m-d');
            $entity->fee = env('MP_FEE');


            DB::commit();
            Log::info("Usuario Vinculado" . json_encode( compact('code' , 'response') ));
            $url = env('URL_ADMIN_PANEL') . '?success=1';

        }catch(\Exception $e){
            $code = $this->getCleanCode($e);
            $response= $this->getErrorResponse($e, 'Error al redireccionar el usuario');
            Log::error("No Redirect Mercado Pago" . json_encode( compact('code' , 'state', 'code', 'body' , 'response') ));
            $url = env('URL_ADMIN_PANEL') . '?error=2';
        }


        return redirect($url);
    }



}
