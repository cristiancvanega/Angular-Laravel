<?php

Route::group(['prefix' => 'report'], function(){

    Route::get('intervention', 'InterventionController@getData');

    Route::get('evaluation', 'EvaluationController@getReportData');
});