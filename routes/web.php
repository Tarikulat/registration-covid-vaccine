<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\VaccineShedule;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegistrationController::class, 'create'])->name('register.form');
Route::post('/register', [RegistrationController::class, 'store'])->name('register');

Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::post('/search', [SearchController::class, 'search'])->name('search.status');

Route::get('/admin', [VaccineShedule::class, 'page']);
Route::get('/records', [VaccineShedule::class, 'index']);
Route::post('/records/{id}', [VaccineShedule::class, 'updateRecord']);
