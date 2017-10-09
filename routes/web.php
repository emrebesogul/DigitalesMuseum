<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('timeline');
});

Route::get('/person', function () {
    return view('details.person');
});

Route::get('/epoch', function () {
    return view('details.epoch');
});

Route::get('/epochs', function () {
    return view('epochs');
});

Route::get('/example', function () {
    return view('base');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/signup', function () {
    return view('signup');
});
