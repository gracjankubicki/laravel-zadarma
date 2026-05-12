<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Parameters;

use DateTimeInterface;

final readonly class ZadarmaDateRange implements ZadarmaParameterValue
{
    public function __construct(
        public DateTimeInterface|string $from,
        public DateTimeInterface|string $to,
        public string $fromKey = 'start',
        public string $toKey = 'end',
    ) {}

    /**
     * @return array<string, string>
     */
    public function toZadarmaParameterValue(): array
    {
        return [
            $this->fromKey => $this->formatDateTime($this->from),
            $this->toKey => $this->formatDateTime($this->to),
        ];
    }

    private function formatDateTime(DateTimeInterface|string $value): string
    {
        return $value instanceof DateTimeInterface ? $value->format('Y-m-d H:i:s') : $value;
    }
}
