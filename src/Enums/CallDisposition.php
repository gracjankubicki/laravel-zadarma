<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Enums;

enum CallDisposition: string
{
    case Answered = 'answered';
    case Busy = 'busy';
    case NoAnswer = 'no answer';
    case Failed = 'failed';
    case Cancel = 'cancel';
    case NoMoney = 'no money';
    case UnallocatedNumber = 'unallocated number';
    case NoLimit = 'no limit';
    case NoDayLimit = 'no day limit';
    case LineLimit = 'line limit';
    case NoAnswered = 'no answered';
}
