FROM node:18 as nodebuild

WORKDIR /app

COPY package*.json ./
RUN npm install

COPY . .
RUN chmod -R +x node_modules/.bin
RUN npm run build

FROM php:8.2-apache

RUN a2enmod rewrite
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf

RUN apt-get update && apt-get install -y \
    git zip unzip libzip-dev libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql zip

COPY --from=nodebuild /app /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

WORKDIR /var/www/html