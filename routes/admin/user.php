<?php
Route::get('/admin/user', [\App\Http\Controllers\UserController::class, 'index']);
Route::get('/admin/add-user', [\App\Http\Controllers\UserController::class, 'addUSer']);
Route::post('/admin/create-user', [\App\Http\Controllers\UserController::class, 'createUser']);
Route::get('/admin/edit-user', [\App\Http\Controllers\UserController::class, 'editUser']);
Route::get('/admin/delete-user', [\App\Http\Controllers\UserController::class, 'deleteUser']);
