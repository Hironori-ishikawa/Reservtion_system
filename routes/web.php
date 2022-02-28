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

/*
| 1) User 認証不要
*/
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
/*
| 2) User ログイン後
*/
Route::group(['middleware' => 'auth:user'], function() {
    Route::get('/reserve/index', 'ReservationController@index')->name('reserves.index');
    Route::get('/reserve/reserveform', 'ReservationController@reserve')->name('reserves.reserve');
    Route::get('/reserve/remoteform', 'ReservationController@remote')->name('reserves.remote');
});













