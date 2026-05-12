<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Crm\AdditionalFeatures;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\AdditionalFeatures\ListCustomerCustomPropertiesResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class ListCustomerCustomPropertiesRequest extends ZadarmaRequest
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
        return '/customers/custom-properties';
    }

    protected function responseDataClass(): string
    {
        return ListCustomerCustomPropertiesResponseData::class;
    }
}
