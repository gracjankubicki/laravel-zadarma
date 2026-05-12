<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Enums;

enum IvrLanguage: string
{
    case English = 'en';
    case Spanish = 'es';
    case German = 'de';
    case Polish = 'pl';
    case Russian = 'ru';
    case Ukrainian = 'ua';
    case French = 'fr';
}
