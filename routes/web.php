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

// UsersController
Route::get('/admin/users', 'UsersController@index');

Route::get('/login', 'UsersController@showLogin');
Route::post('/login', 'UsersController@login');

Route::get('/register', 'UsersController@showRegister');
Route::post('/register', 'UsersController@register');

Route::get('/logout', 'UsersController@logout');

Route::get('/admin/user/{id}', 'UsersController@showUpdate');
Route::post('/admin/user/{id}/update', 'UsersController@update');

Route::get('/admin/user/{id}/delete', 'UsersController@destroy');


// PeopleController
Route::get('/admin/people', 'PeopleController@index');

Route::get('/admin/person/create', 'PeopleController@create');
Route::post('/admin/person/create', 'PeopleController@store');

Route::get('/admin/person/{id}', 'PeopleController@edit');
Route::post('/admin/person/{id}/update', 'PeopleController@update');

Route::get('/person/{id}', 'PeopleController@show');

Route::get('/admin/person/{id}/delete', 'PeopleController@destroy');


// EpochsController
Route::get('/admin/epochs', 'EpochsController@index');

Route::get('/admin/epochs/create', 'EpochsController@create');
Route::post('/admin/epochs/create', 'EpochsController@store');

Route::get('/admin/epochs/{id}', 'EpochsController@edit');
Route::post('/admin/epochs/{id}/update', 'EpochsController@update');

Route::get('/admin/epochs/{id}', 'EpochsController@show');

Route::get('/admin/epochs/{id}/delete', 'EpochsController@destroy');