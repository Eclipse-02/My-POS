<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\MerekController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false
]);

Route::group(['middleware' => ['auth']], function ()
{
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::group(['middleware' => ['role:admin']], function ()
    {
        Route::resource('/mereks', MerekController::class);
        Route::resource('/distributors', DistributorController::class);
        Route::resource('/barangs', BarangController::class);
        Route::resource('/users', UserController::class);
    });
    Route::group(['middleware' => ['role:kasir|admin']], function ()
    {
        Route::get('/get-harga', [TransaksiController::class, 'getHarga'])->name('getHarga');
        Route::resource('/transaksis', TransaksiController::class);
        Route::get('items', [TransaksiController::class, 'cart'])->name('cart.items');
        Route::post('cart', [TransaksiController::class, 'addToCart'])->name('cart.store');
        Route::post('update-cart', [TransaksiController::class, 'updateCart'])->name('cart.update');
        Route::post('remove', [TransaksiController::class, 'removeCart'])->name('cart.remove');
        Route::post('clear', [TransaksiController::class, 'clearAllCart'])->name('cart.clear');
        Route::post('pay', [TransaksiController::class, 'payCart'])->name('cart.pay');
    });
});

