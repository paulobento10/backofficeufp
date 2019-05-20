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

Route::get('/','PagesController@index');

Route::get('/about','PagesController@about');

Route::get('/blog-single','PagesController@blogSingle');

Route::get('/blog','PagesController@blog');

Route::get('/contact','PagesController@contact');

Route::get('/course-single','PagesController@courseSingle');

Route::get('/courses','PagesController@courses');

Route::get('/login','PagesController@login');

Route::get('/register','PagesController@register');