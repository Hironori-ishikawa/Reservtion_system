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

Auth::routes();
Route::get('/', function() {
    return redirect('/login');
});
// ログアウト
Route::get('/logout', 'Auth\LoginController@logout');

// User ログイン後
Route::group(['middleware' => 'auth:user'], function() {
    Route::get('/reserve/index', 'ReservationController@index')->name('reserves.index');
    Route::get('/reserve/reserveform', 'ReservationController@reserve')->name('reserves.reserve');
    Route::get('/reserve/remoteform', 'ReservationController@remote')->name('reserves.remote');
});

// 来社予約
Route::get('reserve', 'ReservationController@create'); // 入力フォーム
Route::post('reserve', 'ReservationController@store'); // 送信先

// リモート予約
Route::get('remote', 'ReservationController@create'); // 入力フォーム
Route::post('remote', 'ReservationController@store'); // 送信先

// 削除
Route::get('/reserve/{id}/delete','ReservationController@delete');
Route::get('/remote/{id}/delete','ReservationController@delete');
