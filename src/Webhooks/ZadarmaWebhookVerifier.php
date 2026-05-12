<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Webhooks;

use LogicException;

final class ZadarmaWebhookVerifier
{
    public function supportsSignatureVerification(): bool
    {
        return false;
    }

    public function verify(): bool
    {
        throw new LogicException('Zadarma webhook signature verification is not implemented because the public documentation does not define a webhook signature contract.');
    }
}
