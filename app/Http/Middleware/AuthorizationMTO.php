<?php

namespace App\Http\Middleware;

use Closure;

class AuthorizationMTO
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next , $roles = '')
    {
        $nivel = [  'admin' => 459 , 'user' => 3  ];
        $control = false;
        $mod_develop = env('MOD_DEVELOP');

        $roles = explode('|' , $roles);

        ini_set('session.cookie_domain', '.meticketonline.com');
        if(!isset($_SESSION)) session_start();

        if(!isset($_SESSION["nivel"] )) return response()->json( [  'message' => 'No autorizado' ] , 401);

        foreach ($roles as $rol) {
            if($nivel[$rol]  == $_SESSION["nivel"]  ) $control = true;
        }

        if(!$control && !$mod_develop) return response()->json( [  'message' => 'No autorizado'  ] , 401);

        return $next($request);
    }
}
