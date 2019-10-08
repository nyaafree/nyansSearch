<?php

use App\Area;
use App\Post;

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



Auth::routes();


Route::group(['middleware'=>['activeUser']],function(){
    Route::resources(['/admin/posts'=>'AdminPostsController']);
    Route::get('/admin','AdminController@index')->name('admin');
    Route::resources(['/admin/categories'=>'AdminCategoriesController']);
    Route::resources(['/admin/areas'=>'AdminAreasController']);
    Route::post('/admin/posts/filter','AdminPostsController@filter');

});

View::share('areas',Area::all());
View::share('topPosts',Post::orderByViews()->take(10)->get());

Route::group(['middleware'=>['activeUser','admin']], function(){
    Route::resources(['/admin/users'=>'AdminUsersController']);

});

Route::get('/posts/filter','PostController@filter');
Route::get('/posts/area', 'PostController@area');

Route::get('/logout','HomeController@logout');

Route::get('/posts/{id}', 'PostController@show')->name('show');

Route::get('/', 'HomeController@index')->name('home');
