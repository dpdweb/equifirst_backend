<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for Cross-Origin Resource Sharing
    | or "CORS". By default, Laravel will allow all origins, but you may
    | modify this to only allow specific domains as per your requirements.
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie', '*'], // Add other paths if needed

    'allowed_methods' => ['*'], // Allow all HTTP methods (GET, POST, PUT, DELETE, OPTIONS)

    // 'allowed_origins' => [
    //     'https://www.equifirst.ae',
    //     'https://equifirst.ae', // Allow both www and non-www versions
    // ],

        'allowed_origins' => [
        'http://localhost:3000',
    'http://127.0.0.1:3000',
    'https://www.equifirst.ae',
    'https://equifirst.ae',

    ],

    'allowed_origins_patterns' => [], // You can use regular expressions here if needed

    'allowed_headers' => ['*'], // Allow all headers
    'exposed_headers' => [],
    'max_age' => 0,

    // Support credentials (cookies, auth headers)
    'supports_credentials' => true,
];
