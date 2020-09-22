<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('dashboard');
Route::get('/profile', 'HomeController@profile')->name('profile');

Route::get('/authors/data','DataController@authors')->name('authors.data');
Route::get('/categories_book/data','DataController@categories_book')->name('categories_book.data');
Route::get('/categories_state/data','DataController@categories_state')->name('categories_state.data');
Route::get('/publishers/data','DataController@publishers')->name('publishers.data');
Route::get('/books/data','DataController@books')->name('books.data');
Route::get('/members/data','DataController@members')->name('members.data');
Route::get('/recommendation-books/data','DataController@recomendationBooks')->name('recommendation-books.data');
Route::get('/transactions-borrow','DataController@transactions_borrow')->name('transactions-borrow');
Route::get('/transactions-history','DataController@transactions_history')->name('transactions-history');


Route::resource('authors', 'AuthorsController');
Route::resource('categories_book', 'CategoriesBookController');
Route::resource('publishers', 'PublishersController');
Route::resource('categories_state', 'CategoriesStateController');
Route::resource('books', 'BooksController');
Route::resource('members', 'MembersController');
Route::resource('recommendation-books','RecomendationBooksController');

Route::get('transactions/{id}','TransactionsController@show')->name('transactions-show');
Route::post('transactions-accepted/{id}','TransactionsController@accepted')->name('transactions-accepted');
Route::post('transactions-rejected/{id}','TransactionsController@rejected')->name('transactions-rejected');