<?php
Route::get('/admin/customer', [\App\Http\Controllers\CustomerController::class, 'index']);
Route::get('/admin/get-customer', [\App\Http\Controllers\CustomerController::class, 'getCustomer']);
Route::post('/admin/delete-customer', [\App\Http\Controllers\CustomerController::class, 'deleteCustomer']);
Route::post('/admin/edit-customer', [\App\Http\Controllers\CustomerController::class, 'editCustomer']);
Route::post('/admin/add-customer', [\App\Http\Controllers\CustomerController::class, 'addCustomer']);
