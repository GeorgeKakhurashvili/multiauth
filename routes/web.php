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
Route::get('/users/logout','Auth\LoginController@userLogout')->name('logout');
Route::get('/admin/home', 'AdminController@index')->name('admin');
Route::get('/admin','Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin','Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin/logout','Auth\AdminLoginController@logout')->name('admin.logout');

//password reset routes
Route::post('/admin/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('/admin/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('/admin/password/reset','Auth\AdminResetPasswordController@reset');
Route::get('/admin/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
