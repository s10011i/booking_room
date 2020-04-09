<?php

use Illuminate\Support\Facades\Route;

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
Route::group(['middleware'=>['web']],function(){

    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::resource('users','UsersController',['except'=>['show','edit','update','destroy'] ]);
    Route::post('/login','UsersController@login')->name('login');
    Route::get('/logout', 'UsersController@logout')->name('logout');

    Route::resource('rooms','RoomsController',['except'=>['edit'] ]);
    Route::get('/rooms/show-details/{room}','RoomsController@showDetails');

    Route::resource('reservations','ReservationsController',['except'=>['index','create','edit','update','destroy'] ]);
    Route::post('/rooms/{room}/reservations','ReservationsController@store');
    // admin auth
    // Route::get('/user','UsersController@userPerm')->name('userperm');
    Route::group(['middleware'=>['admin']],function(){
        Route::get('/admin','RoomsController@adminPerm')->name('adminperm');
    });
    Route::get('/nopermission','RoomsController@noPermission')->name('nopermission');


});