<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CorsMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // List of allowed origins
        $allowedOrigins = ['https://www.equifirst.ae', 'https://equifirst.ae', 'http://localhost:3000', 'http://127.0.0.1:3000']; // Add more origins if needed

        // Get the Origin header from the request
        $origin = $request->headers->get('Origin');

        // Check if the origin is in the allowed origins list
        if (in_array($origin, $allowedOrigins)) {
            $response = $next($request)
                ->header('Access-Control-Allow-Origin', $origin)  // Dynamically allow specific origin(s)
                ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')  // Allowed methods
                ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With')  // Allowed headers
                ->header('Access-Control-Allow-Credentials', 'true');  // Allow credentials (cookies, auth headers)
        } else {
            $response = $next($request);
        }

        // Handle preflight OPTIONS request (for CORS)
        if ($request->getMethod() == 'OPTIONS') {
            return response('', 204)
                ->header('Access-Control-Allow-Origin', $origin)
                ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With')
                ->header('Access-Control-Max-Age', 3600); // Cache preflight request for 1 hour
        }

        return $response;
    }
}
