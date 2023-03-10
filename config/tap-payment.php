<?php

return [
    "mode" => env('TAP_PAYMENT_MODE', "test"),

    "api_key" => env('TAP_SECRET_API_KEY'),

    "api_url" => env('TAP_API_URL', 'https://api.tap.company/v2/'),
];
