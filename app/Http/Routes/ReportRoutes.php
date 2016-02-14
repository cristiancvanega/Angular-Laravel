<?php

Route::group(['prefix' => 'report', 'middleware' => 'obsan'], function(){

    Route::get('intervention', 'InterventionController@getData');

    Route::get('evaluation', 'EvaluationController@getReportData');
});

Route::group(['prefix' => 'report/custom_report', 'middleware' => 'admin'], function(){

    Route::post('intervened', 'IntervenedController@getCustomReport');

    Route::post('evaluation', 'EvaluationController@getCustomReport');

    Route::post('intervention', 'InterventionController@getCustomReport');
});
