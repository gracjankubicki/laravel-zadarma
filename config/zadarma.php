<?php

declare(strict_types=1);

return [
    'key' => env('ZADARMA_KEY'),

    'secret' => env('ZADARMA_SECRET'),

    'base_url' => env('ZADARMA_BASE_URL', 'https://api.zadarma.com'),

    'crm_base_url' => env('ZADARMA_CRM_BASE_URL', 'https://api.zadarma.com'),

    'throw_on_api_error' => env('ZADARMA_THROW_ON_API_ERROR', true),
];
