#!/usr/bin/env bash
cp ./.env.example ./.env
touch ./database/database.sqlite
touch ./storage/logs/laravel.log
chmod 777 ./database/database.sqlite
chmod -R 777 ./storage/
chmod -R 777 bootstrap/cache/
composer install
php artisan key:generate
composer update
npm install