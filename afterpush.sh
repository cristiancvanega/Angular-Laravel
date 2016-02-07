#! /bin/sh
cd /home/cristiancvanega/obsan
sudo chown cristiancvanega:cristiancvanega -R ../obsan
composer self-update
composer update
php artisan migrate:refresh
php artisan db:seed
sudo chown www-data:www-data -R ../obsan