<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\IpUtils;
use Symfony\Component\HttpFoundation\Response;

final class ZadarmaWebhookIpAllowlist
{
    /**
     * @param  Closure(Request): Response  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! (bool) config('zadarma.webhooks.ip_allowlist.enabled', false)) {
            return $next($request);
        }

        $ranges = config('zadarma.webhooks.ip_allowlist.ranges', ['185.45.152.40/30']);
        $ranges = is_array($ranges) ? array_values(array_filter($ranges, is_string(...))) : [];

        if ($ranges === [] || ! IpUtils::checkIp($request->ip() ?? '', $ranges)) {
            return response('', Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
