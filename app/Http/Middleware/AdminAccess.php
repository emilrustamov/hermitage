<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAccess
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->status == 'enabled' && Auth::user()->is_admin) {
            return $next($request);
        }

        Auth::logout(); // Выйти из текущей учетной записи

        return redirect()->route('login')->with('error', 'У Вас недостаточно прав доступа, попробуйте авторизоваться снова.');
    }
}
