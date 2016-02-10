<?php

Route::group(['prefix' => 'report'], function(){
    Route::get('intervention', 'InterventionController@getData');
});