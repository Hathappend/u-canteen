<?php

namespace App\Service\Impl;

use App\Models\Menu;
use App\Service\MenuService;

class MenuServiceImpl implements  MenuService
{

    public function save(array $menuData): bool
    {
        $menu = new Menu();
        $menu->id = $menuData['id'];
        $menu->menuName = $menuData['name'];
        $menu->category_id = $menuData['category'];
        $menu->shop_id = $menuData['shop'];
        $menu->price = $menuData['price'];
        $menu->desc = $menuData['desc'];
        $menu->img = $menuData['img'];

        return $menu->save();
    }
}
