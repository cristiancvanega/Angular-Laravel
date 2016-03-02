<?php
Route::group(['prefix' => 'municipality', 'middleware' => 'admin'], function(){

    Route::get('','MunicipalityController@all');

    Route::get('{id}','MunicipalityController@find');

    Route::post('','MunicipalityController@create');

    Route::put('{id}','MunicipalityController@update');

    Route::delete('/{id}','MunicipalityController@delete');
});