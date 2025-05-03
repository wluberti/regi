FROM php:8-fpm

ENV TZ=Europe/Amsterdam \
    DEBIAN_FRONTEND=noninteractive \
    COMPOSER_ALLOW_SUPERUSER=1

# Install system dependencies and PHP extensions
RUN apt-get update -y && apt-get dist-upgrade -y \
    && apt-get install -y \
        git \
        unzip \
        wget \
        curl \
        sqlite3 \
        libsqlite3-dev \
        libsodium-dev \
    && docker-php-ext-install \
        pdo_mysql \
        pdo_sqlite \
        sodium \
    && apt-get autoremove -y \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /code
