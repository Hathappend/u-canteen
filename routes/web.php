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
});

Route::controller(\App\Http\Controllers\MenuController::class)->group(function (){
    Route::middleware(\App\Http\Middleware\MustLoginFirst::class)->group(function (){
        Route::get('/{shopName}/menu', 'menu');
        Route::get('/menu-add', 'menuAdd');
        Route::post('/menu-add', 'menuAddPost');
    });
});

Route::post('/logout', function (){
    return redirect('/login');
});

Route::get('/checkout', function (){
    return view('features.checkout');
});

Route::controller(\App\Http\Controllers\ShopController::class)->group(function (){
    Route::middleware(\App\Http\Middleware\MustLoginFirst::class)->group(function (){
        Route::get('/shop-add', 'shopAdd');
        Route::post('/shop-add', 'shopAddPost');
        Route::post('/{shopName}/menu', 'shop');
    });
});

Route::get('/migration', function (){
    Route::get('/foo', function () {
        Artisan::call('migrate');
    });
});


