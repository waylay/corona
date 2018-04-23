<?php

/* Localisation */

Route::get('/language/{locale}', function ($locale) {
    session(['locale' => $locale]);

    return back();
});

/* Pages */
Route::get('/', function () {
    return view('gate');
});

Route::get('/thankyou', function () {
    return view('thankyou');
});

Route::get('/privacy-policy', function () {
    return redirect(trans('text.privacy-policy-link'));
});

/* Date Gage */
Route::post('/gate', 'EntryController@gate');

/* Entry */
Route::post('/process', 'EntryController@store');

/* Auth */
Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

/* Main Dashboard */
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

/* Download Receipts */
Route::get('/download-receipts', 'DashboardController@downloadReceipts')->name('download');

/* View image (if authenticated) */
Route::get('/receipts/{receipt}', function ($receipt) {
    return Image::make(storage_path('app/receipts/' . $receipt))->response();
})->middleware('auth');

// API

// Get all entries
Route::get('/api/entries', 'EntryController@index')->middleware('auth');

// Get one entry
Route::get('/api/entries/{entry}', 'EntryController@show')->middleware('auth');

// Update one entry
Route::post('/api/entries/{entry}', 'EntryController@update')->middleware('auth');

// Deployment fast migrate
Route::get('/migrate', function () {
    \Artisan::call('migrate', [
        '--force' => true,
    ]);

    \Artisan::call('db:seed', [
        '--force' => true,
    ]);

    dd('Done');
})->middleware('auth');
