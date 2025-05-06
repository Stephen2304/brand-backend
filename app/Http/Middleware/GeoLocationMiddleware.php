<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GeoLocationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $countryCode = $request->header('CF-IPCountry');
        if (!$countryCode) {
            $countryCode = null; // On laisse la logique du contrôleur gérer le défaut
        }
        $request->attributes->set('country_code', $countryCode);
        return $next($request);
    }
}
