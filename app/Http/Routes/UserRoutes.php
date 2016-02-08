<?php

Route::group(['prefix' => 'user'], function()
{
	Route::get('/','UserController@all');

	Route::get('/{id}','UserController@find');

	Route::post('/','UserController@create');

	Route::put('/','UserController@update');

	Route::delete('/{id}','UserController@delete');
});
