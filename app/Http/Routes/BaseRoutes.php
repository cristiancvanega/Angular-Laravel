<?php

Route::group(['middleware' => ['jwt.auth']], function () {
 require(__DIR__.'/AuthRoutes.php');

 require(__DIR__.'/UserRoutes.php');    

});