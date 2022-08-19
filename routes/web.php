<?php

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

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\userController;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

// guest only
Route::get('/', [HomeController::class, 'index'])->name('landing-page');
Route::get('/products', [ProductController::class, 'userIndex'])->name('products.index');


Auth::routes();
// after login prefix user
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [HomeController::class, 'index']);
        Route::get('/cart', [ChartController::class, 'index'])->name('cart.index');
        Route::post('/add-to-cart', [ChartController::class, 'addtochart'])->name('add-to-cart');
        Route::get('/checkout', [OrderController::class, 'index'])->name('checkout.index');
        Route::post('/checkout', [OrderController::class, 'store'])->name('checkout.store');
        Route::get('provinces', [OrderController::class, 'provinces'])->name('provinces');
        Route::get('cities', [OrderController::class, 'cities'])->name('cities');
        Route::post('cost', [ChartController::class, 'cost'])->name('checkout.ongkir');
    });
});
// group and prefix admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', [AdminController::class, 'index']);
        //prefix product
        Route::group(['prefix' => 'products'], function () {
            Route::resource('/index', ProductController::class);
        });
    });
});




// 404 for undefined routes
Route::any('/{page?}', function () {
    return View::make('pages.error.404');
})->where('page', '.*');