<?php

use Illuminate\Support\Facades\Route;

//GET, POST
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/product', function () {
    return view('product');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/about', function () {
    return view('about');
});

//Admin block
include 'admin/auth.php';
Route::middleware('auth')->group(function () {
    include 'admin/dashboard.php';
    include 'admin/branch.php';
    include 'admin/user.php';
    include 'admin/category.php';
    include 'admin/service.php';
    include 'admin/customer.php';

    //POS
    include 'admin/pos.php';
});
