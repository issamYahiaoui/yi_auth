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
Route::get('/home', 'UserController@index')->name('home');
Route::prefix('auth')->group(function (){
    Route::get('/{provider}', 'AuthSocController@redirectToProvider');
    Route::get('/{provider}/callback', 'AuthSocController@handleProviderCallback');
});
Route::prefix('admin')->group(function (){
    Route::get('/profil', 'UserController@profil')->name('profil');
    Route::prefix('/users')->group(function (){
        Route::get('/', 'UserController@getUsers')->name('admin-users');
        Route::post('/store', 'UserController@store')->name('admin-users-store');
        Route::patch('/{id}/edit', 'UserController@update')->name('admin-users-edit');
        Route::delete('/{id}/delete', 'UserController@destroy')->name('admin-users-destroy');
        Route::post('/change_avatar', 'UserController@changePic')->name('admin-users-change-avatar');
        Route::post('/password', 'UserController@changePassword')->name('admin-users-password');
    });
});


