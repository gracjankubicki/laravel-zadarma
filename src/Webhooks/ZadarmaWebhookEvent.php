<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Webhooks;

enum ZadarmaWebhookEvent: string
{
    case NotifyStart = 'notify_start';
    case NotifyInternal = 'notify_internal';
    case NotifyAnswer = 'notify_answer';
    case NotifyEnd = 'notify_end';
    case NotifyOutStart = 'notify_out_start';
    case NotifyOutEnd = 'notify_out_end';
    case NotifyRecord = 'notify_record';
    case NotifyIvr = 'notify_ivr';
    case NumberLookup = 'number_lookup';
    case CallTracking = 'call_tracking';
    case Sms = 'sms';
    case SpeechRecognition = 'speech_recognition';
    case Document = 'document';
}
