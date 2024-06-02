<?php

use App\Http\Controllers\VolumeController;
use Illuminate\Support\Facades\Route;

// Маршрут для отображения формы
Route::get('/', [VolumeController::class, 'showForm'])->name('show.form');

// Маршрут для обработки формы
Route::post('/', [VolumeController::class, 'calculate'])->name('calculate.volume');
