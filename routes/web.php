<?php

use Illuminate\Support\Facades\Route;

/*
    FRONTEND
*/

Route::get('/', function () {
    return view('public.post.index');
})->name('post-index');

Route::get('/post/1/detail', function () {
    return view('public.post.detail');
})->name('detail-post');

/*
    AUTHENTICATIONS
*/

Auth::routes();

/*
    BACKEND
*/

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/post/create', 'PostController@create')->name('post.create');
Route::post('/post/store', 'PostController@store')->name('post.store');
