<?php

namespace App\Http\Middleware;

use App\Http\Traits\ApiResponseTrait;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientAuthenticate
{
    use ApiResponseTrait;
    public function handle(Request $request, Closure $next)
    {
        if (! Auth::guard('patient')->check()) {
            return $this->apiResponse(401, 'Unauthorized');
        }
        return $next($request);
    }
}
