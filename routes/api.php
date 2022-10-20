<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'App\Http\Controllers'], function () {

    Route::group(['prefix' => 'clients'], function () {
        Route::get('/', 'ClientController@index');
        Route::post('/', 'ClientController@store');
        Route::put('{id}', 'ClientController@update');
        Route::delete('{id}', 'ClientController@destroy');
    });

    Route::group(['prefix' => 'orders'], function () {
        Route::get('/', 'OrderController@index');
        Route::post('/', 'OrderController@store');
        Route::put('{id}', 'OrderController@update');
        Route::delete('{id}', 'OrderController@destroy');
    });

    Route::group(['prefix' => 'products'], function () {
        Route::get('/', 'ProductController@index');
        Route::post('/', 'ProductController@store');
        Route::put('{id}', 'ProductController@update');
        Route::delete('{id}', 'ProductController@destroy');
    });
});
