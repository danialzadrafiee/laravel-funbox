<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PlayController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.index');
});

Route::prefix('auth')->controller(UserController::class)->group(function () {
    Route::get('/', 'index')->name('auth.index');
    Route::get('/register', 'register')->name('auth.register');
    Route::post('/store', 'store')->name('auth.store');
    Route::any('/update', 'update')->name('auth.update');
});

Route::prefix('play')->controller(PlayController::class)->middleware('auth')->group(function () {
        Route::get('/', 'index')->name('play.index');
    });
