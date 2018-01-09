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

Auth::routes();

Route::group(['middleware' => ['auth:web']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('farms', 'FarmsController');
    Route::resource('hSCodes', 'hScodesController');
    Route::resource('farmers', 'FarmersController');

    Route::post('farmers/{farmer}/addFarm', 'FarmersController@addFarm')->name('farmers.addFarm');
    Route::post('farmers/{farmer}/addHSCode', 'FarmersController@addHSCode')->name('farmers.addHSCode');
    Route::post('farmers/{farmer}/addSource', 'FarmersController@addSource')->name('farmers.addSource');
    Route::post('farmers/{farmer}/addClient', 'FarmersController@addClient')->name('farmers.addClient');

    Route::resource('branches', 'BranchesController');
    Route::resource('companies', 'CompaniesController');
    Route::resource('managers', 'ManagersController');

    Route::post('companies/{company}/addBranch', 'CompaniesController@addBranch')->name('companies.addBranch');
    Route::post('companies/{company}/addManager', 'CompaniesController@addManager')->name('companies.addManager');
    Route::post('companies/{company}/addBanks', 'CompaniesController@addBanks')->name('companies.addBanks');
    Route::post('companies/{company}/addMembership', 'CompaniesController@addMembership')
        ->name('companies.addMembership');
    Route::post('companies/{company}/addOwnership', 'CompaniesController@addOwnership')->name('companies.addOwnership');
    Route::post('companies/{company}/addHSCode', 'CompaniesController@addHSCode')->name('companies.addHSCode');
    Route::post('companies/{company}/addSource', 'CompaniesController@addSource')->name('companies.addSource');
});
