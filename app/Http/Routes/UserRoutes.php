<?php

Route::group(['prefix' => 'user', 'middleware' => 'admin'], function()
{
	Route::get('','UserController@all');

	Route::get('{id}','UserController@find');

	Route::post('','UserController@create');

	Route::put('{id}','UserController@update');

	Route::delete('/{id}','UserController@delete');
});