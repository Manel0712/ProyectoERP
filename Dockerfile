FROM php:8.2-apache

RUN a2enmod rewrite

RUN apt-get update && apt-get install -y libzip-dev zip unzip git curl libpq-dev \
    && docker-php-ext-install zip pdo pdo_mysql pgsql pdo_pgsql

RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf

COPY . /var/www/html

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache