<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon;

use GracjanKubicki\LaravelZadarma\Saloon\Auth\ZadarmaAuthenticator;
use GracjanKubicki\LaravelZadarma\Saloon\RateLimits\ZadarmaRateLimitFactory;
use Saloon\Contracts\Authenticator;
use Saloon\Http\Connector;
use Saloon\RateLimitPlugin\Contracts\RateLimitStore;
use Saloon\RateLimitPlugin\Limit;
use Saloon\RateLimitPlugin\Traits\HasRateLimits;

final class ZadarmaConnector extends Connector
{
    use HasRateLimits;

    public function __construct(
        private readonly string $key,
        private readonly string $secret,
        private readonly string $baseUrl = 'https://api.zadarma.com',
        private readonly bool $rateLimitsEnabled = true,
        private readonly ?string $rateLimitCacheStore = null,
        private readonly int $generalRateLimitPerMinute = 100,
        private readonly bool $rateLimitSleep = false,
    ) {
        $this->useRateLimitPlugin($this->rateLimitsEnabled);
    }

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

    public function rateLimitPrefix(): string
    {
        return 'zadarma:'.sha1($this->key);
    }

    /**
     * @return array<Limit>
     */
    protected function resolveLimits(): array
    {
        return [
            ZadarmaRateLimitFactory::limit(
                requests: $this->generalRateLimitPerMinute,
                name: 'general',
                sleep: $this->rateLimitSleep,
            ),
        ];
    }

    protected function resolveRateLimitStore(): RateLimitStore
    {
        return ZadarmaRateLimitFactory::store($this->rateLimitCacheStore);
    }

    protected function getLimiterPrefix(): string
    {
        return $this->rateLimitPrefix();
    }

    protected function getTooManyAttemptsLimiter(): Limit
    {
        return ZadarmaRateLimitFactory::tooManyAttemptsLimit(
            handler: $this->handleTooManyAttempts(...),
            sleep: $this->rateLimitSleep,
        );
    }
}
