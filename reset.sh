#!/bin/bash

php artisan migrate:fresh
php artisan db:seed
php artisan optimize
