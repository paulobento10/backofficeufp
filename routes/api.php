<?php

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

Route::namespace('API')->group(function() {
    Route::prefix('news')->group(function () {
        Route::get('/', 'NewsController@index')->name('index_news');
        Route::get('/N', 'NewsController@index_N')->name('index_news_N');
        Route::get('/{id}', 'NewsController@show_id')->name('id_news');
        Route::get('/search', 'NewsController@search')->name('search_news');

        Route::post('/', 'NewsController@store')->name('store_news');

        Route::put('/{id}', 'NewsController@update')->name('update_news');

        Route::delete('/{id}', 'NewsController@delete')->name('delete_news');
    });
});

Route::namespace('API')->group(function() {
    Route::prefix('events')->group(function () {
        Route::get('/', 'EventsController@index')->name('index_events');
        Route::get('/N', 'EventsController@index_N')->name('index_events_N');
        Route::get('/{id}', 'EventsController@show_id')->name('id_events');
        Route::get('/search', 'EventsController@search')->name('search_events');

        Route::post('/', 'EventsController@store')->name('store_events');

        Route::put('/{id}', 'EventsController@update')->name('update_events');

        Route::delete('/{id}', 'EventsController@delete')->name('delete_events');
    });
});

Route::namespace('API')->group(function() {
    Route::prefix('users')->group(function () {
        Route::get('/', 'UsersController@index')->name('index_users');
        Route::get('/N', 'UsersController@index_N')->name('index_users_N');
        Route::get('/{id}', 'UsersController@show_id')->name('id_users');

        Route::post('/', 'UsersController@store')->name('store_users');

        Route::put('/{id}', 'UsersController@update')->name('update_users');

        Route::delete('/{id}', 'UsersController@delete')->name('delete_users');
    });
});

Route::namespace('API')->group(function() {
    Route::prefix('news_search')->group(function () {
        Route::get('/', 'NewsController@search_query')->name('search_news');
    });
});

Route::namespace('API')->group(function() {
    Route::prefix('events_search')->group(function () {
        Route::get('/', 'EventsController@search_query')->name('search_events');
    });
});

Route::namespace('API')->group(function() {
    Route::prefix('users_search')->group(function () {
        Route::get('/', 'UsersController@search_query')->name('search_users');
    });
});


Route::group([

    'prefix' => 'auth'

], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});