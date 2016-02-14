<?php
Route::group(['prefix' => 'auth'], function(){

    Route::any('get_user', 'AuthenticateController@getAuthenticatedUser');

    Route::group(['prefix' => 'token'], function(){

       Route::post('', 'AuthenticateController@authenticate');

       Route::get('refresh', 'AuthenticateController@testMiddleware')->middleware('jwt.refresh');

       Route::post('auth', 'AuthController@authenticate');
   }) ;
});


Route::group(['namespace' => 'Auth'], function()
{
});