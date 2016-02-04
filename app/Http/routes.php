<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/user/token/gettoken', 'AuthenticateController@success');
Route::any('/test', 'AuthenticateController@authenticate');
Route::any('/user/token/testtoken', 'AuthenticateController@getAuthenticatedUser');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['jwt.auth']], function () {
    Route::any('/tes_middleware', 'AuthenticateController@testMiddleware');
});

Route::group(['middleware' => ['jwt.refresh']], function () {
    Route::any('/tes_middleware_refresh', 'AuthenticateController@testMiddleware');
});
