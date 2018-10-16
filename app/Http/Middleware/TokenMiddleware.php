<?php

namespace App\Http\Middleware;

use Closure;
use App\Client;

class TokenMiddleware
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
        $token = $request->input('api_token');
        if(!Client::where('api_token' , $token)->exists())
        {
            return apiResponse(400 , 'Not Authorized');
        }
        return $next($request);
    }
}
