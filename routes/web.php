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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// gen photo resource
Route::group(['prefix' => 'TravelRecord'], function () {
    Route::get('show/{id}', 'TravelRecordController@show');
    Route::get('create', 'TravelRecordController@create');
    Route::post('store', 'TravelRecordController@store');
    Route::get('index', 'TravelRecordController@index');
});

// gen photo type
Route::group(['prefix' => 'PhotoType'], function () {
    Route::get('index', 'PhotoTypeController@index');
    Route::get('create', 'PhotoTypeController@create');
    Route::post('store', 'PhotoTypeController@store');
});

// gen node
Route::group(['prefix' => 'SystemNode'], function () {
    Route::get('create', 'SystemNodeController@create');
    Route::get('index', 'SystemNodeController@index');
    Route::get('edit/{systemNode}', 'SystemNodeController@edit');
    Route::get('show/{systemNode}', 'SystemNodeController@show');
    Route::post('store', 'SystemNodeController@store');
    Route::post('update', 'SystemNodeController@update');
});
