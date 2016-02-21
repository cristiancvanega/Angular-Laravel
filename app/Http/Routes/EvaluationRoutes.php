<?php

Route::group(['prefix' => 'evaluation', 'middleware' => 'obsan'], function(){

    Route::get('user_intervention', 'EvaluationController@getFieldsCustomReport');

    Route::get('with_iu', 'EvaluationController@getWithInterventionAndUser');

    Route::get('','EvaluationController@all');

    Route::get('{id}','EvaluationController@find');

    Route::post('','EvaluationController@create');

    Route::put('{id}','EvaluationController@update');

    Route::delete('/{id}','EvaluationController@delete');

});