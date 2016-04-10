<?php
Route::group(['prefix' => 'municipality'], function(){

    Route::group(['middleware' => 'obsan'], function(){

        Route::get('','MunicipalityController@all');

    });

    Route::group(['middleware' => 'admin'], function(){

        Route::get('{id}','MunicipalityController@find');

        Route::post('','MunicipalityController@create');

        Route::put('{id}','MunicipalityController@update');

        Route::delete('/{id}','MunicipalityController@delete');

    });
});