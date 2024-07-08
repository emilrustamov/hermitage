<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserStatus
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->status == 'enabled') {
            return $next($request);
        }
    
        Auth::logout(); // Выйти из текущей учетной записи
    
        return redirect()->route('login')->with('error', 'Для просмотра данной страницы требуется авторизация. Если ваш статус не "enabled", дождитесь подтверждения администратора или свяжитесь с ним по номеру +99364927422.');
    }
    
}
