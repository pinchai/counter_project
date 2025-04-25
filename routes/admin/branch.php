<?php
Route::get('/admin/branch', [\App\Http\Controllers\BranchController::class, 'index']);
Route::get('/admin/get-branch', [\App\Http\Controllers\BranchController::class, 'getBranch']);
Route::post('/admin/delete-branch', [\App\Http\Controllers\BranchController::class, 'deleteBranch']);
Route::post('/admin/edit-branch', [\App\Http\Controllers\BranchController::class, 'editBranch']);
Route::post('/admin/add-branch', [\App\Http\Controllers\BranchController::class, 'addBranch']);
