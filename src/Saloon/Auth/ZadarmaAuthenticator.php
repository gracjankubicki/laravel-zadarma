<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Auth;

use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Contracts\Authenticator;
use Saloon\Http\PendingRequest;

final readonly class ZadarmaAuthenticator implements Authenticator
{
    public function __construct(
        private string $key,
        private string $secret,
    ) {}

    public function set(PendingRequest $pendingRequest): void
    {
        $request = $pendingRequest->getRequest();

        if (! $request instanceof ZadarmaRequest) {
            return;
        }

        $pendingRequest->headers()->add('Authorization', $this->key.':'.$this->signature(
            endpoint: $request->signatureEndpoint(),
            parameters: $request->signatureParameters(),
        ));
    }

    /**
     * @param  array<string, mixed>  $parameters
     */
    public function signature(string $endpoint, array $parameters): string
    {
        $parameters = array_filter($parameters, static fn (mixed $value): bool => ! is_object($value));
        ksort($parameters);

        $query = http_build_query($parameters, '', '&', PHP_QUERY_RFC1738);

        return base64_encode(hash_hmac('sha1', $endpoint.$query.md5($query), $this->secret));
    }
}
