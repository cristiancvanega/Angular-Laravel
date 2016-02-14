<?php

Route::group(['prefix' => 'user'], function()
{
	Route::get('','UserController@all')->middleware('auth.basic');

	Route::get('{id}','UserController@find');

	Route::post('','UserController@create');

	Route::put('{id}','UserController@update');

	Route::delete('/{id}','UserController@delete');
});