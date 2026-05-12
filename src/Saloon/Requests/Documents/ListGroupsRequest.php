<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Documents;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Documents\ListGroupsResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class ListGroupsRequest extends ZadarmaRequest
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
        return '/v1/documents/groups/list/';
    }

    protected function responseDataClass(): string
    {
        return ListGroupsResponseData::class;
    }
}
