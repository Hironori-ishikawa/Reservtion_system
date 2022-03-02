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

Route::get('/reserves/{id}/reserves', 'ReservationController@index')->name('reserves.index');
// Route::get('/', function () {
//     return view('welcome');
// });


// User 認証不要
Auth::routes();
Route::get('/', function() {
    return redirect('/login');
});
Route::get('/logout', 'Auth\LoginController@logout');

// User ログイン後
Route::group(['middleware' => 'auth:user'], function() {
    Route::get('/reserve/index', 'ReservationController@index')->name('reserves.index');
    Route::get('/reserve/reserveform', 'ReservationController@reserve')->name('reserves.reserve');
    Route::get('/reserve/remoteform', 'ReservationController@remote')->name('reserves.remote');
});

Route::post('/index', 'ReservationController@reserve')->name('reserves.reserve');
