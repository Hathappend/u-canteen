<?php

namespace App\Service\Impl;

use App\Models\Cart;
use App\Models\Menu;
use App\Models\User;
use App\Service\CartService;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CartServiceImpl implements CartService
{
    public function saveToMenusCartsTable(array $data): void
    {
        $menu = Menu::query()->find($data['menu_id']);
        $menu->carts()->attach($data['id']);

    }

    public function saveOrUpdate(array $data): bool
    {

        $menu = Menu::query()->find($data['menu_id']);
        if ($menu == null) {
            return false;
        }

        $menusCarts = $menu->carts;

        if ($menusCarts->isNotEmpty()) {
            $menusCarts->each(function ($row) use ($data) {

                $pivot = $row->pivot;
                $findCart = Cart::query()->find($pivot->cart_id);


                $findCart->update([
                    'quantity' => $findCart->quantity + $data['quantity']
                ]);
            });

            return true;

        }else{

            $cart = new Cart();
            $cart->id = $data['id'];
            $cart->quantity = $data['quantity'];
            $cart->user_id = $data['user_id'];
            $result = $cart->save();

            $this->saveToMenusCartsTable($data);

            return $result;

        }


    }

    public function delete(string $cartId): void
    {
        $cart = Cart::query()->find($cartId);
        $cart->cart_items()->detach();
        $cart->delete();
    }
}
