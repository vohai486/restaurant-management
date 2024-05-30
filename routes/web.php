<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\DeliveryAreasController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\ProfileController as AdminProfileController;
use \App\Http\Controllers\Frontend\ProfileController as FrontendProfileController;
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

// Auth Admin
Route::group(['middleware' => ['guest']], function () {
    Route::get('admin/login', [AdminAuthController::class, 'index'])->name('admin.login');
    Route::get('admin/forget-password', [AdminAuthController::class, 'forgetPassword'])->name('admin.forget-password');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::put('/profile', [FrontendProfileController::class, 'updateProfile'])->name('profile.update');
    Route::put('/profile/password', [FrontendProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::put('/profile/avatar', [FrontendProfileController::class, 'updateAvatar'])->name('profile.avatar.update');
    Route::post('/address', [DashboardController::class, 'createAddress'])->name('address.store');
    Route::put('address/{id}/edit', [DashboardController::class, 'updateAddress'])->name('address.update');
    Route::delete('address/{id}', [DashboardController::class, 'destroyAddress'])->name('address.destroy');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [AdminProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [AdminProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';

Route::get('/', [FrontendController::class, 'index'])->name('home');

/** Show Product details page */
Route::get('/product/{slug}', [FrontendController::class, 'showProduct'])->name('product.show');

/** Product Modal Route */
Route::get('/load-product-modal/{productId}', [FrontendController::class, 'loadProductModal'])->name('load-product-modal');

/** Add to cart route */
Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('get-cart-products', [CartController::class, 'getCartProduct'])->name('get-cart-products');
Route::get('cart-product-remove/{rowId}', [CartController::class, 'cartProductRemove'])->name('cart-product-remove');

/** Cart Page Route */
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart-update-qty', [CartController::class, 'cartQtyUpdate'])->name('cart.quantity-update');
Route::get('/cart-destroy', [CartController::class, 'cartDestroy'])->name('cart.destroy');

//** Coupon Routes */
Route::post('/apply-coupon', [FrontendController::class, 'applyCoupon'])->name('apply-coupon');
Route::post('/destroy-coupon', [FrontendController::class, 'destroyCoupon'])->name('destroy-coupon');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::get('/checkout/{id}/delivery-cal', [CheckoutController::class, 'calculateDeliveryCharge'])->name('checkout.delivery-cal');
    Route::post('/checkout', [CheckoutController::class, 'checkoutRedirect'])->name('checkout.redirect');

    // Payment
    Route::get('payment', [PaymentController::class, 'index'])->name('payment.index');
    Route::post('make-payment', [PaymentController::class, 'makePayment'])->name('make-payment');
});