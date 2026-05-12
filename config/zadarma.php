<?php

declare(strict_types=1);

return [
    'key' => env('ZADARMA_KEY'),

    'secret' => env('ZADARMA_SECRET'),

    'base_url' => env('ZADARMA_BASE_URL', 'https://api.zadarma.com'),

    'crm_base_url' => env('ZADARMA_CRM_BASE_URL', 'https://api.zadarma.com'),

    'throw_on_api_error' => env('ZADARMA_THROW_ON_API_ERROR', true),

    'webhooks' => [
        'signature_verification' => env('ZADARMA_WEBHOOK_SIGNATURE_VERIFICATION', false),

        'routes' => [
            'enabled' => env('ZADARMA_WEBHOOK_ROUTES_ENABLED', false),
            'path' => env('ZADARMA_WEBHOOK_ROUTE_PATH', 'zadarma/webhook'),
            'name' => env('ZADARMA_WEBHOOK_ROUTE_NAME', 'zadarma.webhook'),
            'middleware' => [],
        ],
    ],
];
