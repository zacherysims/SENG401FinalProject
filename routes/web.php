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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/news', 'NewsController@index');

Route::get('/news1', 'NewsController@jwt');

Route::get('/search', 'SearchController@index');

Route::get('/results', 'resultscontroller@index');

Route::get('/picoftheday', 'PicDayController@index');

Route::get('/forum', 'ThreadController@index');
Route::get('/forum', 'ThreadController@index');
Route::get('/forum/create', 'ThreadController@create');
Route::get('/forum/show/{id}' ,'ThreadController@show');
Route::post('/forum', 'ThreadController@store');
Route::post('/forum/show/{id}','CommentController@store');
