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

Route::group(['middleware' => ['auth:web']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('farmers', 'FarmersController');
    Route::post('farmers/{farmer}/addFarm', 'FarmersController@addFarm')->name('farmers.addFarm');
    Route::post('farmers/{farmer}/addHSCode', 'FarmersController@addHSCode')->name('farmers.addHSCode');
    Route::post('farmers/{farmer}/addSource', 'FarmersController@addSource')->name('farmers.addSource');
    Route::post('farmers/{farmer}/addClient', 'FarmersController@addClient')->name('farmers.addClient');
    Route::resource('companies', 'CompaniesController');
});
