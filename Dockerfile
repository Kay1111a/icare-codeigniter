FROM node:24-bookworm-slim AS frontend
WORKDIR /build
COPY package*.json ./
RUN npm ci
COPY vite.config.js index.html ./
COPY resources ./resources
COPY frontend ./frontend
RUN npm run build

FROM php:8.3-apache
RUN apt-get update && apt-get install -y --no-install-recommends \
    libicu-dev libonig-dev libzip-dev libpng-dev libjpeg62-turbo-dev libfreetype6-dev libxml2-dev libsqlite3-dev unzip git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install intl mbstring pdo_mysql mysqli pdo_sqlite sqlite3 gd zip dom xml \
    && a2enmod rewrite headers \
    && rm -rf /var/lib/apt/lists/*
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
WORKDIR /var/www/html
COPY . .
RUN composer install --no-dev --prefer-dist --optimize-autoloader --no-interaction
COPY --from=frontend /build/public/build ./public/build
COPY deploy/apache.conf /etc/apache2/sites-available/000-default.conf
COPY deploy/php.ini /usr/local/etc/php/conf.d/icare.ini
RUN mkdir -p writable/cache writable/logs writable/session storage/app/public storage/framework/views storage/framework/cache/data \
    && chown -R www-data:www-data writable storage \
    && printf 'ServerTokens Prod\nServerSignature Off\n' > /etc/apache2/conf-available/icare.conf \
    && a2enconf icare
EXPOSE 80
# Run migrations explicitly against a backed-up database before starting service.
CMD ["apache2-foreground"]
