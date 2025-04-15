<?php

use App\Http\Controllers\UserConfigController;
use App\Models\UserConfig;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', [UserConfigController::class, 'index'])->name('user.index');
Route::post('/user/save', [UserConfigController::class, 'save'])->name('user.save');
