<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;
class authJWT
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
          if (isset($request->token)) {
            return response()->json(['status'=>false,'code'=>'-1']);
        }
     try {
          if (!$user = JWTAuth::parseToken()->authenticate()) {
                return $this->outApiJson('code','-6');
            }
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json(['status'=>false,'code'=>'-1']);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return response()->json(['status'=>false,'code'=>'-3']);
            }else{
                return response()->json(['status'=>false,'code'=>'-5']);
            }
        }
        return $next($request);
    }
}
