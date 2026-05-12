<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data;

use Saloon\Http\Response;

final readonly class ZadarmaRateLimitData
{
    public function __construct(
        public ?int $limit,
        public ?int $remaining,
        public ?int $reset,
        public ?string $method,
    ) {}

    public static function fromResponse(Response $response): self
    {
        return new self(
            limit: self::integerHeader($response, 'X-RateLimit-Limit'),
            remaining: self::integerHeader($response, 'X-RateLimit-Remaining'),
            reset: self::integerHeader($response, 'X-RateLimit-Reset'),
            method: self::stringHeader($response, 'X-Zadarma-Method'),
        );
    }

    public function hasHeaders(): bool
    {
        return $this->limit !== null
            || $this->remaining !== null
            || $this->reset !== null
            || $this->method !== null;
    }

    private static function integerHeader(Response $response, string $name): ?int
    {
        $value = $response->header($name);

        return is_string($value) && preg_match('/^\d+$/', $value) === 1 ? (int) $value : null;
    }

    private static function stringHeader(Response $response, string $name): ?string
    {
        $value = $response->header($name);

        if (is_string($value)) {
            return $value;
        }

        return null;
    }
}
