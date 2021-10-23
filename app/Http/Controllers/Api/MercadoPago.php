<?php
namespace App\Http\Controllers\Api;

use JWTAuth , DB;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class MercadoPago extends Controller
{

    const URL_AUTH =  'https://auth.mercadopago.com.ar/authorization';

    public function authorization(){

       // $url =  SELF::URL_AUTH . "?client_id={$app_id}&response_type=code&platform_id=mp&state={$random_id}&redirect_uri={$redirect_url}";
        //return redirect($url);

        return [];
    }

    public function redirect(){
        return [];
    }

}
