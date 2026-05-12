<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Crm\Users;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Users\ListUserGroupsResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class ListUserGroupsRequest extends ZadarmaRequest
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
        return '/users/groups';
    }

    protected function responseDataClass(): string
    {
        return ListUserGroupsResponseData::class;
    }
}
