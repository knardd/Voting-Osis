# STAGE 1: Build Asset React dengan Node.js
FROM node:24-alpine AS frontend-builder
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build

# STAGE 2: Setup Environment PHP-FPM
FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    zip unzip git curl libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy source code Laravel
COPY . /var/www/html

# Copy hasil build React dari STAGE 1 ke folder public/build
COPY --from=frontend-builder /app/public/build /var/www/html/public/build

COPY docker/php/init.sh /usr/local/bin/init.sh
RUN chmod +x /usr/local/bin/init.sh

ENTRYPOINT ["/usr/local/bin/init.sh"]
CMD ["php-fpm"]