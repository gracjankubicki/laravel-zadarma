<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Crm\SourceTags;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\SourceTags\ListCustomerUtmsResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class ListCustomerUtmsRequest extends ZadarmaRequest
{
    #[\Override]
    protected Method $method = Method::GET;

    public function __construct(
        array $parameters = [],
    ) {
        parent::__construct(parameters: $parameters);
    }

    public function resolveEndpoint(): string
    {
        return '/customers/utms';
    }

    protected function responseDataClass(): string
    {
        return ListCustomerUtmsResponseData::class;
    }
}
