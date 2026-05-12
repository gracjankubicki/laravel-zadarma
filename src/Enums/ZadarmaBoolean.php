<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Enums;

use GracjanKubicki\LaravelZadarma\Saloon\Parameters\ZadarmaParameterValue;

enum ZadarmaBoolean: string implements ZadarmaParameterValue
{
    case True = 'true';
    case False = 'false';

    public static function fromBool(bool $value): self
    {
        return $value ? self::True : self::False;
    }

    public function toBool(): bool
    {
        return $this === self::True;
    }

    public function toZadarmaParameterValue(): string
    {
        return $this->value;
    }
}
