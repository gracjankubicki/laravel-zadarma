<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Http\Controllers;

use GracjanKubicki\LaravelZadarma\Events\ZadarmaWebhookReceived;
use GracjanKubicki\LaravelZadarma\Webhooks\ZadarmaWebhook;
use GracjanKubicki\LaravelZadarma\Webhooks\ZadarmaWebhookVerifier;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Event;

final readonly class ZadarmaWebhookController
{
    public function __invoke(Request $request, ZadarmaWebhookVerifier $verifier): Response
    {
        if ($request->query->has('zd_echo')) {
            return response((string) $request->query('zd_echo'), Response::HTTP_OK)
                ->header('Content-Type', 'text/plain');
        }

        $webhook = ZadarmaWebhook::fromRequest($request);

        if ((bool) config('zadarma.webhooks.signature_verification', false) && ! $verifier->verifyRequest($request, (string) config('zadarma.secret'))) {
            return response('', Response::HTTP_FORBIDDEN);
        }

        Event::dispatch(new ZadarmaWebhookReceived($webhook, $request));

        return response('', Response::HTTP_NO_CONTENT);
    }
}
