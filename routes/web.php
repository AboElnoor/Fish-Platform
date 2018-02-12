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

Route::prefix('admin')->name('admin.')->middleware('auth:web')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin');

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
    //Ex. Route::post('factories/{factory}/addBranch', 'CompaniesController@addBranch')->name('factories.addBranch');
    buildRoutes(
        'factories',
        ['addBranch', 'addManager', 'addBanks', 'addMembership', 'addOwnership', 'addHSCode', 'addSource'],
        'CompaniesController'
    );

    Route::resource('sellers', 'CompaniesController');
    //Ex. Route::post('sellers/{seller}/addBranch', 'CompaniesController@addBranch')->name('sellers.addBranch');
    buildRoutes(
        'sellers',
        ['addBranch', 'addManager', 'addBanks', 'addMembership', 'addOwnership', 'addHSCode', 'addSource'],
        'CompaniesController'
    );

    Route::get('prices/search', 'PricesController@search')->name('prices.search');
    Route::resource('prices', 'PricesController');
    Route::resource('pricesTwo', 'PricesTwoController');
    Route::resource('practices', 'PracticesController');
    Route::resource('videos', 'VideosController');
    Route::get('markets/search', 'MarketsController@search')->name('markets.search');
    Route::resource('markets', 'MarketsController');
    Route::resource('experts', 'ExpertsController');
    Route::resource('contents', 'ContentsController');
    Route::get('ptools/search', 'PtoolsController@search')->name('ptools.search');
    Route::resource('ptools', 'PtoolsController');
});

Route::middleware('web')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('about', 'HomeController@about')->name('about');
    Route::get('localities/{governorate}', 'HomeController@getGovernorateLocalities')->name('localities');
    Route::get('villages/{locality}', 'HomeController@getLocalityVillages')->name('villages');
    Route::resource('practices', 'PracticesController')->only('index', 'show');
    Route::get('videos', 'VideosController@index')->name('videos.index');
    Route::get('prices', 'PricesController@index')->name('prices.index');
    Route::resource('markets', 'MarketsController')->only('index', 'show');
    Route::get('experts', 'ExpertsController@index')->name('experts.index');
    Route::resource('farmers', 'FarmersController')->only('create', 'store');
    Route::get('contents/{type}', 'ContentsController@index')->name('contents.type');
    Route::get('content/{content}', 'ContentsController@show')->name('contents.show');
    Route::resource('ptools', 'PtoolsController')->only('index', 'show');
});
