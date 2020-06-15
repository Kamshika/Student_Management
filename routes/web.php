<?php

use Illuminate\Support\Facades\Route;

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
    return view('login');
});

Route::get('login', 'FirstController@index');

Route::post('post-login', 'FirstController@postLogin'); 

Route::get('registration', 'FirstController@registration');

Route::post('post-registration', 'FirstController@postRegistration'); 

Route::get('logout', 'FirstController@logout');

Route::get('dashboard', 'StudentController@index'); 

Route::post('dashboard' , 'StudentController@store');

Route::delete('dashboard/{id}' , 'StudentController@destroy');

Route::put('dashboard/{id}/edit' , 'StudentController@edit');

Route::get('dashboard/{id}/edit' , 'StudentController@show');

Route::put('dashboard/{id}' , 'StudentController@update');