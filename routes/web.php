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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

/*
|--------------------------------------------------------------------------
| Frontend
|--------------------------------------------------------------------------|
*/

// Home
Route::name('home')->get('/', 'Front\CardController@index');

/*
|--------------------------------------------------------------------------
| Backend
|--------------------------------------------------------------------------|
*/
Route::prefix('')->namespace('Back')->group(function () {

	Route::middleware('redac')->group(function () {
	   Route::name('dashboard')->get('/dashboard', 'AdminController@index');
	   Route::resource('cards', 'AdminController'); 
	   //Route::resource('cards', 'AdminController')->middleware('can:manage,card');
	});

	Route::middleware('admin')->group(function () {
	   //Route::name('dashboard')->get('/dashboard', 'AdminController@index');
	   //Route::resource('cards', 'AdminController'); 
	});

});