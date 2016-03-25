<?php

Route::group(['prefix' => 'intervention', 'middleware' => 'obsan'], function(){

    Route::get('fields_custom_report', 'InterventionController@getFieldsCustomReport');

    Route::get('with_em', 'InterventionController@getWithEntitiesAndMunicipalities');

    Route::get('','InterventionController@all');

    Route::get('{id}','InterventionController@find');

    Route::post('','InterventionController@create');

    Route::put('{id}','InterventionController@update');

    Route::delete('/{id}','InterventionController@delete');

    Route::get('intervened/{id}', 'InterventionController@getIntervened');

    Route::get('evaluation/{id}', 'InterventionController@getEvaluation');

    Route::post('add_intervened', 'InterventionController@addIntervened');
});
