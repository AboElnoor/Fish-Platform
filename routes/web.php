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

    //Ex. Route::post('farmers/{farmer}/addFarm', 'FarmersController@addFarm')->name('farmers.addFarm');
    buildRoutes('farmers', ['addFarm', 'addHSCode', 'addSource', 'addClient']);

    Route::resource('branches', 'BranchesController');
    Route::resource('managers', 'ManagersController');
    Route::resource('companies', 'CompaniesController');

    //Ex. Route::post('companies/{company}/addBranch', 'CompaniesController@addBranch')->name('companies.addBranch');
    buildRoutes(
        'companies',
        ['addBranch', 'addManager', 'addBanks', 'addMembership', 'addOwnership', 'addHSCode', 'addSource']
    );

    Route::resource('factories', 'CompaniesController');
    buildRoutes(
        'factories',
        ['addBranch', 'addManager', 'addBanks', 'addMembership', 'addOwnership', 'addHSCode', 'addSource']
    );

    Route::resource('sellers', 'CompaniesController');
    buildRoutes(
        'sellers',
        ['addBranch', 'addManager', 'addBanks', 'addMembership', 'addOwnership', 'addHSCode', 'addSource']
    );
});
