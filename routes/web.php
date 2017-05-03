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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['prefix' => '/'], function () {
    Route::post('/create', ['as' => 'client.create', 'uses' => 'PZClientsController@create']);
    Route::get('/', ['uses' => 'PZClientsController@index']);

});

Route::group(['prefix' => 'pizza'], function () {
    Route::post('/create', ['as' => 'pizza.create', 'uses' => 'PZPizzaController@create']);
    Route::get('/', ['uses' => 'PZPizzaController@index']);

});
