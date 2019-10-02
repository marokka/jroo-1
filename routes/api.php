<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

//header('Access-Control-Allow-Origin: *');

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'food'], function () {
    Route::get('/{id}', 'FoodController@byId');
});


Route::apiResource('categories', 'Api\V1\CategoryController')->middleware('api.headers');
Route::apiResource('foods', 'Api\V1\FoodApiController')->middleware('api.headers');


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

Route::get('/success', function () {
    return view('cart.complete');
});
Route::post('/success-pay', 'OrderController@webhook');

Route::get('/console/cache-clear', 'ConsoleController@cacheClear');
Route::get('/console/migrate', 'ConsoleController@migrate');
Route::get('/console/php', function () {
    phpinfo();
});

