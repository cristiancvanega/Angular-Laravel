#! /bin/sh
composer self-update
composer update
php artisan migrate