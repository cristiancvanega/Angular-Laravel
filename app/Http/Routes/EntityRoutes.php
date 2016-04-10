<?php

Route::group(['prefix' => 'entity'], function(){

    Route::group(['middleware' => 'obsan'], function() {

        Route::get('', 'EntityController@all');

    });

    Route::group(['middleware' => 'admin'], function(){

        Route::get('{id}','EntityController@find');

        Route::post('','EntityController@create');

        Route::put('{id}','EntityController@update');

        Route::delete('/{id}','EntityController@delete');

    });

});