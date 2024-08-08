<?php


use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
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


    // route::get('/',[ProductController::class,'index'])->name('index');
    // route::get('detail/{id}',[ProductController::class,'detail'])->name('detail');
    Route::prefix('account')->as('account.')->group(function () {
        // Route đăng ký
        Route::get('show-register', [RegisterController::class, 'showRegister'])->name('showRegister');
        Route::post('register', [RegisterController::class, 'register'])->name('register');
    
        // Route đăng nhập
        Route::get('show-login', [LoginController::class, 'showLogin'])->name('showLogin');
        Route::post('login', [LoginController::class, 'login'])->name('login');
        Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    
        // Các route cần phải đăng nhập mới dùng được
        Route::prefix('auth')->as('auth.')->middleware('auth', 'check_account')->group(function () {
            Route::get('password/reset', [PasswordController::class, 'showLinkRequestForm'])->name('password.request');
            Route::post('password/email', [PasswordController::class, 'sendResetLinkEmail'])->name('password.email');
            Route::get('password/reset/{token}/{email}', [PasswordController::class, 'showResetForm'])->name('password.reset');
            Route::post('password/reset', [PasswordController::class, 'reset'])->name('password.update');
            Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
            Route::put('profile/{id}', [ProfileController::class, 'editProfile'])->name('editProfile');
            Route::post('changePassword/{id}', [ProfileController::class, 'changePassword'])->name('changePassword');
        });
    });
    