<?php

namespace App\Http\Middleware;

use Closure, JWTAuth, Exception;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtRoleMiddleware
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
        try {
            $roles = explode('|' , $roles);
            $levels = [  459 => 'admin' , 3=> 'user' ];
            $control = false;
            $user = JWTAuth::parseToken()->authenticate();

           foreach ($roles as $rol)
                if($levels[$user->estado] == $rol) $control = true;

            if(!$control)
                throw new Exception('unauthorized user' , 401);

        } catch (Exception $e) {

            $code = $e->getCode() ? (is_numeric($e->getCode()) ? $e->getCode() : 500) : 500;
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json(['status' => 'Token is Invalid'] , 401 );
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return response()->json(['status' => 'Token is Expired'], 401);
            }else{
                return response()->json(['status' => $e->getMessage() ?? 'Authorization Token not found'],  401);
            }
        }
        return $next($request);
    }
}
