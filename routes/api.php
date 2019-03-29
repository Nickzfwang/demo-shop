<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/stairs/{floor?}', 'Api\ApisController@stairsProblem')->where(['floor' => '[0-9]+']);

Route::get('/get/publish', 'Api\ApisController@getPublishNotify');

Route::post('/post/publish', 'Api\ApisController@postPublishNotify');
