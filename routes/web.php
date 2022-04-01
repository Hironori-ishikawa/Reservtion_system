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

// Route::get('/', function () {
//     return view('welcome');
// });

// ユーザー
Route::get('/login', 'User\Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'User\Auth\LoginController@login');
Route::get('/register', 'User\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'User\Auth\RegisterController@register');

// アドミン
Route::get('/admin/login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Admin\Auth\LoginController@login');
Route::get('/admin/register', 'Admin\Auth\RegisterController@showRegistrationForm')->name('admin.register');
Route::post('/admin/register', 'Admin\Auth\RegisterController@register');
Route::get('/logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');
Route::post('/logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');


// User ログイン後
Route::group(['middleware' => 'auth:user'], function () {
    Route::get('/reserve/index', 'ReservationController@index')->name('reserves.index');
    Route::get('/reserve/reserveform', 'ReservationController@reserve')->name('reserves.reserve');
    Route::get('/reserve/remoteform', 'ReservationController@remote')->name('reserves.remote');
    Route::get('/logout', 'User\Auth\LoginController@logout')->name('logout');
    Route::post('/logout', 'User\Auth\LoginController@logout')->name('logout');
});

// オフィス来社予約
Route::get('reserve', 'ReservationController@create'); // 入力フォーム
Route::post('reserve', 'ReservationController@store'); // 送信先

// リモート予約
Route::get('remote', 'ReservationController@create'); // 入力フォーム
Route::post('remote', 'ReservationController@store'); // 送信先

// 予約削除
Route::get('/reserve/{id}/delete', 'ReservationController@delete');
Route::get('/remote/{id}/delete', 'ReservationController@delete');

// Admin ログイン後
Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/admin/auth/index', 'AdminController@index')->name('admin.auth.index');

});
