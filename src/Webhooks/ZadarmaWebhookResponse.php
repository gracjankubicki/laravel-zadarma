<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Webhooks;

use GracjanKubicki\LaravelZadarma\Enums\IvrLanguage;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use JsonSerializable;

final readonly class ZadarmaWebhookResponse implements JsonSerializable, Responsable
{
    /**
     * @param  array<string, mixed>  $payload
     */
    private function __construct(
        private array $payload,
    ) {}

    public static function redirect(string|int $redirect, ?int $returnTimeout = null, ?string $rewriteForwardNumber = null): self
    {
        $payload = ['redirect' => $redirect];

        if ($returnTimeout !== null) {
            $payload['return_timeout'] = $returnTimeout;
        }

        if ($rewriteForwardNumber !== null) {
            $payload['rewrite_forward_number'] = $rewriteForwardNumber;
        }

        return new self($payload);
    }

    public static function hangup(): self
    {
        return new self(['hangup' => 1]);
    }

    public static function callerName(string $name): self
    {
        return new self(['caller_name' => $name]);
    }

    public static function waitDtmf(int $timeout, int $attempts, int $maxDigits, string $name, ?string $default = null): self
    {
        $payload = [
            'timeout' => $timeout,
            'attempts' => $attempts,
            'maxdigits' => $maxDigits,
            'name' => $name,
        ];

        if ($default !== null) {
            $payload['default'] = $default;
        }

        return new self(['wait_dtmf' => $payload]);
    }

    public static function ivrPlay(string|int $soundId): self
    {
        return new self(['ivr_play' => (string) $soundId]);
    }

    public static function ivrSayPopular(int $phrase, IvrLanguage|string $language = IvrLanguage::English): self
    {
        return new self([
            'ivr_saypopular' => $phrase,
            'language' => self::languageValue($language),
        ]);
    }

    public static function ivrSayDigits(string|int $digits, IvrLanguage|string $language = IvrLanguage::English): self
    {
        return new self([
            'ivr_saydigits' => (string) $digits,
            'language' => self::languageValue($language),
        ]);
    }

    public static function ivrSayNumber(string|int $number, IvrLanguage|string $language = IvrLanguage::English): self
    {
        return new self([
            'ivr_saynumber' => (string) $number,
            'language' => self::languageValue($language),
        ]);
    }

    public function withCallerName(string $name): self
    {
        return $this->with('caller_name', $name);
    }

    public function withWaitDtmf(int $timeout, int $attempts, int $maxDigits, string $name, ?string $default = null): self
    {
        return $this->merge(self::waitDtmf($timeout, $attempts, $maxDigits, $name, $default));
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return $this->payload;
    }

    public function toResponse($request): JsonResponse
    {
        return $this->toJsonResponse();
    }

    public function toJsonResponse(int $status = 200): JsonResponse
    {
        return response()->json($this->payload, $status);
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        return $this->payload;
    }

    private function with(string $key, mixed $value): self
    {
        return new self([$key => $value] + $this->payload);
    }

    private function merge(self $response): self
    {
        return new self($response->toArray() + $this->payload);
    }

    private static function languageValue(IvrLanguage|string $language): string
    {
        return $language instanceof IvrLanguage ? $language->value : $language;
    }
}
