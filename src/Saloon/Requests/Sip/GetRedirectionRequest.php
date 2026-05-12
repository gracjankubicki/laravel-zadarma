<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Sip;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Sip\GetRedirectionResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class GetRedirectionRequest extends ZadarmaRequest
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
        return '/v1/sip/redirection/';
    }

    protected function responseDataClass(): string
    {
        return GetRedirectionResponseData::class;
    }
}
