FROM php:8.1-fpm

# USER root

RUN apt-get update && apt-get install -y  \
    libfreetype6-dev \
    libjpeg-dev \
    libpng-dev \
    libwebp-dev \
    git \
    unzip \
    curl \
    # nodejs \
    # npm \
    --no-install-recommends \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql -j$(nproc) gd

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
