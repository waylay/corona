<?php

/* Localisation */

Route::get('/language/{locale}', function ($locale) {
    session(['locale' => $locale]);

    return back();
});

/* Pages */
Route::get('/', function () {
    return view('gate');
})->name('gate');;

Route::get('/underage', function () {
    return view('underage');
})->name('underage');;

Route::get('/thankyou', function () {
    return view('thankyou');
});

/* Process Date Gage */
Route::post('/gate', 'EntryController@gate');

Route::get('/signup', 'EntryController@signup')->name('signup-page');

/* Entry */
Route::post('/process', 'EntryController@store');

/* Auth */
Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

/* Main Dashboard */
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

// API

// Get all entries
Route::get('/api/entries', 'EntryController@index')->middleware('auth');

// Get one entry
Route::get('/api/entries/{entry}', 'EntryController@show')->middleware('auth');

// Update one entry
Route::post('/api/entries/{entry}', 'EntryController@update')->middleware('auth');

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

// Route::get('/mail', function () {
//     $entry = App\Entry::find(2);

//     return new App\Mail\NewEntry($entry);
// });
