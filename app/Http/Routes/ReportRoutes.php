<?php

Route::group(['prefix' => 'report'], function(){

    Route::group(['prefix' => 'custom_report/download', 'middleware' => 'obsan'], function(){

        Route::post('intervened', 'IntervenedController@downloadCustomReport');

        Route::post('evaluation', 'EvaluationController@downloadCustomReport');

        Route::post('intervention', 'InterventionController@downloadCustomReport');

    });

    Route::group(['middleware' => 'obsan'], function(){

        Route::get('intervention', 'InterventionController@getData');

        Route::post('intervention/download', 'InterventionController@downloadReport');

        Route::get('evaluation', 'EvaluationController@getReportData');

        Route::get('intervened', 'IntervenedController@all');

        Route::post('intervened/download', 'IntervenedController@downloadReport');

        Route::post('evaluation/download', 'EvaluationController@downloadReport');

    });

    Route::group(['prefix' => 'custom_report', 'middleware' => 'admin'], function(){

        Route::post('evaluation', 'EvaluationController@getCustomReport');

        Route::group(['prefix' => 'intervened'], function(){

            Route::post('', 'IntervenedController@getCustomReport');

        });

        Route::post('intervention', 'InterventionController@getCustomReport');

    });
});
