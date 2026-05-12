<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Verify;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Verify\CheckVerificationResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class CheckVerificationRequest extends ZadarmaRequest
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
        return '/v1/verify/check/';
    }

    protected function responseDataClass(): string
    {
        return CheckVerificationResponseData::class;
    }
}
