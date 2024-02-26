#!/bin/bash

php artisan migrate:refresh
php artisan db:seed
php artisan optimize
