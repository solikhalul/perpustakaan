
# Tahap 1: Build frontend
FROM node:22-alpine AS frontend

WORKDIR /app

COPY package*.json ./
RUN npm install

COPY . .
RUN npm run build


# Tahap 2: Menjalankan Laravel
FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    git \
    && docker-php-ext-install pdo_mysql mbstring bcmath exif pcntl zip \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Salin project Laravel
COPY . .

# Salin hasil build Vite
COPY --from=frontend /app/public/build ./public/build

# Install dependency Laravel
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

# Arahkan Apache ke folder public Laravel
RUN sed -ri 's!/var/www/html!/var/www/html/public!g' \
    /etc/apache2/sites-available/000-default.conf

RUN printf '<Directory /var/www/html/public>\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>\n' >> /etc/apache2/apache2.conf

# Izin folder Laravel
RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 80
