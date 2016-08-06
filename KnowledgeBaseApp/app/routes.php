<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/', ['as' => '/', 'uses' => 'HomeController@login']);

Route::post('/login', ['as' => 'login', 'uses' => 'HomeController@doLogin']);

Route::get('/logout', array('uses' => 'HomeController@doLogout'));

Route::get('/knowledgebase', ['as' => 'knowledgebase', 'uses' => 'HomeController@knowledgebase']);

Route::post('/knowledgebase', ['as' => 'knowledgebase', 'uses' => 'HomeController@knowledgebasePost']);

Route::get('/signup', ['as' => 'signup', 'uses' => 'HomeController@signup']);

Route::post('/signup',['as' => 'signup', 'uses' => 'HomeController@signUpPost']);

Route::get('/showpost', ['as' => 'showpost', 'uses' => 'HomeController@showPost']);

Route::post('/comment/{p_id?}',['as' => 'comment', 'uses' => 'HomeController@commentPost']);
