<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        // Исключаем маршруты админки и файлового менеджера
        if ($request->is('admin/*') || $request->is('filemanager*') || $request->is('laravel-filemanager*') || $request->is('logout*') || $request->is('login*') || $request->is('reset*')) {
            return $next($request);
        }

        $locale = $request->segment(1);
        $availableLocales = Config::get('app.available_locales');

        if (in_array($locale, $availableLocales)) {
            App::setLocale($locale);
            Session::put('locale', $locale);
        } else {
            $fallbackLocale = Config::get('app.fallback_locale');
            return redirect($fallbackLocale);
        }
        
        return $next($request);
    }
}
