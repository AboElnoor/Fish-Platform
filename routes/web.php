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

Route::prefix('admin')->name('admin.')->middleware('admin:web')->group(function () {
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
    Route::get('ptools/search', 'MarketsController@search')->name('ptools.search');
    Route::resource('ptools', 'MarketsController');
    Route::resource('galleries', 'GalleriesController');
    Route::get('users/search', 'UsersController@search')->name('users.search');
    Route::resource('users', 'UsersController');
    Route::get('admins/search', 'UsersController@search')->name('admins.search');
    Route::resource('admins', 'UsersController');
});

Route::middleware('auth:web')->group(function () {
    Route::get('markets/{market}/request/', 'MarketsController@addRequester')->name('markets.request');
    Route::delete('markets/{market}/cancel/{user}', 'MarketsController@CancelRequester')->name('markets.cancel');

    Route::resource('experts', 'ExpertsController')->only('store');
    Route::resource('farmers', 'FarmersController')->only('index', 'create', 'store');
    Route::resource('markets', 'MarketsController')->except('index', 'show');
    Route::resource('ptools', 'MarketsController')->except('index', 'show');
    Route::resource('contact', 'ContactsController')->only('store');
    Route::resource('users', 'UsersController')->only('show', 'edit', 'update');
});

Route::middleware('web')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('about', 'HomeController@about')->name('about');
    Route::get('privacy', 'HomeController@privacy')->name('privacy');
    Route::get('localities/{governorate}', 'HomeController@getGovernorateLocalities')->name('localities');
    Route::get('villages/{locality}', 'HomeController@getLocalityVillages')->name('villages');
    Route::resource('practices', 'PracticesController')->only('index', 'show');
    Route::get('videos', 'VideosController@index')->name('videos.index');
    Route::get('prices', 'PricesController@index')->name('prices.index');
    Route::get('markets/search', 'MarketsController@search')->name('markets.search');
    Route::resource('markets', 'MarketsController')->only('index', 'show');
    Route::resource('experts', 'ExpertsController')->only('index', 'show');
    Route::get('contents/{type}', 'ContentsController@index')->name('contents.type');
    Route::get('content/{content}', 'ContentsController@show')->name('contents.show');
    Route::get('ptools/search', 'MarketsController@search')->name('ptools.search');
    Route::resource('ptools', 'MarketsController')->only('index', 'show');
    Route::resource('companies', 'CompaniesController')->only('index');
    Route::resource('factories', 'CompaniesController')->only('index');
    Route::resource('sellers', 'CompaniesController')->only('index');
});
