<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Enums;

enum RedirectType: string
{
    case Phone = 'phone';
    case Sip = 'sip';
    case Pbx = 'pbx';
    case Ivr = 'ivr';
    case Voicemail = 'voicemail';
}
