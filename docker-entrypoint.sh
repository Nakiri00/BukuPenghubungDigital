#!/bin/bash

# Clear cache saat container start
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear || true

# Jalankan Apache
exec apache2-foreground
