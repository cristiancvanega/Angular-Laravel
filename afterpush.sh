#! /bin/sh
composer self-update
composer update
npm update
php artisan migrate