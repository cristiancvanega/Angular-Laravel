<?php
Route::post('create_user','userController@create');
Route::put('update_user','userController@update');
Route::delete('delete_user','userController@delete')
Route::get('search_user/{id}','userController@search');