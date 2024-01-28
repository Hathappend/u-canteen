<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class openOrCloseNotificationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $currentTime = Carbon::now()->hour();
        if ($currentTime->hour < 3) {
            view()->share('close', 'Selamat Malam');
        } elseif ($currentTime->hour < 10) {
            view()->share('close', 'Selamat Pagi');
        } elseif ($currentTime->hour < 13) {
            view()->share('open', 'Selamat Siang');
        } elseif ($currentTime->hour < 16){
            view()->share('open', 'Selamat Sore');
        }

        return $next($request);
    }
}
