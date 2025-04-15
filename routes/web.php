<?php

use App\Http\Controllers\UserConfigController;
use App\Models\UserConfig;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserConfigController::class, 'welcomeIndex'])->name('welcome');


Route::get('/user', [UserConfigController::class, 'index'])->name('user.index');
Route::get('/user/create', [UserConfigController::class, 'create'])->name('user.create');
Route::post('/user/store', [UserConfigController::class, 'store'])->name('user.store');

Route::post('/user/save-exam', [UserConfigController::class, 'saveExam'])->name('user.saveExam');

Route::get('/test-shell', [UserConfigController::class, 'testShell'])->name('test.shell');
