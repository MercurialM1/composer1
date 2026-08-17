<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // === ЛОГИКА ДО КОНТРОЛЛЕРА ===

        // Пример: проверяем, является ли пользователь админом
        if (! $request->user() || ! $request->user()->isAdmin()) {
            abort(403, 'Доступ запрещен');
            // Или редирект: return redirect('/home');
        }

        // Передаем запрос дальше по цепочке
        $response = $next($request);

        // === ЛОГИКА ПОСЛЕ КОНТРОЛЛЕРА ===
        // Здесь можно модифицировать ответ

        return $response;
    }
}
