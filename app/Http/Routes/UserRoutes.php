<?php

Route::group(['prefix' => 'user'], function()
{
	Route::get('/{email}','UserController@show');
	
	Route::post('/','UserController@create');

	Route::put('/{email}','UserController@update');

	Route::delete('/{email}','UserController@delete');
});