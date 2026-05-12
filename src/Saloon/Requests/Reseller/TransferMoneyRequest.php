<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Reseller;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Reseller\TransferMoneyResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class TransferMoneyRequest extends ZadarmaRequest
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
        return '/v1/reseller/account/money_transfer/';
    }

    protected function responseDataClass(): string
    {
        return TransferMoneyResponseData::class;
    }
}
