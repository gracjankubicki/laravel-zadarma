<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Pbx;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Pbx\DeleteWebhooksUrlResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class DeleteWebhooksUrlRequest extends ZadarmaRequest
{
    #[\Override]
    protected Method $method = Method::DELETE;

    public function __construct(
        array $parameters = [],
    ) {
        parent::__construct(parameters: $parameters);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/pbx/webhooks/url/';
    }

    protected function responseDataClass(): string
    {
        return DeleteWebhooksUrlResponseData::class;
    }
}
