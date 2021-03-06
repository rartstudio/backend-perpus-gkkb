<?php

use Illuminate\Support\Facades\Auth;
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
    if(Auth::user()){
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('login');
});



//after implement auth add this
//check user.php implements mustverifyemail
Auth::routes(['verify' => true]);

//add middleware verified to make user need verification email
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

