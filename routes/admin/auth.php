<?php
Route::get('/login', [
    \App\Http\Controllers\AuthController::class,
    'index'
])->name('login');
Route::post('/do-login', [\App\Http\Controllers\AuthController::class, 'doLogin']);
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
