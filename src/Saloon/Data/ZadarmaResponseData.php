<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data;

use Saloon\Http\Response;
use Throwable;

class ZadarmaResponseData
{
    /**
     * @param  array<string, mixed>  $payload
     */
    final public function __construct(
        public readonly array $payload,
        public readonly int $statusCode,
        public readonly ?string $status = null,
        public readonly ?string $message = null,
    ) {}

    public static function fromResponse(Response $response): static
    {
        try {
            $payload = $response->json();
        } catch (Throwable) {
            $payload = null;
        }

        if (! is_array($payload)) {
            $payload = ['body' => $response->body()];
        }

        return new static(
            payload: $payload,
            statusCode: $response->status(),
            status: is_string($payload['status'] ?? null) ? $payload['status'] : null,
            message: is_string($payload['message'] ?? null) ? $payload['message'] : null,
        );
    }

    public function successfulApiStatus(): bool
    {
        return $this->status === null || $this->status === 'success';
    }
}
