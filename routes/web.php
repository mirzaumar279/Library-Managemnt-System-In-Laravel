<?php

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


//home
Route::get('/', function () {
    return view('welcome');
});

//Dashboard
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('dashboard','App\Http\Controllers\home@index')->name('dashboard');
});



//book
Route::get('bookview','App\Http\Controllers\BookController@show');
Route::get('bookdelete/{id}','App\Http\Controllers\BookController@destroy');
Route::get('bookadd','App\Http\Controllers\BookController@create');
Route::post('booksubmit','App\Http\Controllers\BookController@store');
Route::get('bookedit/{id}','App\Http\Controllers\BookController@edit');
Route::post('bookupdate/{id}','App\Http\Controllers\BookController@update');
Route::get('bookdetail/{id}','App\Http\Controllers\BookController@index');

//Users
Route::get('userview','App\Http\Controllers\UserssController@show');
Route::get('userdelete/{id}','App\Http\Controllers\UserssController@destroy');
Route::get('useradd','App\Http\Controllers\UserssController@create');
Route::post('usersubmit','App\Http\Controllers\UserssController@store');
Route::get('usersedit/{id}','App\Http\Controllers\UserssController@edit');
Route::post('usersupdate/{id}','App\Http\Controllers\UserssController@update');
Route::get('userdetail/{id}','App\Http\Controllers\UserssController@index');


//customer
Route::get('view','App\Http\Controllers\CustomerController@show');
Route::get('delete/{id}','App\Http\Controllers\CustomerController@destroy');
Route::get('add','App\Http\Controllers\CustomerController@create');
Route::post('submit','App\Http\Controllers\CustomerController@store');
Route::get('edit/{customer}','App\Http\Controllers\CustomerController@edit');
Route::post('update/{customer}','App\Http\Controllers\CustomerController@update');