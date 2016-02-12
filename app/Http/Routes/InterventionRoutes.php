<?php

Route::group(['prefix' => 'intervention'], function(){

    Route::get('/','InterventionController@all');

    Route::get('/{id}','InterventionController@find');

    Route::post('/','InterventionController@create');

    Route::put('/','InterventionController@update');

    Route::delete('/{id}','InterventionController@delete');

    Route::get('intervened/{id}', 'InterventionController@getIntervened');

    Route::get('evaluation/{id}', 'InterventionController@getEvaluation');
});