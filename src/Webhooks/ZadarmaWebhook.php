<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Webhooks;

use Illuminate\Http\Request;

final readonly class ZadarmaWebhook
{
    /**
     * @param  array<string, mixed>  $payload
     */
    public function __construct(
        public array $payload,
        public ?ZadarmaWebhookEvent $event,
    ) {}

    /**
     * @param  array<string, mixed>  $payload
     */
    public static function fromArray(array $payload): self
    {
        $event = $payload['event'] ?? null;

        return new self(
            payload: $payload,
            event: is_string($event) ? ZadarmaWebhookEvent::tryFrom(self::normalizeEventName($event)) : null,
        );
    }

    public static function fromRequest(Request $request): self
    {
        return self::fromArray($request->all());
    }

    public function eventName(): ?string
    {
        return $this->event?->value;
    }

    public function is(ZadarmaWebhookEvent|string $event): bool
    {
        $expected = $event instanceof ZadarmaWebhookEvent ? $event->value : self::normalizeEventName($event);

        return $this->eventName() === $expected;
    }

    public function get(string $key, mixed $default = null): mixed
    {
        return data_get($this->payload, $key, $default);
    }

    public static function normalizeEventName(string $event): string
    {
        return strtoupper($event);
    }
}
