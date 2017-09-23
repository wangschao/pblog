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

//home
Route::get('/','HomeController@index')->name('index');
//auth
Auth::routes();
//user
Route::resource('user','UserController');
Route::resource('article','ArticleController');
//杂项(评论，收藏，点击)
Route::resource('odd','OddController');



