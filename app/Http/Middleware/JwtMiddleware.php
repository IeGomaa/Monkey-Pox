<?php

namespace App\Http\Middleware;

use App\Http\Traits\ApiResponseTrait;
use Closure;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtMiddleware
{
    use ApiResponseTrait;

    public function handle($request, Closure $next)
    {
        try {
            JWTAuth::parseToken()->authenticate();
        } catch (\Exception $e) {
            if ($e instanceof TokenInvalidException){
                return $this->apiResponse(422, 'Token is Invalid');
            }else if ($e instanceof TokenExpiredException){
                return $this->apiResponse(422, 'Token is Invalid');
            }else{
                return $this->apiResponse(422, 'Authorization Token not found');
            }
        }
        return $next($request);
    }
}
