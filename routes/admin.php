<?php
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DeliveryAreaController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGalleryController;
use App\Http\Controllers\Admin\ProductOptionController;
use App\Http\Controllers\Admin\ProductSizeController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SliderController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

  Route::get('/dashboard', [AdminDashboardController::class, 'index'])
    ->name('dashboard');

  // Profile
  Route::get('/profile', [ProfileController::class, 'index'])
    ->name('profile');
  Route::put('/profile', [ProfileController::class, 'updateProfile'])
    ->name('profile.update');
  Route::put('/profile/password', [ProfileController::class, 'updatePassword'])
    ->name('profile.password.update');

  // Slider 
  Route::resource('slider', SliderController::class);

  // Category
  Route::resource('category', CategoryController::class);

  // Product
  Route::resource('product', ProductController::class);

  // Product Gallery
  Route::get('product-gallery/{product}', [ProductGalleryController::class, 'index'])->name('product-gallery.show-index');
  Route::resource('product-gallery', ProductGalleryController::class);

  // Product Size
  Route::get('product-size/{product}', [ProductSizeController::class, 'index'])->name('product-size.show-index');
  Route::resource('product-size', ProductSizeController::class);

  // Product Size
  Route::resource('coupon', CouponController::class);

  // Product Option
  Route::get('product-option/{product}', [ProductOptionController::class, 'index'])->name('product-option.show-index');
  Route::resource('product-option', ProductOptionController::class);

  /** Delivery Area Routes */
  Route::resource('delivery-area', DeliveryAreaController::class);

  /** Order Routes */
  Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
  Route::get('orders/{id}', [OrderController::class, 'show'])->name('orders.show');
  Route::delete('orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');

  Route::get('pending-orders', [OrderController::class, 'pendingOrderIndex'])->name('pending-orders');
  Route::get('inprocess-orders', [OrderController::class, 'inProcessOrderIndex'])->name('inprocess-orders');
  Route::get('delivered-orders', [OrderController::class, 'deliveredOrderIndex'])->name('delivered-orders');
  Route::get('declined-orders', [OrderController::class, 'declinedOrderIndex'])->name('declined-orders');

  Route::get('orders/status/{id}', [OrderController::class, 'getOrderStatus'])->name('orders.status');
  Route::put('orders/status-update/{id}', [OrderController::class, 'orderStatusUpdate'])->name('orders.status-update');
});