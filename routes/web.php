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
    return view('public.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Route::get('/{anypath}', 'HomeController@index')->where('path', '.*');



Route::group(['middleware' => ['auth']], function () {
    Route::post('/add-category', 'CategoryController@save_category')->name('add-category');
    Route::get('/categories', 'CategoryController@all_category')->name('categories');
    Route::delete('/categories/{id}', 'CategoryController@delete_category');
    Route::get('/categories/{id}', 'CategoryController@find_category');
    Route::post('/categories/{id}', 'CategoryController@update_category');


    Route::get('posts', 'PostController@all_posts')->name('posts');
    Route::post('/savepost', 'PostController@save_post')->name('savepost');
    Route::delete('/delete-post/{id}', 'PostController@delete_post');
    Route::get('/posts/{id}', 'PostController@find_post');
    Route::post('/posts/{id}', 'PostController@update_post');

    Route::get('blogpost', 'BlogController@get_all_blogpost');
});
