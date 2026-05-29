<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Admin Controllers
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\DashboardController;

/*Admin Login TANPA Middleware*/
Route::get('/admin/login', [AuthController::class, 'loginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');

/*Admin Dashboard + CRUD*/
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

    // Dashboard Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Logout Admin
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // CRUD Kategori
    Route::resource('categories', AdminCategoryController::class);

    // CRUD Produk
    Route::resource('products', AdminProductController::class);
});

/*Routes User biasa*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produk/{id}', [HomeController::class, 'detail'])->name('product.detail');
Route::get('/kategori/{id}', [HomeController::class, 'category'])->name('category.show');
Route::get('/tentang', [HomeController::class, 'about'])->name('about');
Route::get('/kontak', [HomeController::class, 'contact'])->name('contact');
Route::get('/search', [HomeController::class, 'search'])->name('search');
