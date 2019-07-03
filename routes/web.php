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
//Route::get('/hikes{number}', 'HikeController@pagination')->name('pagination');
Route::post('/hikes', 'HikeController@search')->name('search');

Route::group(['middleware' => ['auth']], function (){
    Route::get('/editProfile', 'UserController@edit')->name('editProfile');
    Route::post('/editProfile', 'UserController@update')->name('editProfilePost');

    Route::get('/createHike', 'HikeController@create')->name('createHike');
    Route::post('/createHike', 'HikeController@store')->name('createHikePost');

    Route::get('/editHike/hike{id}', 'HikeController@edit')->name('editHike');
    Route::post('/editHike/{id}', 'HikeController@update')->name('editHikePost');

    Route::get('/createHike/{id}', 'HikeController@destroy')->name('deleteHike');
});