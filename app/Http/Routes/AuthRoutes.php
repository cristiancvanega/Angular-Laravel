<?php

Route::any('/tes_middleware', 'AuthenticateController@testMiddleware');
Route::group(['prefix' => 'auth'], function(){
   Route::group(['prefix' => 'token'], function(){
       Route::get('refresh', 'AuthenticateController@testMiddleware')->middleware('jwt.refresh');
   }) ;
});