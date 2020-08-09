<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('dashboard');

Route::get('/authors/data','DataController@authors')->name('authors.data');
Route::get('/categories_book/data','DataController@categories_book')->name('categories_book.data');
Route::get('/publishers/data','DataController@publishers')->name('publishers.data');

Route::resource('authors', 'AuthorsController');
Route::resource('categories_book', 'CategoriesBookController');
Route::resource('publishers', 'PublishersController');