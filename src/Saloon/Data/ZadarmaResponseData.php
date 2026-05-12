<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data;

use Illuminate\Support\Arr;
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
        public readonly ?ZadarmaRateLimitData $rateLimit = null,
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
            rateLimit: ZadarmaRateLimitData::fromResponse($response),
        );
    }

    public function successfulApiStatus(): bool
    {
        return $this->status === null || $this->status === 'success';
    }

    public function has(string $path): bool
    {
        return Arr::has($this->payload, $path);
    }

    public function get(string $path, mixed $default = null): mixed
    {
        return data_get($this->payload, $path, $default);
    }

    public function string(string $path): ?string
    {
        $value = $this->get($path);

        if (is_string($value)) {
            return $value;
        }

        if (is_int($value) || is_float($value) || is_bool($value)) {
            return (string) $value;
        }

        return null;
    }

    public function integer(string $path): ?int
    {
        $value = $this->get($path);

        if (is_int($value)) {
            return $value;
        }

        if (is_string($value) && preg_match('/^-?\d+$/', $value) === 1) {
            return (int) $value;
        }

        return null;
    }

    public function float(string $path): ?float
    {
        $value = $this->get($path);

        if (is_float($value) || is_int($value)) {
            return (float) $value;
        }

        if (is_string($value) && is_numeric($value)) {
            return (float) $value;
        }

        return null;
    }

    public function boolean(string $path): ?bool
    {
        $value = $this->get($path);

        if (is_bool($value)) {
            return $value;
        }

        if (is_int($value)) {
            return $value === 1 ? true : ($value === 0 ? false : null);
        }

        if (is_string($value)) {
            $boolean = filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);

            return is_bool($boolean) ? $boolean : null;
        }

        return null;
    }

    /**
     * @return array<array-key, mixed>|null
     */
    public function arrayValue(string $path): ?array
    {
        $value = $this->get($path);

        return is_array($value) ? $value : null;
    }

    /**
     * @return list<mixed>
     */
    public function listValue(string $path): array
    {
        $value = $this->arrayValue($path);

        if ($value === null || ! array_is_list($value)) {
            return [];
        }

        return $value;
    }
}
