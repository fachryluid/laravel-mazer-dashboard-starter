#!/bin/bash

php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan storage:link
php artisan optimize
