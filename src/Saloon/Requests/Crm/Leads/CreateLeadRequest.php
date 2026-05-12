<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Crm\Leads;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Leads\CreateLeadResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class CreateLeadRequest extends ZadarmaRequest
{
    #[\Override]
    protected Method $method = Method::POST;

    public function __construct(
        array $parameters = [],
    ) {
        parent::__construct(parameters: $parameters);
    }

    public function resolveEndpoint(): string
    {
        return '/leads';
    }

    protected function responseDataClass(): string
    {
        return CreateLeadResponseData::class;
    }
}
