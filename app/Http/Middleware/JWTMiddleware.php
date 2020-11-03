<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JWTMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try
        {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e)
        {
            if ($e instanceof\Tymon\JWTAuth\Exceptions\TokenInvalidException)
            {
                return Response()->json(['status'=>'Token is Invalid']);
            } else if ($e instanceof\Tymon\JWTAuth\Exceptions\TokenExpiredException)
            {
                return Response()->json(['status'=>'Token is Expired']);
            } else
            {
                return Response()->json(['status'=>'Authorization Token not Found']);
            }
        }

        return $next($request);
        
    }
}
