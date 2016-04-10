<?php
Route::group(['prefix' => 'user'], function(){

	Route::group(['middleware' => 'obsan'], function(){

		Route::get('','UserController@all');

	});

	Route::group(['middleware' => 'admin'], function()
	{
		Route::get('{id}','UserController@find');

		Route::post('','UserController@create');

		Route::put('{id}','UserController@update');

		Route::delete('/{id}','UserController@delete');

	});

});
