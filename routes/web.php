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

<<<<<<< HEAD
Route::get('/users', 'UsersController@index');
Route::get('/users/{id}', 'UsersController@show');
Route::post('/login', 'UsersController@login');
Route::post('/administration/user', 'UsersController@register');
=======
Route::get('/admin-edit', function () {
    return view('admin.admin-edit-view');
});

Route::get('/epochs', function () {
    return view('epochs');
});

Route::get('/example', function () {
    return view('base');
});

Route::get('/test', function() {
    print_r($_POST);
});
>>>>>>> 6b2b9c3507c45556329b35413c29e1de94a7fc29
