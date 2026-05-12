<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Statistics;

use GracjanKubicki\LaravelZadarma\Saloon\RateLimits\ZadarmaRateLimitFactory;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use GracjanKubicki\LaravelZadarma\Saloon\ZadarmaConnector;
use Saloon\Http\PendingRequest;
use Saloon\RateLimitPlugin\Contracts\RateLimitStore;
use Saloon\RateLimitPlugin\Limit;
use Saloon\RateLimitPlugin\Traits\HasRateLimits;

abstract class ZadarmaStatisticsRequest extends ZadarmaRequest
{
    use HasRateLimits {
        bootHasRateLimits as private bootRateLimitPlugin;
    }

    private ?string $rateLimitPrefix = null;

    public function bootHasRateLimits(PendingRequest $pendingRequest): void
    {
        if (! ZadarmaRateLimitFactory::enabled()) {
            $this->useRateLimitPlugin(false);
        }

        $connector = $pendingRequest->getConnector();

        if ($connector instanceof ZadarmaConnector) {
            $this->rateLimitPrefix = $connector->rateLimitPrefix().':statistics';
        }

        $this->bootRateLimitPlugin($pendingRequest);
    }

    /**
     * @return array<Limit>
     */
    protected function resolveLimits(): array
    {
        return [
            ZadarmaRateLimitFactory::limit(
                requests: ZadarmaRateLimitFactory::statisticsPerMinute(),
                name: 'statistics',
                sleep: ZadarmaRateLimitFactory::sleep(),
            ),
        ];
    }

    protected function resolveRateLimitStore(): RateLimitStore
    {
        return ZadarmaRateLimitFactory::store();
    }

    protected function getLimiterPrefix(): ?string
    {
        return $this->rateLimitPrefix ?? 'zadarma:statistics';
    }

    protected function getTooManyAttemptsLimiter(): ?Limit
    {
        return ZadarmaRateLimitFactory::tooManyAttemptsLimit(
            handler: $this->handleTooManyAttempts(...),
            sleep: ZadarmaRateLimitFactory::sleep(),
        );
    }
}
