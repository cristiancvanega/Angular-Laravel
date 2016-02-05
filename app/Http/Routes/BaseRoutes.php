<?php

Route::group(['middleware' => ['jwt.auth']], function () {
 require(__DIR__ . '/AuthRoutes.php');

 Route::group(['prefix' => 'user'], function(){
  require(__DIR__ . '/UserRoutes.php');
 });

});