<?php

namespace App\Http\Middleware;

use App;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
            $locale = \Session::get('lang') ?? "en";



        // Check if the locale is valid and supported
        if (in_array($locale, ['en', 'es'])) {
            // Set the application locale
            app()->setLocale($locale);
            // URL::defaults(['lang' => $locale]);
        } else {
            // Use the default locale or fallback
            app()->setLocale(config('app.locale'));
            // URL::defaults(['lang' => config('app.locale')]);
        }

        return $next($request);
    }
}
