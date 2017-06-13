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

Route::resource('categories','CategoriesController');
Route::resource('articles','ArticlesController');
Route::resource('comments','CommentsController');

// Visitor

Route::get('/visitor/articles','VisitorController@index');
Route::get('/visitor/articles/{id}','VisitorController@show');
Route::post('visitor/articleByCategory','VisitorController@articleByCategory');
