<?php

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
//DB::listen(function($query) {
//    var_dump($query->sql, $query->bindings);
//});

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/pay', 'HomeController@pay')->name('pay');
Route::get('/delivery', 'HomeController@delivery')->name('delivery');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/bonus', 'HomeController@bonus')->name('bonus');

// Корзина

Route::get('/cart', 'CartController@cart')->name('cart');
Route::get('/checkout', 'CartController@checkout')->name('checkout');
Route::get('/complete', 'CartController@complete')->name('complete');


Route::get('/foods', 'FoodController@index')->name('foods.index');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'check.admin']], function () {
    Route::get('/', 'Admin\AdminController@index')->name('admin.index');
    Route::resources([
        'categories' => 'Admin\CategoryController',
        'food'       => 'Admin\FoodController',
        'coupon'     => 'Admin\CouponController',
        'order'      => 'Admin\OrderController',
    ]);
});

Route::group(['prefix' => 'food'], function () {
    Route::get('/category/{slug}', 'FoodController@byCategorySlug')->name('food.by-category-slug');
    Route::get('/search', 'FoodController@bySearch')->name('food.by-search');
});

Route::group(['prefix' => 'api'], function () {
    Route::get('/success-pay', 'OrderController@webhook');

    Route::group(['prefix' => 'cart'], function () {
        Route::post('/add-to-cart', 'CartController@store')->name('cart.add-to-cart');
        Route::post('/get', 'CartController@show')->name('cart.get');
        Route::post('/add-order', 'OrderController@addOrder')->name('cart.addOrder');
        Route::post('/activate-coupon', 'CartController@activateCoupon')->name('cart.activate-coupon');
    });
});
