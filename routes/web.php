<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\MadeToMeasureController as AdminMadeToMeasureController;
use App\Http\Controllers\MyRequestsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\MadeToMeasureController;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/products/zellige', [App\Http\Controllers\ProductController::class, 'zelligeIndex'])->name('products.zellige');
Route::get('/search', [ProductController::class, 'search'])->name('product.search');

Route::get('/made-to-measure', [MadeToMeasureController::class, 'create'])->name('made-to-measure.create');
Route::post('/made-to-measure', [MadeToMeasureController::class, 'store'])->name('made-to-measure.store');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('language/{locale}', [LocalizationController::class, 'setLang'])->name('lang.switch');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('/my-requests', [MyRequestsController::class, 'index'])->name('my-requests.index');
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');


// Cart Routes
Route::post('cart', [CartController::class, 'store'])->name('cart.store');
Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::post('cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('cart/update', [CartController::class, 'update'])->name('cart.update');

// Checkout Route
Route::middleware('auth')->group(function () {
    Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('checkout', [CheckoutController::class, 'store'])->name('checkout.store');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');

    // Product Management
    Route::get('products', [AdminProductController::class, 'index'])->name('products.index');
    Route::get('products/create', [AdminProductController::class, 'create'])->name('products.create');
    Route::post('products', [AdminProductController::class, 'store'])->name('products.store');
    Route::get('products/{product}/edit', [AdminProductController::class, 'edit'])->name('products.edit');
    Route::put('products/{product}', [AdminProductController::class, 'update'])->name('products.update');
    Route::delete('products/{product}', [AdminProductController::class, 'destroy'])->name('products.destroy');

    // Made to Measure Requests
    Route::get('/requests', [AdminMadeToMeasureController::class, 'index'])->name('requests.index');
    Route::get('/requests/{id}', [AdminMadeToMeasureController::class, 'show'])->name('requests.show');
        Route::patch('/requests/{id}/update-status', [AdminMadeToMeasureController::class, 'updateStatus'])->name('requests.update-status');

    // User Management
    // User Management
Route::get('/users', [App\Http\Controllers\Admin\UserManagementController::class, 'index'])->name('users.index');
Route::get('/users/create', [App\Http\Controllers\Admin\UserManagementController::class, 'create'])->name('users.create');
Route::post('/users', [App\Http\Controllers\Admin\UserManagementController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [App\Http\Controllers\Admin\UserManagementController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [App\Http\Controllers\Admin\UserManagementController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [App\Http\Controllers\Admin\UserManagementController::class, 'destroy'])->name('users.destroy');

    // Contact Messages
        Route::get('/contacts', [App\Http\Controllers\Admin\ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{contact}', [App\Http\Controllers\Admin\ContactController::class, 'show'])->name('contacts.show');

    // Product Images Management
    Route::get('/products/{product}/images', [App\Http\Controllers\Admin\ProductImageController::class, 'index'])->name('products.images.index');
    Route::post('/products/{product}/images', [App\Http\Controllers\Admin\ProductImageController::class, 'store'])->name('products.images.store');
    Route::delete('/product-images/{productImage}', [App\Http\Controllers\Admin\ProductImageController::class, 'destroy'])->name('product-images.destroy');
});

// Contact Form Routes
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');

require __DIR__.'/auth.php';
