<?php

Route::group(['prefix' => 'intervened'], function(){

    Route::get('','IntervenedController@all');

    Route::get('{id}','IntervenedController@find');

    Route::post('','IntervenedController@create');

    Route::put('{id}','IntervenedController@update');

    Route::delete('/{id}','IntervenedController@delete');

    Route::get('intervention/{id}', 'IntervenedController@getInterventions');
});