<?php

//Route::group(['middleware' => ['jwt.auth']], function ()
Route::group([], function ()
{
	require(__DIR__ . '/AuthRoutes.php');

	require(__DIR__ . '/UserRoutes.php');
});