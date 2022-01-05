<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/main', [App\Http\Controllers\HomeController::class, 'index'])->name('main');
//Route::post('/main', [\App\Http\Controllers\FormController::class, 'store'])->middleware(['throttle:web']); //Посредник ограничит количество попыток отправить заявку
Route::post('/update/{id}', [\App\Http\Controllers\StatusController::class, 'status'])->name('upgrade'); //Для того чтобы менеджер мог отмечать заявки, которые просмотрел
Route::middleware(['throttle:web'])->group(function () {
    Route::post('/main', [\App\Http\Controllers\FormController::class, 'store']);
    Route::get('/main/send/{last_id}', [\App\Http\Controllers\MailController::class, 'send'])->name('send');
});

