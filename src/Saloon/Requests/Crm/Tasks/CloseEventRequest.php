<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Crm\Tasks;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Tasks\CloseEventResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class CloseEventRequest extends ZadarmaRequest
{
    #[\Override]
    protected Method $method = Method::POST;

    public function __construct(
        public readonly string|int $eventId,
        array $parameters = [],
    ) {
        parent::__construct(parameters: $parameters);
    }

    public function resolveEndpoint(): string
    {
        return '/events/'.rawurlencode((string) $this->eventId).'/close';
    }

    protected function responseDataClass(): string
    {
        return CloseEventResponseData::class;
    }
}
