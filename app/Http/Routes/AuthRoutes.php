<?php
Route::group(['prefix' => 'auth'], function(){
   Route::group(['prefix' => 'token'], function(){
       Route::post('', 'AuthenticateController@authenticate');

       Route::get('refresh', 'AuthenticateController@testMiddleware')->middleware('jwt.refresh');
   }) ;
});