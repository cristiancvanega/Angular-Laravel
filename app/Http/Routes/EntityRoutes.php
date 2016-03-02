<?php

Route::group(['prefix' => 'entity', 'middleware' => 'admin'], function(){

    Route::get('','EntityController@all');

    Route::get('{id}','EntityController@find');

    Route::post('','EntityController@create');

    Route::put('{id}','EntityController@update');

    Route::delete('/{id}','EntityController@delete');
});