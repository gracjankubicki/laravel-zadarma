<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon;

use GracjanKubicki\LaravelZadarma\Saloon\Auth\ZadarmaAuthenticator;
use Saloon\Contracts\Authenticator;
use Saloon\Http\Connector;

final class ZadarmaConnector extends Connector
{
    public function __construct(
        private readonly string $key,
        private readonly string $secret,
        private readonly string $baseUrl = 'https://api.zadarma.com',
    ) {}

    public function resolveBaseUrl(): string
    {
        return rtrim($this->baseUrl, '/');
    }

    protected function defaultAuth(): Authenticator
    {
        return new ZadarmaAuthenticator(
            key: $this->key,
            secret: $this->secret,
        );
    }
}
