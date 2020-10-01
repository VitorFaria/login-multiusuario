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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index')->name('admin.dashboard'); // Redireciona para o admin da página

// Rota recebe o admin/login
Route::get('/admin/login', 'Auth\AdminLoginController@index')->name('admin.login');

// Rota envia o admin login para o get pegar
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
