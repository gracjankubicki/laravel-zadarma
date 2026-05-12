<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\RateLimits;

use Illuminate\Support\Facades\Cache;
use Saloon\RateLimitPlugin\Contracts\RateLimitStore;
use Saloon\RateLimitPlugin\Limit;
use Saloon\RateLimitPlugin\Stores\LaravelCacheStore;

final class ZadarmaRateLimitFactory
{
    public static function enabled(): bool
    {
        return (bool) config('zadarma.rate_limits.enabled', true);
    }

    public static function sleep(): bool
    {
        return (bool) config('zadarma.rate_limits.sleep', false);
    }

    public static function generalPerMinute(): int
    {
        return max(1, (int) config('zadarma.rate_limits.general_per_minute', 100));
    }

    public static function statisticsPerMinute(): int
    {
        return max(1, (int) config('zadarma.rate_limits.statistics_per_minute', 3));
    }

    public static function store(?string $store = null): RateLimitStore
    {
        $store ??= config('zadarma.rate_limits.store');

        return new LaravelCacheStore(Cache::store(is_string($store) && $store !== '' ? $store : null));
    }

    public static function limit(int $requests, string $name, bool $sleep): Limit
    {
        $limit = Limit::allow(max(1, $requests))->everyMinute()->name($name);

        return $sleep ? $limit->sleep() : $limit;
    }

    public static function tooManyAttemptsLimit(callable $handler, bool $sleep): Limit
    {
        $limit = Limit::custom($handler)->name('too-many-attempts');

        return $sleep ? $limit->sleep() : $limit;
    }
}
