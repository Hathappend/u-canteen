<?php

namespace App\Http\Middleware;

use App\Models\Cart;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CartDataMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $findUser = User::query()->where('username', '=', Session::get('username'))->first();
        $getCarts = Cart::query()->where('user_id', '=', $findUser->id)->get();

        $qtyTotal = $getCarts->count();

        view()->share('qtyTotal', $qtyTotal);

        return $next($request);
    }
}
