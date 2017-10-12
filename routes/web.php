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

Route::post('/login', 'UsersController@login');
Route::get('/logout', 'UsersController@logout');
Route::post('/register', 'UsersController@register');

Route::get('/admin/users', 'UsersController@index');
Route::get('/admin/user/{id}', 'UsersController@show');
Route::post('/admin/user/{id}/update', 'UsersController@update');
Route::post('/admin/user/{id}/delete', 'UsersController@destroy');
