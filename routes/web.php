<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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

Route::get('', [
    ProductsController::class,
    'home'
])->name('home.route');

Route::get("product/{id}", [
    ProductsController::class,
    'show'
])->name('product.show');

Route::get("phone", [
    ProductsController::class,
    'phone'
])->name('phone.route');

Route::get("laptop", [
    ProductsController::class,
    'laptop'
])->name('laptop.route');

Route::get('carts', [
    CartsController::class,
    'index'
])->middleware('auth')->name('cart.route');

Route::get('cartssuccess', [
    CartsController::class,
    'paydone'
])->name('cartssuccess');

Route::POST('carts/confirmation', [
    CartsController::class,
    'payment'
])->middleware('confirmation')->name('pay.route');

Route::get('deliver', [
    OrdersController::class,
    'index'
])->middleware('auth')->name('deliver.route');

Route::delete('unorder', [
    OrdersController::class,
    'unorder'
])->middleware('auth')->name('unorder');

Route::post('okorder', [
    OrdersController::class,
    'okorder'
])->middleware('auth')->name('okorder');

Route::post('okdeliver', [
    OrdersController::class,
    'okdeliver'
])->middleware('auth')->name('okdeliver');

Route::get("search/{value}", [
    ProductsController::class,
    'search'
]);

Route::post('addtocart', [
    ProductsController::class,
    'addCart'
])->middleware('auth')->name('addToCart');

Route::post('removecart', [
    ProductsController::class,
    'removeCart'
])->name('removecart');

Route::post('addquantity', [
    ProductsController::class,
    'addQuantity'
])->name('addquantity');

Route::get('login', [
    LoginController::class,
    'showLogin'
])->name('login.route');

Route::post('login', [
    LoginController::class,
    'login'
])->name('login');

Route::get('logout', [
    LoginController::class,
    'logout'
])->name('logout');

Route::get('register', [
    RegisterController::class,
    'showRegister'
])->name('register.route');

Route::post('register', [
    RegisterController::class,
    'register'
])->name('register');

Route::get('admin', [
    OrdersController::class,
    'admin'
])->middleware('checkAdmin')->name('admin.route');

Route::get('accept', [
    OrdersController::class,
    'accept'
])->middleware('checkAdmin')->name('accept.route');

Route::get('shipping', [
    OrdersController::class,
    'shipping'
])->middleware('checkAdmin')->name('shipping.route');

Route::get('delivered', [
    OrdersController::class,
    'delivered'
])->middleware('checkAdmin')->name('delivered.route');

Route::get('addlaptopshow', [
    ProductsController::class,
    'addlaptopshow'
])->middleware('checkAdmin')->name('addlaptop.route');

Route::get('addphoneshow', [
    ProductsController::class,
    'addphoneshow'
])->middleware('checkAdmin')->name('addphone.route');

Route::post('addphone', [
    ProductsController::class,
    'addphone'
])->middleware('checkAdmin')->name('addphone');

Route::post('addlatop', [
    ProductsController::class,
    'addlaptop'
])->middleware('checkAdmin')->name('addlaptop');

Route::get("adminsearch/{value}", [
    ProductsController::class,
    'adminsearch'
])->middleware('checkAdmin');

Route::get("adminproduct/{id}", [
    ProductsController::class,
    'editproductshow'
])->middleware('checkAdmin')->name('productedit.show');

Route::post("editproduct", [
    ProductsController::class,
    'editproduct'
])->middleware('checkAdmin')->name('product.edit');

Route::delete('deletepro/{id}', [
    ProductsController::class,
    'deleteproduct'
])->middleware('checkAdmin')->name('deletepro.route');

Route::post("comment", [
    ProductsController::class,
    'comment'
])->name('comment');

Route::get("testbill", [
    ProductsController::class,
    'bill'
])->name('bill');
