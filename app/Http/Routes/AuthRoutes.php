<?php
Route::group(['prefix' => 'auth'], function(){

    Route::post('get_user', 'AuthenticateController@getAuthenticatedUser');

    Route::group(['prefix' => 'token'], function(){

       Route::post('', 'AuthenticateController@authenticate');

       Route::post('refresh', 'AuthenticateController@success')->middleware('jwt.refresh');

        Route::group(['namespace' => 'Auth'], function(){

            Route::post('auth', 'AuthController@authenticate');

        });
   }) ;
});