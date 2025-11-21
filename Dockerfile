FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    zip unzip git curl libpq-dev libonig-dev libzip-dev \
    && docker-php-ext-install pdo pdo_pgsql mbstring zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www

# Copy project files
COPY . .

# Laravel vendor install
RUN composer install --no-dev --optimize-autoloader

# Ensure storage directories exist
RUN mkdir -p storage/framework/{sessions,views,cache} \
    && mkdir -p storage/logs \
    && chown -R www-data:www-data storage bootstrap/cache

EXPOSE 8000

CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000
