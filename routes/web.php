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

Route::group([], function () {
    Route::get('/home', 'DashboardController@home');
    Route::get('/seo_audit', 'DashboardController@seo_audit');
    Route::get('/audit', 'DashboardController@audit');
    Route::get('/analysis', 'DashboardController@seo_analysis');
});

Route::get('login', 'LoginController@redirectToGoogle')->name('login');
Route::get('login/callback', 'LoginController@handleGoogleCallback');
Route::get('logout', 'LoginController@logout');
