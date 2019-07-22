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

Route::get('/', 'HomepageController@index')->name('/');
Route::get('/showNews/{id}', 'NewsController@showNews')->name('showNews');
Route::get('type/{id}', 'HomepageController@getPage')->name('type');
Route::post('search', 'HomepageController@search')->name('search');
Route::post('storeComment', 'CommentController@store')->name('storeComment');

Route::get('getNews', 'Commands\NewsController@getNews');
Route::get('recycleNews', 'Commands\RecycleController@recycleNews');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
