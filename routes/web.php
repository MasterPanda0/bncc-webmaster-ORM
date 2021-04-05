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
    return view('welcome');
});

Route::get('/todolist', 'TodoController@index');
Route::post('/todolist', 'TodoController@store');
Route::delete('/todolist/delete/{id}', 'TodoController@destroy');
Route::get('/todolist/{id}', 'TodoController@edit');
Route::put('/todolist/{id}', 'TodoController@update');
