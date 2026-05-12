<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Crm\Leads;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Leads\DeleteLeadResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class DeleteLeadRequest extends ZadarmaRequest
{
    #[\Override]
    protected Method $method = Method::DELETE;

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
        return DeleteLeadResponseData::class;
    }
}
