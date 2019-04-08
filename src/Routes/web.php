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

Route::get('/', 'FrontEndController@index');
Route::get('story/{slug}', 'FrontEndController@post');
Route::get('categories', 'FrontEndController@categories');
Route::get('categories/{slug}', 'FrontEndController@category');
Route::get('page/{slug}', 'FrontEndController@page');

Route::group(['as' => 'frontend.'], function () {
    //Asset Routes
    Route::get('assets', ['uses' => 'FrontEndController@assets', 'as' => 'assets']);
});