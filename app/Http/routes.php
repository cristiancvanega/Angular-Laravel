<?php


Route::get('/', function () {
    return redirect(env('obsan-web'));
});

Route::get('/obsan-web/index', function () {
    return redirect('obsan-web/index.html');
});

Route::get('/obsan-web/obsan', function () {
    return redirect('obsan-web/index_uso.html');
});

Route::get('/obsan-web/admin', function () {
    return redirect('obsan-web/index_usa.html');
});
require ('Routes/BaseRoutes.php');
