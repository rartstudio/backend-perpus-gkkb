<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/user','Api\UserController@show')->middleware('auth:api');
// Route::post('/user/{user}','Api\UserController@update')->middleware('auth:api');
Route::post('/user','Api\UserController@update')->middleware('auth:api');
Route::post('/user/submission','Api\UserController@submission')->middleware('auth:api');
Route::post('/user/image','Api\UserController@uploadImage')->middleware('auth:api');
Route::get('/user/messages','Api\MessagesController@show')->middleware('auth:api');

Route::get('/transaction','Api\TransactionController@index')->middleware('auth:api');
Route::post('/transaction','Api\TransactionController@store')->middleware('auth:api');
Route::post('/transaction-borrow/{id}','Api\TransactionController@borrow')->middleware('auth:api');


Route::get('/categories-state','Api\CategoriesStateController@index')->middleware('auth:api');
Route::post('/logout', 'Api\AuthController@logout')->middleware('auth:api');

Route::post('/register', 'Api\AuthController@register');
Route::post('/login', 'Api\AuthController@login');



Route::get('book','Api\BooksController@index');
Route::get('book/{book}','Api\BooksController@show');

Route::get('author','Api\AuthorsController@index');
Route::get('author/{author}','Api\AuthorsController@show');

Route::get('categories-book','Api\CategoriesBookController@index');
Route::get('categories-book/{category_book}','Api\CategoriesBookController@show');

Route::get('publisher','Api\PublishersController@index');
Route::get('publisher/{publisher}','Api\PublishersController@show');

Route::get('recommendation-books','Api\RecomendationBooksController@index');