<?php

return [

    'paths' => ['api/*', 'sanctum/csrf-cookie'],  // Ensure your API routes are included

    'allowed_methods' => ['*'],  // Allow all HTTP methods (GET, POST, etc.)
    'allowed_origins' => ['https://www.equifirst.ae'],  // Only allow requests from this domain
    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],  // Allow all headers (or specify specific ones like 'Content-Type', 'Authorization')
    'exposed_headers' => [],
    'max_age' => 0,

    'supports_credentials' => true,  // Allow credentials (cookies, Authorization headers)
];

