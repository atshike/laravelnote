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

Route::get('/', function () {
    return view('welcome');
});


Route::get('user','UserController@index');

Route::group(['prefix'=>'article', 'namespace'=>'Article'], function(){

    Route::any('login', 'LoginController@login');
    Route::get('index', 'IndexController@index');
    Route::any('insert', 'IndexController@insert');
    Route::get('code','LoginController@code');
    Route::any('pass','IndexController@pass');
    Route::get('category', 'CategoryController@index');
});
/*
Route::get('article/login','Article\IndexController@login');
Route::get('article/insert','Article\IndexController@insert');
*/





























