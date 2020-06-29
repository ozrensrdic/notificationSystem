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

Route::get('password/set/email/{email}', 'Auth\SetPasswordController@index')->name('password.set');
Route::post('password/set/email/{email}', 'Auth\SetPasswordController@create')->name('password.create');

Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('home');
});

Route::group([
    'middleware' => [ 'auth', 'verified' ]
], function () {

    Route::resource('notification', 'NotificationController');

    Route::group([
        'role:administrator'
    ], function () {
        Route::resource('ship', 'ShipController');
        Route::resource('rank', 'RankController');
        Route::resource('user', 'UserController');
    });

});
