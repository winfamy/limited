<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/test', 'Controller@test');

Route::get('/', 'Client\HomeController@root');
Route::post('/search', 'Client\SearchController@search');
Route::get('/u/{username}', function($username) {
    return view('client.user', ['user' => $username]);
});
Route::get('login', 'Auth\\LoginController@root');
Route::post('login', 'Auth\\LoginController@login');
Route::get('register', 'Auth\\RegisterController@root');
Route::post('register', 'Auth\\RegisterController@register');
Route::get('confirm', 'Auth\\RegisterController@confirm');
Route::post('check', 'Auth\\RegisterController@check');
