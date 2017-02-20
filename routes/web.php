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

// Dashboard
Route::get('/backend',  ['as'   => 'showDashboard',
                         'uses' => 'Backend\DashboardController@getDashboard']);
Route::post('/backend', ['as'   => 'login',
                         'uses' => 'Backend\DashboardController@postLogin']);
Route::get('/logout',   ['as'   => 'logout',
                         'uses' => 'Backend\DashboardController@getLogout']);
