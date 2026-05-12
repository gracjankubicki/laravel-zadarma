<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Webhooks;

use Illuminate\Http\Request;

final class ZadarmaWebhookVerifier
{
    public function supportsSignatureVerification(): bool
    {
        return true;
    }

    public function verifyRequest(Request $request, string $secret): bool
    {
        $signature = $request->header('Signature');

        if (! is_string($signature)) {
            return false;
        }

        return $this->verify($request->all(), $signature, $secret);
    }

    /**
     * @param  array<string, mixed>  $payload
     */
    public function verify(array $payload, string $signature, string $secret): bool
    {
        $expected = $this->signature($payload, $secret);

        return $expected !== null && hash_equals($expected, $signature);
    }

    /**
     * @param  array<string, mixed>  $payload
     */
    public function signature(array $payload, string $secret): ?string
    {
        $signingPayload = $this->signingPayload($payload);

        if ($signingPayload === null) {
            return null;
        }

        return base64_encode(hash_hmac('sha1', $signingPayload, $secret));
    }

    /**
     * @param  array<string, mixed>  $payload
     */
    private function signingPayload(array $payload): ?string
    {
        $event = $payload['event'] ?? null;

        if (! is_string($event)) {
            return null;
        }

        return match (ZadarmaWebhook::normalizeEventName($event)) {
            ZadarmaWebhookEvent::NotifyStart->value,
            ZadarmaWebhookEvent::NotifyInternal->value,
            ZadarmaWebhookEvent::NotifyEnd->value,
            ZadarmaWebhookEvent::NotifyIvr->value => $this->joined($payload, ['caller_id', 'called_did', 'call_start']),

            ZadarmaWebhookEvent::NotifyAnswer->value => $this->joined($payload, ['caller_id', 'destination', 'call_start']),

            ZadarmaWebhookEvent::NotifyOutStart->value,
            ZadarmaWebhookEvent::NotifyOutEnd->value => $this->joined($payload, ['internal', 'destination', 'call_start']),

            ZadarmaWebhookEvent::NotifyRecord->value => $this->joined($payload, ['pbx_call_id', 'call_id_with_rec']),

            ZadarmaWebhookEvent::NumberLookup->value,
            ZadarmaWebhookEvent::CallTracking->value,
            ZadarmaWebhookEvent::Sms->value,
            ZadarmaWebhookEvent::SpeechRecognition->value,
            ZadarmaWebhookEvent::Document->value => $this->scalar($payload['result'] ?? null),

            default => null,
        };
    }

    /**
     * @param  array<string, mixed>  $payload
     * @param  list<string>  $keys
     */
    private function joined(array $payload, array $keys): ?string
    {
        $values = [];

        foreach ($keys as $key) {
            $value = $this->scalar($payload[$key] ?? null);

            if ($value === null) {
                return null;
            }

            $values[] = $value;
        }

        return implode('', $values);
    }

    private function scalar(mixed $value): ?string
    {
        if (is_string($value)) {
            return $value;
        }

        if (is_int($value) || is_float($value) || is_bool($value)) {
            return (string) $value;
        }

        return null;
    }
}
