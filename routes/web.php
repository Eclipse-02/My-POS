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
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::group(['middleware' => ['role:admin']], function ()
    {
        Route::get('mereks/export-excel/', [MerekController::class, 'exportExcel'])->name('mereks.export-excel');
        Route::get('mereks/export-pdf/', [MerekController::class, 'exportPDF'])->name('mereks.export-pdf');
        Route::resource('/mereks', MerekController::class);
        Route::get('distributors/export-excel/', [DistributorController::class, 'exportExcel'])->name('distributors.export-excel');
        Route::get('distributors/export-pdf/', [DistributorController::class, 'exportPDF'])->name('distributors.export-pdf');
        Route::resource('/distributors', DistributorController::class);
        Route::get('barangs/export-excel/', [BarangController::class, 'exportExcel'])->name('barangs.export-excel');
        Route::get('barangs/export-pdf/', [BarangController::class, 'exportPDF'])->name('barangs.export-pdf');
        Route::resource('/barangs', BarangController::class);
        Route::resource('/users', UserController::class);
    });
    Route::group(['middleware' => ['role:kasir|admin']], function ()
    {
        Route::get('transaksis/export-excel/', [TransaksiController::class, 'exportExcel'])->name('transaksis.export-excel');
        Route::get('transaksis/export-pdf/', [TransaksiController::class, 'exportPDF'])->name('transaksis.export-pdf');
        Route::get('transaksis/{transaksi}/excel', [TransaksiController::class, 'exportDetailExcel'])->name('transaksis.export-detail-excel');
        Route::get('transaksis/{transaksi}/pdf', [TransaksiController::class, 'exportDetailPDF'])->name('transaksis.export-detail-pdf');
        Route::get('/get-harga', [TransaksiController::class, 'getHarga'])->name('getHarga');
        Route::resource('/transaksis', TransaksiController::class);
        Route::get('items', [TransaksiController::class, 'cart'])->name('cart.items');
        Route::post('cart', [TransaksiController::class, 'addToCart'])->name('cart.store');
        Route::post('update-cart', [TransaksiController::class, 'updateCart'])->name('cart.update');
        Route::post('update-all-cart', [TransaksiController::class, 'updateAllCart'])->name('cart.update-all');
        Route::post('remove', [TransaksiController::class, 'removeCart'])->name('cart.remove');
        Route::post('clear', [TransaksiController::class, 'clearAllCart'])->name('cart.clear');
        Route::post('pay', [TransaksiController::class, 'payCart'])->name('cart.pay');
    });
});

