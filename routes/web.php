<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use Illuminate\Support\Facades\Route;

// Главная страница
Route::get('/', [HomeController::class, 'index'])->name('home');

// Маршруты для отзывов (публичная часть)
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews');
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

// Маршруты для заказов (публичная часть)
Route::get('/order/create', [OrderController::class, 'create'])->name('order.create');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/success', [OrderController::class, 'success'])->name('order.success');

// Админ-панель
Route::prefix('admin')->name('admin.')->group(function () {
    
    // Управление заказами
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::post('/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('orders.update-status');
    
    // Управление товарами
    Route::get('/products', [AdminProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [AdminProductController::class, 'create'])->name('products.create');
    Route::post('/products', [AdminProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [AdminProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [AdminProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [AdminProductController::class, 'destroy'])->name('products.destroy');
    Route::post('/products/{product}/toggle', [AdminProductController::class, 'toggleActive'])->name('products.toggle');
    
    // Управление отзывами
    Route::get('/reviews', [AdminReviewController::class, 'index'])->name('reviews.index');
    Route::post('/reviews/{review}/approve', [AdminReviewController::class, 'approve'])->name('reviews.approve');
    Route::delete('/reviews/{review}', [AdminReviewController::class, 'destroy'])->name('reviews.destroy');
});