<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Sms;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Sms\ListTemplatesResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class ListTemplatesRequest extends ZadarmaRequest
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
        return '/v1/sms/templates/';
    }

    protected function responseDataClass(): string
    {
        return ListTemplatesResponseData::class;
    }
}
