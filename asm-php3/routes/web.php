<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PromotionController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('detail/{id}', [HomeController::class, 'detail'])->name('detail');
Route::get('shop/{category_id?}', [HomeController::class, 'shop'])->name('shop');

Route::prefix('admin')->as('admin.')->middleware(['auth'])->group(function(){
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('banners', BannerController::class);
    Route::resource('promotions', PromotionController::class);
    Route::resource('orders', OrderController::class);
});

Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
Route::delete('/cart/remove/{id}', [CartController::class, 'removeCart'])->name('cart.remove');
Route::delete('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
Route::post('/cart/apply-coupon', [CartController::class, 'applyCoupon'])->name('cart.applyCoupon');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout')->middleware('auth');
Route::post('/order', [CartController::class, 'placeOrder'])->name('order.place')->middleware('auth');
Route::get('/thankyou', [CartController::class, 'thankyou'])->name('thankyou')->middleware('auth');


Route::get('/auth/login', [LoginController::class, 'index'])->name('login');
Route::post('/auth/login', [LoginController::class, 'login'])->name('login');
Route::get('/auth/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/auth/verify/{token}', [LoginController::class, 'verify'])->name('verify');

Route::get('/auth/register', [RegisterController::class, 'index'])->name('register');
Route::post('/auth/register', [RegisterController::class, 'register'])->name('register');

Route::get('gerenate/{order}', [OrderController::class, 'gerenatePdf'])->name('gerenate');
