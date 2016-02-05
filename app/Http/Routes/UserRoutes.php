<?php
Route::post('create','UserController@create');
Route::put('update','UserController@update');
Route::delete('delete','UserController@delete');
Route::get('search/{id}','UserController@show');