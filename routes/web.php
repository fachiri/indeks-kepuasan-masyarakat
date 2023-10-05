<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DasborController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\KuesionerController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RespondenController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/kuesioner', [IndexController::class, 'kuesioner'])->name('kuesioner');
Route::post('/result/store', [IndexController::class, 'store'])->name('result.store');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login'); 
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::middleware(['web', 'auth'])->prefix('dasbor')->group(function () {
   Route::get('/', [DasborController::class, 'index'])->name('dasbor');
   Route::resource('/kuesioner', KuesionerController::class)->names('kuesioner');
   Route::post('/kuesioner/checks', [KuesionerController::class, 'checks'])->name('kuesioner.checks');
   Route::resource('/responden', RespondenController::class)->names('responden');
   Route::get('/ikm', [DasborController::class, 'ikm'])->name('ikm.index');
   Route::get('/ikm/export', [DasborController::class, 'ikm_export'])->name('ikm.export');
   Route::get('/ikm/preview', [DasborController::class, 'ikm_preview'])->name('ikm.preview');
   Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
   Route::get('/profil', [ProfilController::class, 'index'])->name('profil.index');
   Route::post('/profil/update', [ProfilController::class, 'update'])->name('profil.update');
   Route::post('/auth/password', [AuthController::class, 'change_password'])->name('auth.change_password');
});
