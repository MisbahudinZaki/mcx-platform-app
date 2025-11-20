FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    zip unzip git curl \
    && docker-php-ext-configure gd --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Create app directory
WORKDIR /var/www

# Copy existing application
COPY . .

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Make storage and bootstrap cache writable
RUN chmod -R 775 storage bootstrap/cache

# Clear caches
RUN php artisan config:clear || true
RUN php artisan cache:clear || true
RUN php artisan route:clear || true

# Expose port for Render
EXPOSE 10000

# Run Laravel server
CMD php artisan serve --host=0.0.0.0 --port=10000