<?php
Route::get('/admin/pos', [\App\Http\Controllers\PosController::class, 'index']);
Route::get('/admin/pos/get-data', [\App\Http\Controllers\PosController::class, 'getData']);
//Route::post('/admin/add-customer', [\App\Http\Controllers\CustomerController::class, 'addCustomer']);
