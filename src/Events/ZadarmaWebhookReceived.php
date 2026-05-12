<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Events;

use GracjanKubicki\LaravelZadarma\Webhooks\ZadarmaWebhook;
use Illuminate\Http\Request;

final readonly class ZadarmaWebhookReceived
{
    public function __construct(
        public ZadarmaWebhook $webhook,
        public Request $request,
    ) {}
}
