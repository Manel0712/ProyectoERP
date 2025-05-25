FROM php:8.2-apache

RUN a2enmod rewrite
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf

RUN apt-get update && apt-get install -y \
    git zip unzip curl gnupg libzip-dev libpq-dev ca-certificates \
    && docker-php-ext-install pdo pdo_pgsql zip

# Instalar Node.js 18 correctamente en pasos separados
RUN curl -fsSL https://deb.nodesource.com/setup_18.x -o nodesource.sh
RUN bash nodesource.sh
RUN apt-get install -y nodejs

RUN node -v && npm -v

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . /var/www/html

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

WORKDIR /var/www/html

RUN npm install
RUN npm run build