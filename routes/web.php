<?php

/* Localisation */

Route::get('/language/{locale}', function ($locale) {
    session(['locale' => $locale]);

    return back();
});

/* Pages */
Route::get('/', 'PagesController@gate')->name('gate');;
Route::get('/underage', 'PagesController@underage')->name('underage');;
Route::get('/festival', 'PagesController@main')->name('main');;
Route::get('/festival/{city}', 'PagesController@festival')->name('festival');;

/* Process Date Gage */
Route::post('/gate', 'PagesController@checkAge');

/* Thank you page */
Route::get('/thankyou', function () {
    return view('thankyou');
});
