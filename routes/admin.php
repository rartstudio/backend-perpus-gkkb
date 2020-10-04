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

Route::get('/transactions-returned/data','DataController@returned')->name('transactions-return.data');
Route::get('/transactions-borrow/data','DataController@borrow')->name('transactions-borrow.data');
Route::get('/transactions-rejected/data','DataController@rejected')->name('transactions-reject.data');

Route::resource('authors', 'AuthorsController');
Route::resource('categories_book', 'CategoriesBookController');
Route::resource('publishers', 'PublishersController');
Route::resource('categories_state', 'CategoriesStateController');
Route::resource('books', 'BooksController');
Route::resource('recommendation-books','RecomendationBooksController');


// Route::resource('members', 'MembersController');
Route::post('member-submission/{id}', 'MemberController@submission')->name('member-submission');
Route::get('member/{id}','MemberController@show')->name('member-show');

Route::get('member-rejected-form/{id}','MemberController@rejectedForm')->name('member-rejected-form');
Route::post('member-rejected','MemberController@rejected')->name('member-rejected');

Route::get('transactions/{id}','TransactionsController@show')->name('transactions-show');
Route::get('transactions-borrow','TransactionsController@borrow')->name('transactions-borrow');
Route::get('transactions-rejected','TransactionsController@rejected')->name('transactions-reject');

Route::post('transactions-accepted/{id}','TransactionsController@accepted')->name('transactions-accepted');
Route::get('transactions-returned/{id}','TransactionsController@returned')->name('transactions-returned');

Route::get('transactions-ready-form/{id}','TransactionsController@ReadyForm')->name('transactions-ready-form');
Route::post('transactions-ready-form/{id}','TransactionsController@storeReadyForm')->name('transactions-ready-store');

Route::get('transactions-reject-form/{id}','TransactionsController@RejectForm')->name('transactions-reject-form');
Route::post('transactions-reject-form/{id}','TransactionsController@storeRejectForm')->name('transactions-reject-store');


Route::get('transactions-borrow','TransactionsController@borrow')->name('transactions-borrow');
Route::get('transactions-reject','TransactionsController@reject')->name('transactions-reject');