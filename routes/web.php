<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/main', [App\Http\Controllers\HomeController::class, 'index'])->name('main');
Route::post('/main', [\App\Http\Controllers\FormController::class, 'store'])->middleware(['throttle:web']); //Посредник ограничит количество попыток отправить заявку
