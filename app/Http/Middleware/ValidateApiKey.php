<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!$request->header('x-api-key')){
            return response()->json(['message' => 'Api key must be provided'],401);
        }

        $apiKey = $request->header('x-api-key');

        if($apiKey !== 'a89e4fb3-e1ca-47be-85f2-64d97c4aaa14'){
            return response()->json(['message' => 'Invalid API Key'],401);
        }
        return $next($request);
    }
}
