<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('dashboard');

Route::get('/authors/data','DataController@authors')->name('authors.data');

Route::resource('authors', 'AuthorsController');