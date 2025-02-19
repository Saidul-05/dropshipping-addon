<?php

return [
    'endpoints' => [
        'ali_express' => env('ALI_EXPRESS_API_ENDPOINT', 'https://api.aliexpress.com/v1/products'),
        'cj' => env('CJ_API_ENDPOINT', 'https://api.cjdropshipping.com/v1/products'),
    ],
    'default_markup' => 1.2, // 20% markup
];
