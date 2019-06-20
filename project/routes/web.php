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
Route::get('/login', 'MainController@indexlogin');
Route::get('/register', 'MainController@indexregister');
Route::post('/checklogin', 'MainController@checklogin');

Route::group(['prefix' => 'user'], function () {
    Route::post('/create_account_user', 'MainController@create_account_user');
    Route::get('/successloginuser', 'MainController@successloginuser');
    Route::get('/logout', 'MainController@logout');
});
Route::group(['prefix' => 'admin'], function () {
    Route::get('/admin_add_account', 'MainController@indexadmin_register');
    Route::post('/admin_create_account', 'MainController@admin_create_account');
    Route::get('/successloginadmin', 'MainController@successloginadmin');
    Route::get('/logout', 'MainController@logout');
});