<?php

//Route::group(['middleware' => ['jwt.auth']], function ()
Route::group([], function ()
{
	require(__DIR__ . '/AuthRoutes.php');

	require(__DIR__ . '/UserRoutes.php');

	require(__DIR__ . '/InterventionRoutes.php');

	require(__DIR__ . '/IntervenedRoutes.php');

	require(__DIR__ . '/MunicipalityRoutes.php');
});