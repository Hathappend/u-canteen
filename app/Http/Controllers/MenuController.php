<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuRequest;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Shop;
use App\Service\MenuService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Ramsey\Uuid\Uuid;

class MenuController extends Controller
{

    private MenuService $menuService;

    /**
     * @param MenuService $menuService
     */
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function menu(string $shopName): Response
    {
        $shop = Shop::query()->where('name', '=',ucwords(Str::slug($shopName,' ')))->first();
        $menus = Menu::query()
            ->join('categories', 'menus.category_id', '=', 'categories.id')
            ->join('shops', 'menus.shop_id', '=', 'shops.id')
            ->orderBy('categories.categoryName')
            ->select(
                'menus.id',
                'menus.menuName',
                'menus.category_id',
                'categories.categoryName',
                'categories.desc as category_desc',
                'menus.price',
                'menus.desc as menu_desc',
                'menus.img',
                'shops.name'
            )->where('name', '=', ucwords(Str::slug($shopName,' ')))
            ->get();

//        $result = Shop::query()->where('shops.name', '=', ucwords($shopName))
//            ->fromQuery($menus);

        return response()
            ->view('features.menu', [
                "title" => "Menu | $shop->name",
                "shop" => $shop,
                'menus' => $menus
            ]);
    }

    public function menuAdd(): Response
    {
        $categories = Category::all();
        $shops = Shop::all();

        return response()
            ->view('features.menuAdd', [
                'Menu Add | U-Canteen',
                'categories' => $categories,
                'shops' => $shops
            ]);
    }

    public function menuAddPost(MenuRequest $request): RedirectResponse
    {
        try {
            $validate = $request->validated();

            //auto add ID
            $validate['id'] = Uuid::uuid4()->toString();

            //get real name file
            $file = $request->file('img');
            $validate['img'] = time() .'_'. $file->getClientOriginalName();

            $file->storeAs('/img/shops/menus', $validate['img'] , 'public');

            $result = $this->menuService->save($validate);
            if ($result) {
                return redirect('/menu-add')
                    ->with('success', 'Data menu berhasil di tambahkan');
            }
            return redirect('/menu-add')
                ->with('error', 'Data duplikat, telah ditambahkan sebelumnya');

        } catch (ValidationException $exception) {
            return redirect('/menu-add');
        }
    }
}
