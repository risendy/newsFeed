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

Route::get('/', 'HomepageController@index')->name('homepage');
Route::get('type/{id}', 'HomepageController@getPage')->name('type');
Route::post('search', 'HomepageController@search')->name('search');

Route::get('getNews', 'Commands\NewsController@getNews');
Route::get('recycleNews', 'Commands\RecycleController@recycleNews');
