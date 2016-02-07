<?php

Route::group(['prefix' => 'user'], function()
{
	Route::get('/{id}','UserController@find');
	
	Route::post('/','UserController@create');

	Route::put('/{email}','UserController@update');

	Route::delete('/{email}','UserController@delete');
});
