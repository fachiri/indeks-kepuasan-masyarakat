<?php

use App\Http\Controllers\DasborController;
use App\Http\Controllers\KuesionerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.public.index');
});

Route::prefix('dasbor')->group(function () {
   Route::get('/', [DasborController::class, 'index'])->name('dasbor');
   Route::resource('/kuesioner', KuesionerController::class)->names('kuesioner');
   Route::post('/kuesioner/checks', [KuesionerController::class, 'checks'])->name('kuesioner.checks');
});
