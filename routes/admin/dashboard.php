<?php
Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index']);
Route::get('/admin', [\App\Http\Controllers\DashboardController::class, 'index']);
Route::get('/admin/dashboard', [\App\Http\Controllers\DashboardController::class, 'index']);
