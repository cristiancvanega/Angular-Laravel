<?php
Route::group(['prefix' => 'municipality', 'middleware' => 'obsan'], function(){

    Route::get('','MunicipalityController@all');

    Route::get('{id}','MunicipalityController@find');

    Route::post('','MunicipalityController@create');

    Route::put('{id}','MunicipalityController@update');

    Route::delete('/{id}','MunicipalityController@delete');
});