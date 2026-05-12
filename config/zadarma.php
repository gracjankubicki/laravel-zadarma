<?php

declare(strict_types=1);

return [
    'key' => env('ZADARMA_KEY'),

    'secret' => env('ZADARMA_SECRET'),

    'base_url' => env('ZADARMA_BASE_URL', 'https://api.zadarma.com'),

    'crm_base_url' => env('ZADARMA_CRM_BASE_URL', 'https://api.zadarma.com'),

    'throw_on_api_error' => env('ZADARMA_THROW_ON_API_ERROR', true),

    'rate_limits' => [
        'enabled' => env('ZADARMA_RATE_LIMITS_ENABLED', true),
        'store' => env('ZADARMA_RATE_LIMITS_STORE'),
        'general_per_minute' => env('ZADARMA_RATE_LIMITS_GENERAL_PER_MINUTE', 100),
        'statistics_per_minute' => env('ZADARMA_RATE_LIMITS_STATISTICS_PER_MINUTE', 3),
        'sleep' => env('ZADARMA_RATE_LIMITS_SLEEP', false),
    ],

    'webhooks' => [
        'signature_verification' => env('ZADARMA_WEBHOOK_SIGNATURE_VERIFICATION', false),

        'ip_allowlist' => [
            'enabled' => env('ZADARMA_WEBHOOK_IP_ALLOWLIST_ENABLED', false),
            'ranges' => ['185.45.152.40/30'],
        ],

        'routes' => [
            'enabled' => env('ZADARMA_WEBHOOK_ROUTES_ENABLED', false),
            'path' => env('ZADARMA_WEBHOOK_ROUTE_PATH', 'zadarma/webhook'),
            'name' => env('ZADARMA_WEBHOOK_ROUTE_NAME', 'zadarma.webhook'),
            'middleware' => [],
        ],
    ],
];
