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
Route::post('/','AuthController@register');
Route::get('/login','PagesController@getLogin');
Route::post('/login','AuthController@login');
Route::post('/login','AuthController@login');
Route::auth();

Route::get('/user','PagesController@getUser');
Route::post('/user','PagesController@updateUser');
Route::get('/user/activity/{id}','PagesController@showUpdateActivity');
Route::post('/user/activity/{id}','PagesController@updateActivity');


Route::get('/activity/new','PagesController@getNewActivity');
Route::post('/activity/new','PagesController@insertActivity');

Route::get('/activities','PagesController@getActivities');
Route::get('/activities/{id}','PagesController@getActivity');

Route::post('/comments','PagesController@insertComment');



