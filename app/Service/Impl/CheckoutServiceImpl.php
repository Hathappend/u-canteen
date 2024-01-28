<?php

namespace App\Service\Impl;

use App\Models\Cart;
use App\Models\Menu;
use App\Models\User;
use App\Service\CheckoutService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CheckoutServiceImpl implements CheckoutService
{
    public function checkout(string $username): Collection|bool
    {
        $findUser = User::query()->where('username', '=', $username)->first();
        $cart = DB::table('menus_carts')
            ->join('carts', 'menus_carts.cart_id', '=', 'carts.id')
            ->join('menus', 'menus_carts.menu_id', '=', 'menus.id')
            ->select(
                'menus.menuName',
                'menus.price',
                'menus.desc',
                'menus.img',
                'carts.quantity',
                'carts.id as cart_id'
            )->where('carts.user_id', '=', $findUser->id)->get();

        if ($cart == null) {
            return false;
        }

        return $cart;
    }

}
