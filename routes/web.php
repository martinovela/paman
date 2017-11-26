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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/add_user', 'HomeController@addUserGet')->name('add_user');

Route::post('/add_user', 'HomeController@addUserPost')->name('add_user_post');

Route::get('/change_password', 'Auth\ForgotPasswordController@changePasswordGet')->name('change_password');

Route::post('/change_password', 'Auth\ForgotPasswordController@changePasswordPost')->name('change_password_post');
