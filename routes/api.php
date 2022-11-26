<?php

use App\Events\OrderEvent;
use App\Events\OrdersEvent;
use App\Events\RestaurantOrdersEvent;
use App\Http\Controllers\ChannelsApis\OrderController;
use App\Http\Controllers\client\CartController;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// client apis
Route::post('/cart/add/{food_id}/{number}', [CartController::class, 'store'])->whereNumber('food_id', 'number')->middleware('client');
Route::post('/cart/update/{cart_id}/{number}', [CartController::class, 'update'])->whereNumber('cart_id', 'number')->middleware('client');
Route::post('/cart/destroy/{cart_id}', [CartController::class, 'destroy'])->whereNumber('cart_id')->middleware('client');

// channels apis
Route::middleware('auth:sanctum', 'client')->post('/sendOrder', [OrderController::class, 'send']);
Route::middleware('auth:sanctum', 'delivery')->post('/acceptOrder', [OrderController::class, 'accept']);
Route::middleware('auth:sanctum', 'delivery')->post('/sendToRestaurant', [OrderController::class, 'sendToRestaurant']);

// check auth from api route
Broadcast::routes(['middleware' => ['auth:sanctum']]);
