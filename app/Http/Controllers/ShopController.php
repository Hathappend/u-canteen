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

            $file = $request->file('img');
            $validate['img'] = time() .'_'. $file->getClientOriginalName();
            $file->storeAs('/img/shops/featured', time() .'_'. $file->getClientOriginalName() , 'public');
            Shop::query()->create([
                'id' => Uuid::uuid4()->toString(),
                'name' => $validate['name'],
                'img' => $validate['img']
            ]);

            return redirect('/shop-add')
                ->with('success', 'Data berhasil di tambahkan');

        } catch (ValidationException $exception) {
            return redirect('/shop-add');
        }
    }
}
