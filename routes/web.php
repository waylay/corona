<?php

/* Localisation */

Route::get('/language/{locale}', function ($locale) {
    session(['locale' => $locale]);

    return back();
});

/* Pages */
Route::get('/', 'PagesController@gate')->name('gate');;

Route::get('/underage', function () {
    return view('underage');
})->name('underage');;

Route::get('/thankyou', function () {
    return view('thankyou');
});

/* Process Date Gage */
Route::post('/gate', 'PagesController@checkAge');
