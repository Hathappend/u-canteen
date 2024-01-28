<?php

namespace App\Http\Controllers;

use App\Service\CheckoutService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

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


}
