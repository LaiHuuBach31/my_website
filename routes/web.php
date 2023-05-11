<?php

use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProAttrController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Views\AboutController;
use App\Http\Controllers\Views\BlogController;
use App\Http\Controllers\Views\CartController;
use App\Http\Controllers\Views\CheckoutController;
use App\Http\Controllers\Views\ContactController;
use App\Http\Controllers\Views\HomeController;
use App\Http\Controllers\Views\ShopController;
use App\Http\Controllers\Views\SupportController;
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

Route::group(['prefix' => ''], function(){
    Route::get('/', [HomeController::class, 'index'])->name('index.home');
    Route::get('/about', [AboutController::class, 'about'])->name('index.about');
    Route::get('/blog', [BlogController::class, 'blog'])->name('index.blog');
    Route::get('/contact', [ContactController::class, 'contact'])->name('index.contact');
    Route::get('/support', [SupportController::class, 'support'])->name('index.support');
    
    Route::get('/shop/{product?}', [ShopController::class, 'shop'])->name('index.shop');
    Route::get('/detail/{product}', [ShopController::class, 'productDetail'])->name('index.product_detail');
 

    
    Route::get('/register-customer', [HomeController::class, 'register'])->name('index.register');
    Route::post('/register-customer', [HomeController::class, 'checkRegister']);
    Route::get('/login-customer', [HomeController::class, 'login'])->name('index.login');
    Route::post('/login-customer', [HomeController::class, 'checkLogin']);
    Route::get('/logout-customer', [HomeController::class, 'logout'])->name('index.logout');
    Route::get('/verify-account/{token}', [HomeController::class, 'verifyAccount'])->name('index.verify_account');

    Route::get('/profile', [HomeController::class, 'profile'])->name('index.profile');

});

Route::group(['prefix' => 'cart'], function(){
    Route::get('/', [CartController::class, 'cart'])->name('cart.view')->middleware('cus');
    Route::post('/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/update-quantity/{cartItem}', [CartController::class, 'updateQuantity'])->name('cart.update_quantity');
    Route::post('/update-attribute/{cartItem}', [CartController::class, 'updateAttribute'])->name('cart.update_attribute');
    Route::get('/delete/{cartItem}', [CartController::class, 'delete'])->name('cart.delete');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout')->middleware('cus');
    Route::post('/checkout', [CartController::class, 'orderCheckout']);
    Route::get('/verify-order/{token}', [CartController::class, 'verifyOrder'])->name('index.verify_order');
});

Route::get('/login', [AdminHomeController::class, 'login'])->name('admin.login');
Route::post('/login', [AdminHomeController::class, 'check_login']);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::get('/', [AdminHomeController::class, 'index'])->name('admin.index');
    Route::get('/logout', [AdminHomeController::class, 'logout'])->name('admin.logout');
    Route::get('/profile', [AdminHomeController::class, 'profile'])->name('admin.profile');
    Route::put('/update_profile', [AdminHomeController::class, 'updateProfile'])->name('admin.update_profile');
    Route::get('/change_password', [AdminHomeController::class, 'changePassword'])->name('admin.change_password');
    Route::put('/update_password', [AdminHomeController::class, 'updatePassword'])->name('admin.update_password');

    Route::resources([
        'category' => CategoryController::class,
        'attribute' => AttributeController::class,
        'image' => ImageController::class,
        'product' => ProductController::class,
        'user' => UserController::class,
        'role' => RoleController::class,
        'permission' => PermissionController::class,
    ]);

    Route::get('/control_product', [ProductController::class, 'discount'])->name('product.discount');
    Route::post('/control_product', [ProductController::class, 'calculate'])->name('product.calculate');
});