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
    Route::get('/create', ['uses' => 'PZClientsController@create']);
    Route::post('/store', ['as' => 'client.store', 'uses' => 'PZClientsController@store']);
    Route::get('/', ['uses' => 'PZClientsController@index']);

});

Route::group(['prefix' => 'pizza'], function () {
    Route::get('/', ['as' => 'pizza', 'uses' => 'PZPizzaController@index']);
    Route::get('/create', ['as' =>'pizza.create','uses' => 'PZPizzaController@create']);
    Route::post('/store', ['as' => 'pizza.store', 'uses' => 'PZPizzaController@store']);
    Route::get('/{id}', ['as' => 'pizza.show', 'uses' => 'PZPizzaController@show']);
    Route::get('/{id}/edit', ['uses' => 'PZPizzaController@edit']);
    Route::post('/{id}/edit', ['as' => 'pizza.edit', 'uses' => 'PZPizzaController@update']);
    Route::delete('/{id}/delete', ['as' => 'pizza.destroy', 'uses' => 'PZPizzaController@destroy']);
});
