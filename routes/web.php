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

Route::get('', function () {
    return view('public.index');
});

Route::get('blogpost', 'BlogController@get_all_blogpost');
Route::get('/blogpost/{id}', 'BlogController@get_by_find_blogpost');
Route::get('/category-sidebar', 'BlogController@get_category_sidebar');
Route::get('/blogpost-category-id/{id}', 'BlogController@get_post_by_category_id');
Route::get('/search', 'BlogController@search_post');
Route::get('/latepost', 'BlogController@get_latepost');
Route::get('/home-about-us', 'BlogController@get_about_us');
Route::get('/home-ourservice', 'BlogController@get_ourservice');
Route::get('/home-portfolio', 'BlogController@get_portfolio');
Route::get('/status', 'BlogController@get_status');


Route::post('/save-contact', 'ContactController@save_contact');






Auth::routes();
Route::get('/administrator', 'HomeController@index');


Auth::routes();
Route::get('/administrator', 'HomeController@index');



Route::group(['middleware' => ['auth']], function () {

    Route::post('/add-category', 'CategoryController@save_category')->name('add-category');
    Route::get('/categories', 'CategoryController@all_category')->name('categories');
    Route::delete('/categories/{id}', 'CategoryController@delete_category');
    Route::get('/categories/{id}', 'CategoryController@find_category');
    Route::post('/categories/{id}', 'CategoryController@update_category');
    Route::get('/search-by-category-name', 'CategoryController@search_cat_name');
    Route::get('/count-category', 'CategoryController@count_category_all');



    Route::get('posts', 'PostController@all_posts')->name('posts');
    Route::post('/savepost', 'PostController@save_post')->name('savepost');
    Route::delete('/delete-post/{id}', 'PostController@delete_post');
    Route::get('/posts/{id}', 'PostController@find_post');
    Route::post('/posts/{id}', 'PostController@update_post');
    Route::get('/search-by-post', 'PostController@search_by_post');
    Route::get('/count-post', 'PostController@count_post_all');

    Route::delete('/delete-contact/{id}', 'ContactController@delete_contact');
    Route::get('/contact', 'ContactController@get_all_contact');
    Route::get('/contact/{id}', 'ContactController@get_by_contact_id');

    Route::get('/about-us', 'AboutUsController@get_about_us_id');
    Route::post('/update-about-us', 'AboutUsController@update_about_us');

    Route::get('/ourservice', 'OurServiceController@get_ourservice_by_id');
    Route::post('/update-ourservice', 'OurServiceController@update_ourservice');

    Route::get('/portfolio-category', 'PortfolioCategoryController@list');
    Route::get('/portfolio-category/{id}', 'PortfolioCategoryController@find_by_id');
    Route::post('/save-portfolio-category', 'PortfolioCategoryController@save');
    Route::post('/update-portfolio-category/{id}', 'PortfolioCategoryController@update');
    Route::delete('/delete-portfolio-category/{id}', 'PortfolioCategoryController@delete');
    Route::get('/search-by-portfolio-category', 'PortfolioCategoryController@search_cat_name');

    Route::get('/status', 'StatusController@find_by_id');
    Route::post('/update-status', 'StatusController@update');

    Route::get('/portfolio', 'PortfolioController@list');
    Route::get('/portfolio/{id}', 'PortfolioController@find_by_id');
    Route::post('/save-portfolio', 'PortfolioController@save');
    Route::post('/update-portfolio/{id}', 'PortfolioController@update');
    Route::delete('/delete-portfolio/{id}', 'PortfolioController@delete');
});


