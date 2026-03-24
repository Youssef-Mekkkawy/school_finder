FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy all project files (including your CSS/JS in /public)
COPY . .

# Fix for "exit code 1": Ignore platform requirements
RUN composer install --no-interaction --optimize-autoloader --no-dev --ignore-platform-reqs

# Set permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
RUN chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Expose port and start
EXPOSE 8000
CMD php artisan migrate:fresh --seed --force && php artisan config:cache && php artisan route:cache && php artisan serve --host 0.0.0.0 --port $PORT
