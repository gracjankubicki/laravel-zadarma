<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Sip;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Sip\UpdateSipPasswordResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class UpdateSipPasswordRequest extends ZadarmaRequest
{
    #[\Override]
    protected Method $method = Method::PUT;

    public function __construct(
        public readonly string|int $sip,
        array $parameters = [],
    ) {
        parent::__construct(parameters: $parameters);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/sip/'.rawurlencode((string) $this->sip).'/password/';
    }

    protected function responseDataClass(): string
    {
        return UpdateSipPasswordResponseData::class;
    }
}
