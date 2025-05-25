FROM php:8.2-apache

RUN a2enmod rewrite

RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git curl gnupg nodejs npm libpq-dev libonig-dev libicu-dev libxml2-dev \
    && docker-php-ext-install zip pdo pdo_mysql pdo_pgsql mbstring intl xml opcache \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && npm install -g npm@latest

RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf

COPY . /var/www/html

RUN composer install --no-dev --optimize-autoloader

RUN npm install && npm run build

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80

CMD ["apache2-foreground"]