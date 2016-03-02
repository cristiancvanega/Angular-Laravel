<?php

Route::group(['prefix' => 'intervened', 'middleware' => 'obsan'], function(){

    Route::get('id_names', 'IntervenedController@getIdNames');

    Route::get('','IntervenedController@all');

    Route::get('{id}','IntervenedController@find');

    Route::post('','IntervenedController@create');

    Route::put('{id}','IntervenedController@update');

    Route::delete('/{id}','IntervenedController@delete');

    Route::get('intervention/{id}', 'IntervenedController@getInterventions');
});