<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

// Admin
Route::get('/admin', 'AdminController@index')->name('admin.index');

// Regular
Route::get('/', 'IndexController@index')->name('index');
Route::get('/home', 'HomeController@index')->name('home');
