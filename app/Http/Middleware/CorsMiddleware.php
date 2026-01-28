<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CorsMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Allow all domains or specific domains only
        $response = $next($request)
            ->header('Access-Control-Allow-Origin', 'https://www.equifirst.ae')  // Allow only specific origin(s)
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')  // Allowed methods
            ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With')  // Allowed headers
            ->header('Access-Control-Allow-Credentials', 'true');  // Allow credentials (cookies, auth headers)

        // Handle preflight OPTIONS request (for CORS)
        if ($request->getMethod() == 'OPTIONS') {
            return response('', 204)
                ->header('Access-Control-Allow-Origin', 'https://www.equifirst.ae')
                ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With')
                ->header('Access-Control-Max-Age', 3600);
        }

        return $response;
    }
}


