<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/shorten', [UrlController::class, 'store'])->name('url.shorten');
Route::get('/{code}', [UrlController::class, 'redirect'])->name('url.redirect');
