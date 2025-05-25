# Etapa 1: Node.js
FROM node:18 AS node-builder

WORKDIR /app

COPY package*.json ./

RUN npm install

COPY . .

RUN npm run build

# Etapa 2: PHP + Apache
FROM php:8.2-apache

RUN a2enmod rewrite

RUN apt-get update && apt-get install -y zip unzip git libzip-dev libpq-dev libonig-dev libicu-dev libxml2-dev \
    && docker-php-ext-install zip pdo pdo_mysql pdo_pgsql mbstring intl xml opcache \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf

COPY --from=node-builder /app/public/build /var/www/html/public/build

COPY . /var/www/html

WORKDIR /var/www/html

RUN composer install --no-dev --optimize-autoloader

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80

CMD ["apache2-foreground"]