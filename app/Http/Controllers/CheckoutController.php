<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Service\CheckoutService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class CheckoutController extends Controller
{
    private CheckoutService $checkoutService;

    /**
     * @param CheckoutService $checkoutService
     */
    public function __construct(CheckoutService $checkoutService)
    {
        $this->checkoutService = $checkoutService;
    }

    public function checkout(): Response
    {
        $result = $this->checkoutService->checkout(Session::get('username'));

        return response()
            ->view('features.checkout', [
                'title' => 'Checkout | U-Canteen',
                'carts' => $result
            ]);
    }

    public function process(CheckoutRequest $request): RedirectResponse
    {
        try {
            $validate = $request->validated();

            var_dump($validate);

            $validate['invoice'] = time();

            $result = $this->checkoutService->process($validate);
            if ($result) {
                return redirect("/checkout/invoice/{$validate['invoice']}");
            }

            return redirect('/checkout')->with('error', 'Gagal melalukan checkout');
        } catch (ValidationException $exception) {
            return redirect('/checkout');
        }
    }


}
