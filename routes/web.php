<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SewaController;
use Illuminate\Support\Facades\Route;

    Route::get('/', function () { return view('user.home'); });

    Route::get('/about', function () { return view('user.about');});

    Route::get('/contact', function () { return view('user.contact');})->name('contact');

    Route::get('/products', [ProdukController::class, 'showProducts'])->name('products');
    Route::get('/', [ProdukController::class, 'showUserProducts'])->name('home');

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister']);
    Route::post('/register', [AuthController::class, 'register']);

    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

    Route::middleware('auth')->group(function() 
    {
        Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
        Route::post('/cart/add/{id_prod}', [CartController::class, 'add'])->name('cart.add');
        Route::post('/cart/increase/{id_prod}', [CartController::class, 'increase'])->name('cart.increase');
        Route::post('/cart/decrease/{id_prod}', [CartController::class, 'decrease'])->name('cart.decrease');
        Route::delete('/cart/remove/{id_prod}', [CartController::class, 'remove'])->name('cart.remove');

        Route::post('/cart/update-quantity/{id_prod}', [CartController::class, 'updateQuantity'])
            ->name('cart.updateQuantity');

        Route::post('/cart/update-dates/{id_prod}', [CartController::class, 'updateDates'])
            ->name('cart.updateDates');
        
        Route::get('/cart/sewa', [CartController::class, 'sewaPage'])->name('cart.sewa');
        Route::post('/cart/sewa', [CartController::class, 'processSewa'])->name('cart.processSewa');

        Route::get('/history', [SewaController::class, 'history'])->name('history');
    });

    
    Route::prefix('admin')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
        Route::post('/login', [AdminAuthController::class, 'login']);
        Route::post('/logoutadmin', [AdminAuthController::class, 'logout'])->name('admin.logout');

        Route::middleware(['admin'])->group(function () 
        {
            Route::get('/home', fn () => view('admin.homeadmin'));
            Route::get('/produk', [ProdukController::class, 'index'])->name('admin.produk');
            Route::get('/tambahproduk', [ProdukController::class, 'create']);
            Route::post('/tambahproduk', [ProdukController::class, 'store']);
            Route::get('/editproduk/{id}', [ProdukController::class, 'edit']);
            Route::put('/editproduk/{id}', [ProdukController::class, 'update']);
            Route::delete('/hapusproduk/{id}', [ProdukController::class, 'destroy'])->name('admin.produk.destroy');

            Route::get('/kategori', [KategoriController::class, 'index'])->name('admin.kategori');
            Route::get('/tambahkategori', [KategoriController::class, 'create']);
            Route::post('/tambahkategori', [KategoriController::class, 'store']);
            Route::get('/editkategori/{id}', [KategoriController::class, 'edit']);
            Route::put('/editkategori/{id}', [KategoriController::class, 'update']);
            Route::delete('/hapuskategori/{id}', [KategoriController::class, 'destroy']);

            Route::get('/userbyadmin', [App\Http\Controllers\AdminController::class, 'showUsers'])->name('admin.users');

            Route::get('/sewa', [App\Http\Controllers\AdminController::class, 'showSewa'])->name('admin.sewa');
            Route::patch('/admin/sewa/{id}/status', [App\Http\Controllers\AdminController::class, 'updateStatusSewa'])->name('admin.sewa.updateStatus');
        }); 
    });
