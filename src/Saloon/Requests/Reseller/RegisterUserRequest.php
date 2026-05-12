<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Reseller;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Reseller\RegisterUserResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class RegisterUserRequest extends ZadarmaRequest
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
        return '/v1/reseller/users/registration/new/';
    }

    protected function responseDataClass(): string
    {
        return RegisterUserResponseData::class;
    }
}
