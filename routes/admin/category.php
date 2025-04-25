<?php
Route::get('/admin/category', [\App\Http\Controllers\CategoryController::class, 'index']);
Route::get('/admin/get-category', [\App\Http\Controllers\CategoryController::class, 'getCategory']);
Route::post('/admin/delete-category', [\App\Http\Controllers\CategoryController::class, 'deleteCategory']);
Route::post('/admin/edit-category', [\App\Http\Controllers\CategoryController::class, 'editCategory']);
Route::post('/admin/add-category', [\App\Http\Controllers\CategoryController::class, 'addCategory']);
