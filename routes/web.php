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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/books', 'App\Http\Controllers\BooksController@index')->name('book');
Route::get('/search', 'App\Http\Controllers\BooksController@search')->name('search');
Route::get('/edit/{id}', 'App\Http\Controllers\BooksController@edit')->name('edit');

Route::get('/show', 'App\Http\Controllers\LibraryController@show')->name('show');
Route::get('/renew/{id}', 'App\Http\Controllers\LibraryController@edit')->name('renew');
Route::get('/return/{id}', 'App\Http\Controllers\LibraryController@destroy')->name('return');

Route::get('/data', 'App\Http\Controllers\UsersController@index')->name('data');
Route::put('/update', 'App\Http\Controllers\UsersController@update')->name('update');
Route::put('/changePassword', 'App\Http\Controllers\UsersController@edit')->name('changePassword');
Route::get('/deleteAccount', 'App\Http\Controllers\UsersController@destroy')->name('deleteAccount');
Route::get('/dataChanged', 'App\Http\Controllers\UsersController@show')->name('showUpdate');

