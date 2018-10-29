<?php

namespace App\Http\Middleware;

use Closure;

class JsonMiddleware
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
        if (!$request->isJson()){
            return response()->json([
               "error" => true,
                "message" => "Request Must Be Json"
            ],200);
        }
        return $next($request);
    }
}
