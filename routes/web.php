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
Route::get('/post', 'PostController@index')->name('post');
Route::get('/post/create', 'PostController@create')->name('post.create');
Route::post('/post/store', 'PostController@store')->name('post.store');
Route::get('/post/edit/{post}', 'PostController@edit')->name('post.edit');
Route::patch('/post/update/{post}', 'PostController@update')->name('post.update');
Route::delete('/post/destroy/{post}', 'PostController@destroy')->name('post.destroy');
