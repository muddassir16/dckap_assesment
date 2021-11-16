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

Route::any('/', ['as' => 'login', 'uses' => 'login\LoginController@login']);
Route::group([ 'middleware' => 'checkuser'], function () {
    Route::any('customers', ['as' => 'customers', 'uses' => 'customers\CustomersController@index']);
    Route::any('queries',['as' => 'queries', 'uses' => 'queries\QueriesController@index']);    
});

Route::group(['prefix' => 'customer', 'as' => 'customer.', 'middleware' => ['checkuser']], function () {
    Route::any('add', ['as' => 'add', 'uses' => 'customers\CustomersController@addEditCustomer']);
    Route::any('edit/{id?}', ['as' => 'edit', 'uses' => 'customers\CustomersController@addEditCustomer']);
    Route::any('store', ['uses' => 'customers\CustomersController@store', 'as' => 'store']);
    Route::any('customersList', ['as' => 'customersList', 'uses' => 'customers\CustomersController@customersList']);
    Route::any('delete/{id?}', ['as' => 'delete', 'uses' => 'customers\CustomersController@delete']);
    Route::any('isExistEmail', ['as' => 'isExistEmail', 'uses' => 'customers\CustomersController@isExistEmail']);
});

Route::group(['prefix' => 'queries', 'as' => 'queries.', 'middleware' => ['checkuser']], function () {
    Route::any('queriesList',[ 'as' => 'queriesList', 'uses' => 'queries\QueriesController@queriesList' ]);
    Route::any('store', ['as' => 'store', 'uses' => 'queries\QueriesController@store']);
    Route::any('view', ['as' => 'view', 'uses' => 'queries\QueriesController@view']);
});

Route::any('loginDckap',[ 'as' => 'loginDckap', 'uses' => 'login\LoginController@loginDckap' ]);
Route::any('logout',[ 'as' => 'logout', 'uses' => 'login\LoginController@logout' ]);
Route::any('checksession',[ 'as' => 'checksession', 'uses' => 'login\LoginController@checksession' ]);
