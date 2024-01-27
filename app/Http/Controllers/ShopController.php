<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopRequest;
use App\Models\Shop;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Ramsey\Uuid\Uuid;

class ShopController extends Controller
{

    public function shop(string $shopName): RedirectResponse
    {
        return redirect()->action([MenuController::class, 'menu'],$shopName);
    }

    public function shopAdd():Response
    {
        return response()
            ->view('features.shopAdd', [
                'title' => "Add Shop"
            ]);
    }

    public function shopAddPost(ShopRequest $request): RedirectResponse
    {
        try {
            $validate = $request->validated();

            $image = $validate['img'];
            $move = $image->store('/img/shops/featured', 'public');
            Shop::query()->create([
                'id' => Uuid::uuid4()->toString(),
                'name' => $validate['name'],
                'img' => $move
            ]);

            return redirect('/shop-add')
                ->with('success', 'Data berhasil di tambahkan');

        } catch (ValidationException $exception) {
            return redirect('/shop-add');
        }
    }
}
