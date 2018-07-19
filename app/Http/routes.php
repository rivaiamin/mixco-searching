<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('template');
});
Route::get('/admin/', function () {
    return view('template');
});
Route::get('/admin/{module}', function () {
    return view('template');
});

Route::group(['prefix' => 'api'], function () {
    Route::get('dashboard', 'DashboardController@index');
    Route::get('province', 'ProvinceController@index');
    Route::get('main', 'MappingController@index');
    Route::post('login', 'Auth\AuthController@login');

    //module category
    Route::get('category', 'CategoryController@index');
    Route::post('category', 'CategoryController@add');
    Route::get('category/{id}', 'CategoryController@detail');
    Route::put('category/{id}', 'CategoryController@update');
    Route::delete('category/{id}', 'CategoryController@delete');
    
    //module special interest
    Route::get('special', 'SpecialInterestController@index');
    Route::post('special', 'SpecialInterestController@add');
    Route::get('special/{id}', 'SpecialInterestController@detail');
    Route::put('special/{id}', 'SpecialInterestController@update');
    Route::delete('special/{id}', 'SpecialInterestController@delete');
    
    //module seasonality
    Route::get('seasonality', 'SeasonalityController@index');
    Route::post('seasonality', 'SeasonalityController@add');
    Route::get('seasonality/{id}', 'SeasonalityController@detail');
    Route::put('seasonality/{id}', 'SeasonalityController@update');
    Route::delete('seasonality/{id}', 'SeasonalityController@delete');

    //module budget
    Route::get('budget', 'BudgetController@index');
    Route::post('budget', 'BudgetController@add');
    Route::get('budget/{id}', 'BudgetController@detail');
    Route::put('budget/{id}', 'BudgetController@update');
    Route::delete('budget/{id}', 'BudgetController@delete');

    //module number of parties
    Route::get('parties', 'PartiesController@index');
    Route::post('parties', 'PartiesController@add');
    Route::get('parties/{id}', 'PartiesController@detail');
    Route::put('parties/{id}', 'PartiesController@update');
    Route::delete('parties/{id}', 'PartiesController@delete');

    //module food interest
    Route::get('food', 'FoodInterestController@index');
    Route::post('food', 'FoodInterestController@add');
    Route::get('food/{id}', 'FoodInterestController@detail');
    Route::put('food/{id}', 'FoodInterestController@update');
    Route::delete('food/{id}', 'FoodInterestController@delete');

    //module video
    Route::get('video', 'VideoController@index');
    Route::post('video', 'VideoController@add');
    Route::post('video/upload', 'VideoController@upload');
    Route::get('video/{id}', 'VideoController@detail');
    Route::put('video/{id}', 'VideoController@update');
    Route::delete('video/{id}', 'VideoController@delete');

    //module mapping
    Route::get('mapping', 'MappingController@index');
    Route::post('mapping', 'MappingController@add');
    Route::get('mapping/{id}', 'MappingController@detail');
    Route::put('mapping/{id}', 'MappingController@update');
    Route::delete('mapping/{id}', 'MappingController@delete');

    //module guest 
    Route::get('guest', 'GuestController@index');
    Route::post('guest', 'GuestController@add');
    
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
