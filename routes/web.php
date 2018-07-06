<?php

/* Localisation */

Route::get('/language/{locale}', function ($locale) {
    session(['locale' => $locale]);

    return back();
});

/* Pages */
Route::get('/', 'PagesController@gate')->name('gate');;
Route::get('/underage', 'PagesController@underage')->name('underage');;
Route::get('/more', 'PagesController@more')->name('more');;
Route::get('/festival', 'PagesController@main')->name('main');;
Route::get('/festival/{city}', 'PagesController@festival')->name('festival');;

/* Date Gage */
Route::post('/gate', 'PagesController@checkAge');

/* Store Entry */
Route::post('/process', 'PagesController@store');

/* Auth */
Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

/* Main Dashboard */
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

// API

// Get all entries
Route::get('/api/entries', 'PagesController@index')->middleware('auth');

// Get one entry
Route::get('/api/entries/{entry}', 'PagesController@show')->middleware('auth');

// Update one entry
Route::post('/api/entries/{entry}', 'PagesController@update')->middleware('auth');

/* Thank you page */
Route::get('/thankyou', function () {
    return view('thankyou');
});

// Deployment fast migrate
Route::get('/migrate', function () {
    \Artisan::call('migrate:fresh', [
        '--force' => true,
    ]);

    \Artisan::call('db:seed', [
        '--force' => true,
    ]);

    dd('Done');
})->middleware('auth');
