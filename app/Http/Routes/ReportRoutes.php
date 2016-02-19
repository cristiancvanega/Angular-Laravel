<?php

Route::group(['prefix' => 'report'], function(){

    Route::group(['prefix' => 'custom_report/download'], function(){

        Route::get('intervened', 'IntervenedController@downloadCustomReport');

    });

    Route::group([], function(){

        Route::get('intervention', 'InterventionController@getData');

        Route::get('evaluation', 'EvaluationController@getReportData');

        Route::get('intervened', 'IntervenedController@all');

    });

    Route::group(['prefix' => 'custom_report', 'middleware' => 'admin'], function(){

        Route::post('evaluation', 'EvaluationController@getCustomReport');

        Route::group(['prefix' => 'intervened'], function(){

            Route::post('', 'IntervenedController@getCustomReport');

        });

        Route::post('intervention', 'InterventionController@getCustomReport');

    });
});
