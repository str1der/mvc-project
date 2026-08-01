FROM php:8.4-fpm

RUN apt-get update \
   && apt-get install -y --no-install-recommends \
       git \
       zip \
       unzip \
       curl \
       libpq-dev \
       libzip-dev \
       libicu-dev
    && docker-php-ext-install \
       pdo \
       pdo_pgsql \
       intl \
       zip
    && rm -rf /var/lib/apt/list/*

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

WORKDIR /var/wwww/html
