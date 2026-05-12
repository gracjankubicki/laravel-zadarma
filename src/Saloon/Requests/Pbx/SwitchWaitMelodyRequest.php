<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Pbx;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Pbx\SwitchWaitMelodyResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class SwitchWaitMelodyRequest extends ZadarmaRequest
{
    #[\Override]
    protected Method $method = Method::PUT;

    public function __construct(
        array $parameters = [],
    ) {
        parent::__construct(parameters: $parameters);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/pbx/waitmelody/switch';
    }

    protected function responseDataClass(): string
    {
        return SwitchWaitMelodyResponseData::class;
    }
}
