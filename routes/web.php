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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/hikes', 'HikeController@index')->name('hikes');

Route::group(['middleware' => ['auth']], function (){
    Route::get('/createHike', 'UserController@createHike')->name('createHike');
    Route::get('/editHike', 'UserController@editHike')->name('editHike');
    Route::get('/editProfile', 'UserController@editHike')->name('editProfile');
});