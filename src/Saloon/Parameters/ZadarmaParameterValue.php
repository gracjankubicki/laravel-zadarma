<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Parameters;

interface ZadarmaParameterValue
{
    public function toZadarmaParameterValue(): mixed;
}
