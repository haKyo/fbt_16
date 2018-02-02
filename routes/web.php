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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['prefix' => 'admin','middleware' => 'admin'], function () {
	Route::get('/', function() {
	    return view('admin.home');
	})->name('admin');
	Route::resource('user', 'Admin\UserController');
	Route::resource('tour', 'Admin\TourController');
});

Route::get('tour/{id}', 'TourController@show');
	
Route::group(['prefix' => 'user','middleware' => 'auth'], function () {
	//
});

