<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataController;

Route::get('/', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/dataLowongan', [DataController::class, 'dataLowongan'])
        ->name('data.dataLowongan');

    Route::get('/topCompany', [DataController::class, 'topCompany'])
        ->name('data.topCompany');

    Route::get('/company/{company}', [DataController::class, 'detailCompany'])
    ->name('data.companyDetail');

    Route::get('/topSkill', [DataController::class, 'topSkill'])
        ->name('data.topSkill');

    Route::get('/lokasi', [DataController::class, 'lokasi'])
        ->name('data.lokasi');

});