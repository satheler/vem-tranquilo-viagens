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
    return view('pages.home');
})->name('home');

Route::prefix('onibus')->group(function () {
    Route::get('urbano', function () {
        return view('pages.home');
    })->name('onibusurbano');

    Route::get('intermunicipal', function () {
        return view('pages.home');
    })->name('onibusintermunicipal');
});
