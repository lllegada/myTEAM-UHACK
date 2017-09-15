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
    return view('login');
})->middleware('guest');

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
	Route::get('/home', function(){
		return view('home');
	});

	Route::resource('/transact', 'TransactionController');
	Route::resource('/home', 'HomeController');
	Route::resource('/home/{month}', 'HomeController@show');

});
