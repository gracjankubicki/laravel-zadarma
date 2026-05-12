<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Enums;

enum WebhookHook: string
{
    case NumberLookup = 'number_lookup';
    case CallTracking = 'call_tracking';
    case Sms = 'sms';
    case SpeechRecognition = 'speech_recognition';
    case Document = 'document';
}
