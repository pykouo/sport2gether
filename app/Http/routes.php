<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'PagesController@getIndex');
Route::get('/home', 'PagesController@getIndex');

Route::get('/register','PagesController@getRegister');
Route::get('/login','PagesController@getLogin');
Route::get('/user','PagesController@getUser');
Route::get('/activity','PagesController@getActivity');
Route::get('/new-activity','PagesController@getNewActivity');

Route::auth();

