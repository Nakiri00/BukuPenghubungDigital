FROM php:8.2-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev unzip git zlib1g-dev libonig-dev && \
    docker-php-ext-configure zip && \
    docker-php-ext-install pdo_mysql zip bcmath mbstring exif

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy Composer binary
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy project files
COPY . .

RUN php -v && composer --version && composer check-platform-reqs

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --verbose --ignore-platform-reqs

# Set permissions
RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 80

CMD ["apache2-foreground"]
