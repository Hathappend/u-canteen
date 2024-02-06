<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])
    ->middleware(\App\Http\Middleware\MustLoginFirst::class);

Route::controller(\App\Http\Controllers\UserController::class)->group(function (){
    Route::middleware(\App\Http\Middleware\MustNotLogin::class)->group(function (){
        Route::get('/login', 'login');
        Route::post('/login', 'postLogin');
    });

    Route::post('/logout', 'postLogout')
        ->middleware(\App\Http\Middleware\MustLoginFirst::class);
});


Route::controller(\App\Http\Controllers\MenuController::class)->group(function (){
    Route::middleware(\App\Http\Middleware\MustLoginFirst::class)->group(function (){
        Route::get('/{shopName}/menu', 'menu')->name('showMenu');
        Route::get('/menu-add', 'menuAdd');
        Route::post('/menu-add', 'menuAddPost');
    });
});

Route::controller(\App\Http\Controllers\CartController::class)->group(function (){
    Route::middleware(\App\Http\Middleware\MustLoginFirst::class)->group(function (){
        Route::post('/{menuName}/{menuId}', 'addCart');
        Route::post('/cart/delete/{menuName}/{menuId}', 'deletePerCartItem');
    });
});

Route::controller(\App\Http\Controllers\CheckoutController::class)->group(function (){
    Route::middleware(\App\Http\Middleware\MustLoginFirst::class)->group(function (){
        Route::get('/checkout', 'checkout')->name('checkout');
        Route::post('/checkout', 'process');
        Route::get('/checkout/invoice/{id}', 'invoice')->name('checkout.invoice');
    });
});

Route::controller(\App\Http\Controllers\ShopController::class)->group(function (){
    Route::middleware(\App\Http\Middleware\MustLoginFirst::class)->group(function (){
        Route::get('/shop-add', 'shopAdd');
        Route::post('/shop-add', 'shopAddPost');
        Route::post('/{shopName}/menu', 'shop');
    });
});

Route::get('/migration', function (){
    Artisan::call('migrate --force');
    Artisan::call('optimize:clear');
    Artisan::call('storage:link');
});


