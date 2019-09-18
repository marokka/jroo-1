<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'food'], function () {
    Route::get('/{id}', 'FoodController@byId');
});


Route::group(['prefix' => 'cart'], function () {
    Route::delete('/{id}', 'CartController@destroy')->name('cart.destroy'); // Удаление корзины

    Route::put('/cart-property',
        'CartController@updateProperty')->name('cart.updateProperty'); // Обновление проперти в корзине

    Route::delete('/cart-property/{cartPropertyId}',
        'CartController@destroyProperty')->name('cart.destroyProperty'); // Удаление проперти у корзины


});

Route::get('/console', function () {
    Artisan::call("migrate");
    Artisan::call("cache:clear");
    Artisan::call("storage:link");
});


Route::get('/console/cache-clear', function () {
    Artisan::call("cache:clear");
    Artisan::call('migrate');
});
