<?php

use App\Http\Controllers\client\CartController;
use App\Http\Controllers\client\OrderController;
use App\Http\Controllers\client\RegisterController;
use App\Http\Controllers\client\RestaurantsController;
use App\Http\Controllers\client\SessionController;
use App\Http\Controllers\delivery\OrderController as DeliveryOrderController;
use App\Http\Controllers\delivery\RegisterController as DeliveryRegisterController;
use App\Http\Controllers\delivery\SessionController as DeliverySessionController;
use App\Http\Controllers\restaurant\FoodController;
use App\Http\Controllers\restaurant\OrderController as RestaurantOrderController;
use App\Http\Controllers\restaurant\RegisterController as RestaurantRegisterController;
use App\Http\Controllers\restaurant\SessionController as RestaurantSessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// index, show, create, store, edit, update, destroy

Route::get('/', function () {
    if (auth()->guest()) {
        return view('index');
    }
    $rule = auth()->user()->rule === 'admin' ? 'client' : auth()->user()->rule;
    return redirect(route("$rule.index"));
})->name('index');


// client
Route::get('/register', [RegisterController::class, 'create'])->name('client.register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('client.register')->middleware('guest');

Route::get('/login', [SessionController::class, 'create'])->name('client.login')->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->name('client.login')->middleware('guest');
Route::post('/logout', [SessionController::class, 'destroy'])->name('client.logout')->middleware('auth');

Route::get('/home', [RestaurantsController::class, 'index'])->name('client.index')->middleware('client');
Route::get('/restaurant/{user:name}', [RestaurantsController::class, 'show'])->name('client.restaurant')->middleware('client');

Route::get('/cart', [CartController::class, 'index'])->name('client.cart')->middleware('client');

Route::get('/order', [OrderController::class, 'show'])->name('client.order')->middleware('client');
Route::post('/order/place', [OrderController::class, 'place'])->name('client.placeOrder')->middleware('client');
Route::post('/order/destroy', [OrderController::class, 'destroy'])->name('client.destroyOrder')->middleware('client');
Route::get('/orders/old', [OrderController::class, 'index'])->name('client.oldOrders')->middleware('client');


// restaurant
Route::get('/restaurants/register', [RestaurantRegisterController::class, 'create'])->name('restaurant.register')->middleware('guest');
Route::post('/restaurants/register', [RestaurantRegisterController::class, 'store'])->name('restaurant.register')->middleware('guest');

Route::get('/restaurants/login', [RestaurantSessionController::class, 'create'])->name('restaurant.login')->middleware('guest');
Route::post('/restaurants/login', [RestaurantSessionController::class, 'store'])->name('restaurant.login')->middleware('guest');
Route::post('/restaurants/logout', [RestaurantSessionController::class, 'destroy'])->name('restaurant.logout')->middleware('auth');

Route::get('/restaurants', [RestaurantOrderController::class, 'index'])->name('restaurant.index')->middleware('restaurant');
Route::get('/restaurants/order/old', [RestaurantOrderController::class, 'oldOrdersIndex'])->name('restaurant.oldOrders')->middleware('restaurant');


// delivery
Route::get('/delivery/register', [DeliveryRegisterController::class, 'create'])->name('delivery.register')->middleware('guest');
Route::post('/delivery/register', [DeliveryRegisterController::class, 'store'])->name('delivery.register')->middleware('guest');

Route::get('/delivery/login', [DeliverySessionController::class, 'create'])->name('delivery.login')->middleware('guest');
Route::post('/delivery/login', [DeliverySessionController::class, 'store'])->name('delivery.login')->middleware('guest');
Route::post('/delivery/logout', [DeliverySessionController::class, 'destroy'])->name('delivery.logout')->middleware('auth');

Route::get('/delivery', [DeliveryOrderController::class, 'index'])->name('delivery.index')->middleware('delivery');
Route::get('/delivery/order', [DeliveryOrderController::class, 'show'])->name('delivery.order')->middleware('delivery');
Route::post('/delivery/order/{order}', [DeliveryOrderController::class, 'destroy'])->name('delivery.destroyOrder')->middleware('delivery');
Route::get('/delivery/order/old', [DeliveryOrderController::class, 'oldOrdersIndex'])->name('delivery.oldOrders')->middleware('delivery');
