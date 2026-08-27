FROM php:8.3-fpm

LABEL org.opencontainers.image.title="PredictionLA HRM"
LABEL org.opencontainers.image.description="Dockerized Laravel HRM Application"
LABEL org.opencontainers.image.authors="PredictionLA"
LABEL org.opencontainers.image.maintainer="Rajiur Rahman"
LABEL org.opencontainers.image.vendor="PredictionLA"

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    zip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd \
        --with-freetype \
        --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        pdo_mysql \
        mbstring \
        bcmath \
        zip \
        exif \
        pcntl \
        gd \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY composer.json composer.lock ./

RUN composer install \
    --no-dev \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader \
    --no-scripts

COPY . .

RUN composer dump-autoload \
    --optimize \
    --no-dev

COPY .docker/php/local.ini /usr/local/etc/php/conf.d/local.ini

RUN chown -R www-data:www-data \
    storage \
    bootstrap/cache

USER www-data

EXPOSE 9000

CMD ["php-fpm"]
