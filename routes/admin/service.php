<?php
Route::get('/admin/service', [\App\Http\Controllers\ServiceController::class, 'index']);
Route::get('/admin/get-service', [\App\Http\Controllers\ServiceController::class, 'getService']);
Route::post('/admin/delete-service', [\App\Http\Controllers\ServiceController::class, 'deleteService']);
Route::post('/admin/edit-service', [\App\Http\Controllers\ServiceController::class, 'editService']);
Route::post('/admin/add-service', [\App\Http\Controllers\ServiceController::class, 'addService']);
