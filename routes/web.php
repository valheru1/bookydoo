<?php

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
    return view('home');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/register', 'HomeController@register')->name('register');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::resource('books', 'BookController')->middleware('auth');

Route::get('/books/{id}/write', 'BookController@write')->middleware('auth');

Route::get('/books/{id}/write/{chapter}', 'BookController@write')->middleware('auth');

Route::post('/books/{id}/addchapter', 'ChapterController@store')->middleware('auth');
