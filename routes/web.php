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
include 'admin/dashboard.php';
include 'admin/user.php';
