<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Enums;

enum CallInfoNotification: string
{
    case NotifyStart = 'notify_start';
    case NotifyInternal = 'notify_internal';
    case NotifyEnd = 'notify_end';
    case NotifyOutStart = 'notify_out_start';
    case NotifyOutEnd = 'notify_out_end';
    case NotifyAnswer = 'notify_answer';
    case NotifyRecord = 'notify_record';
    case NotifyIvr = 'notify_ivr';
}
