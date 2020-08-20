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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('book','Api\BooksController@index');
Route::get('book/{book}','Api\BooksController@show');

Route::get('author','Api\AuthorsController@index');
Route::get('author/{author}','Api\AuthorsController@show');

Route::get('categories_book','Api\CategoriesBookController@index');
Route::get('categories_book/{category_book}','Api\CategoriesBookController@show');

Route::get('publisher','Api\PublishersController@index');
Route::get('publisher/{publisher}','Api\PublishersController@show');