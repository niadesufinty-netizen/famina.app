<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/daftar', function () {
    return view('daftar');
});

Route::get('/bmi', function () {
    return view('bmi');
});

use App\Http\Controllers\BmiController;
Route::post('/hitung-bmi', [BmiController::class, 'hitung']);

use App\Http\Controllers\AuthController;
Route::get('daftar', [AuthController::class, 'showRegisterForm']);

Route::post('/daftar', [AuthController::class, 'register'])
->name('register.store');

Route::get('/selamatdatang', function () {
    return view('selamatdatang');
})->name('selamatdatang');




