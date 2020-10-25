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

// Route::post('/user/{user}','Api\UserController@update')->middleware('auth:api');
Route::post('/user','Api\UserController@update')->middleware('auth:api');
Route::post('/user/submission','Api\UserController@submission')->middleware('auth:api');
Route::post('/user/image','Api\UserController@uploadImage')->middleware('auth:api');
Route::post('/user/messages/{id}', 'Api\MessagesController@isRead')->middleware('auth:api');
Route::get('/user/messages','Api\MessagesController@index')->middleware('auth:api');
Route::get('/user/statistic','Api\UserController@detailBook')->middleware('auth:api');
Route::get('/user','Api\UserController@show')->middleware('auth:api');
Route::get('/user/unreview', 'Api\ReviewController@unreview')->middleware('auth:api');

Route::get('/review','Api\ReviewController@index')->middleware('auth:api');
Route::post('/review','Api\ReviewController@store')->middleware('auth:api');
Route::delete('/review/{id}','Api\ReviewController@destroy')->middleware('auth:api');

Route::get('/recommendation','Api\RecommendationUserController@index')->middleware('auth:api');
Route::post('/recommendation','Api\RecommendationUserController@store')->middleware('auth:api');

Route::get('/transaction','Api\TransactionController@index')->middleware('auth:api');
Route::post('/transaction','Api\TransactionController@store')->middleware('auth:api');
Route::post('/transaction-borrow/{id}','Api\TransactionController@borrow')->middleware('auth:api');
Route::post('/transaction-reject/{id}','Api\TransactionController@reject')->middleware('auth:api');


Route::get('/categories-state','Api\CategoriesStateController@index')->middleware('auth:api');
Route::post('/logout', 'Api\AuthController@logout')->middleware('auth:api');

Route::post('/register', 'Api\AuthController@register');
Route::post('/login', 'Api\AuthController@login');
Route::post('/forgot-password','Api\AuthController@forgot');
Route::post('/reset-password','Api\AuthController@reset');


Route::get('book','Api\BooksController@index');
Route::get('book/{book}','Api\BooksController@show');

Route::get('author','Api\AuthorsController@index');
Route::get('author/{author}','Api\AuthorsController@show');

Route::get('categories-book','Api\CategoriesBookController@index');
Route::get('categories-book/{category_book}','Api\CategoriesBookController@show');

Route::get('publisher','Api\PublishersController@index');
Route::get('publisher/{publisher}','Api\PublishersController@show');

Route::get('recommendation-books','Api\RecomendationBooksController@index');