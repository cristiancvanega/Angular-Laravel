<?php


Route::get('/', function () {
    return redirect(env('obsan-web'));
});
require ('Routes/BaseRoutes.php');
