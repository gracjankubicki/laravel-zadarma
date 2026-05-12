# Rate limits

Zadarma documents API rate limits and returns runtime rate-limit metadata in response headers. The SDK uses the official Saloon rate-limit plugin to prevent calls before the API starts returning `429 Too Many Requests`.

Default SDK limits:

- general API methods: `100` requests per minute;
- statistics methods: `3` requests per minute.

The statistics limit is configurable because Zadarma documentation/locales or account rules may differ. If your account documentation says `10/min`, set `ZADARMA_RATE_LIMITS_STATISTICS_PER_MINUTE=10`.

```env
ZADARMA_RATE_LIMITS_ENABLED=true
ZADARMA_RATE_LIMITS_STORE=redis
ZADARMA_RATE_LIMITS_GENERAL_PER_MINUTE=100
ZADARMA_RATE_LIMITS_STATISTICS_PER_MINUTE=3
ZADARMA_RATE_LIMITS_SLEEP=false
```

The default store is Laravel's default cache store. For production, use a shared store such as Redis so web workers and queue workers share the same limiter counters.

When `sleep=false`, Saloon throws `Saloon\RateLimitPlugin\Exceptions\RateLimitReachedException` before sending a request that would exceed the limit. This is the safer default for web requests.

For queued jobs, use Saloon's job middleware:

```php
use Saloon\RateLimitPlugin\Helpers\ApiRateLimited;

public function middleware(): array
{
    return [new ApiRateLimited];
}
```

Every DTO also exposes response header metadata when Zadarma sends it:

```php
$dto = Zadarma::send(new GetBalanceRequest)->dtoOrFail();

$dto->rateLimit?->limit;
$dto->rateLimit?->remaining;
$dto->rateLimit?->reset;
$dto->rateLimit?->method;
```

The SDK also lets Saloon detect `429` responses and apply the `Retry-After` header when Zadarma returns it.
