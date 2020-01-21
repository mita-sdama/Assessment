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
    return view('auth/login');
});

Auth::routes();

//data
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/data', 'DataController@index')->name('data');
Route::post('/data/create', 'DataController@create')->name('create_data');
Route::get('/data/edit/{file}', 'DataController@edit');
Route::post('/data/update/{file}', 'DataController@update');    
Route::get('/data/delete/{file}/{foto}', 'DataController@delete');

//account
Route::get('/account', 'AccountController@index')->name('account');
Route::get('/account/add','AccountController@add')->name('add_account');
Route::post('/account/create', 'AccountController@create')->name('create_account');
Route::get('/account/edit/{id}', 'AccountController@edit');
Route::post('/account/update', 'AccountController@update');
Route::get('/account/delete/{id}', 'AccountController@delete');