<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Webhooks;

enum ZadarmaWebhookEvent: string
{
    case NotifyStart = 'NOTIFY_START';
    case NotifyInternal = 'NOTIFY_INTERNAL';
    case NotifyAnswer = 'NOTIFY_ANSWER';
    case NotifyEnd = 'NOTIFY_END';
    case NotifyOutStart = 'NOTIFY_OUT_START';
    case NotifyOutEnd = 'NOTIFY_OUT_END';
    case NotifyRecord = 'NOTIFY_RECORD';
    case NotifyIvr = 'NOTIFY_IVR';
    case NumberLookup = 'NUMBER_LOOKUP';
    case CallTracking = 'CALL_TRACKING';
    case Sms = 'SMS';
    case SpeechRecognition = 'SPEECH_RECOGNITION';
    case Document = 'DOCUMENT';
}
