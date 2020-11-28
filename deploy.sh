#!/bin/sh
# activate maintenance mode
php artisan down
# update source code
find . -name "*.gz" -type f -delete
git checkout deploy
git fetch origin deploy
git reset --hard origin/deploy
git pull
# update PHP dependencies
php -d memory_limit=-1 -d allow_url_fopen=on /opt/cpanel/composer/bin/composer install
# --no-interaction Do not ask any interactive question
# --no-dev  Disables installation of require-dev packages.
# --prefer-dist  Forces installation from package dist even for dev versions.
# update database
php artisan migrate --force
#Update config & cache
php artisan config:cache
# --force  Required to run when in production.
# stop maintenance mode
php artisan up
