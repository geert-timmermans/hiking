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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/hikes', 'HikeController@index')->name('hikes');

Route::post('/hikes', 'HikeController@search')->name('search');

Route::get('/hikes/results', 'HikeController@perPage')->name('perPage');

Route::group(['middleware' => ['auth']], function (){
    Route::get('/userHikes', 'HikeController@test')->name('test');

    Route::get('/profile/edit', 'UserController@edit')->name('editProfile');
    Route::post('/profile/edit', 'UserController@update')->name('editProfilePost');

    Route::get('/hike/create', 'HikeController@create')->name('createHike');
    Route::post('/createHike', 'HikeController@store')->name('createHikePost');

    Route::get('/hike/edit/{id}', 'HikeController@edit')->name('editHike');
    Route::post('/editHike/{id}', 'HikeController@update')->name('editHikePost');

    Route::get('/hike/delete/{id}', 'HikeController@destroy')->name('deleteHike');
});