FROM php:8.2-apache

# Update dan install dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev unzip git && \
    docker-php-ext-configure zip && \
    docker-php-ext-install pdo_mysql zip bcmath mbstring exif

# Aktifkan mod_rewrite Apache
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy Composer dari image resmi
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy semua file Laravel
COPY . .

# Install dependencies Laravel
RUN composer install --no-dev --optimize-autoloader --verbose

# Set permission untuk storage & cache
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose port 80
EXPOSE 80

CMD ["apache2-foreground"]
