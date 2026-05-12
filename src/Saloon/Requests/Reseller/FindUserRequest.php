<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Reseller;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Reseller\FindUserResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class FindUserRequest extends ZadarmaRequest
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
        return '/v1/reseller/users/find/';
    }

    protected function responseDataClass(): string
    {
        return FindUserResponseData::class;
    }
}
