<?php

Route::get('/', function () {
    return view('dashboard/home');
});

Route::group([], function () {
    Route::get('/home', 'DashboardController@home');
    Route::get('/audit', 'DashboardController@seo_audit')->name('audit');
    Route::get('/analysis', 'DashboardController@seo_analysis')->name('analysis');
    Route::get('/destroy/{id}','DashboardController@destroy');
    Route::get('/subscription','DashboardController@subscription')->name('subscription');
});

Route::group(['middleware' => ['auth']],function(){
    Route::get('/account', 'DashboardController@account');
    Route::get('/cancel','DashboardController@cancelSubscription')->name('cancel');
    Route::get('payment/{id}', 'PaymentController@payment')->name('payment');
    Route::post('/stripe/{id}', 'PaymentController@stripePost')->name('stripe.post');
    Route::get('/pricing', 'DashboardController@pricing');
});

Route::post('/seo', 'analysisController@get_seo_result')->name('seo');
Route::post('/seo_audit', 'analysisController@get_audit_result')->name('seo_audit');


Route::get('login', 'LoginController@redirectToGoogle')->name('login');
Route::get('login/callback', 'LoginController@handleGoogleCallback');
Route::get('logout', 'LoginController@logout');
