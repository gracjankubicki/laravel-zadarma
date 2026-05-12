<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Crm\Leads;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Leads\GetLeadResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class GetLeadRequest extends ZadarmaRequest
{
    #[\Override]
    protected Method $method = Method::GET;

    public function __construct(
        public readonly string|int $leadId,
        array $parameters = [],
    ) {
        parent::__construct(parameters: $parameters);
    }

    public function resolveEndpoint(): string
    {
        return '/leads/'.rawurlencode((string) $this->leadId).'';
    }

    protected function responseDataClass(): string
    {
        return GetLeadResponseData::class;
    }
}
