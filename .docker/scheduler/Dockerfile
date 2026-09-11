FROM php:8.3-cli

LABEL org.opencontainers.image.title="PredictionLA HRM Scheduler"

LABEL org.opencontainers.image.description="Laravel Scheduler container"

LABEL org.opencontainers.image.authors="PredictionLA"

LABEL org.opencontainers.image.maintainer="Rajiur Rahman"

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    cron \
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

COPY .docker/scheduler/cron /etc/cron.d/laravel-scheduler

RUN chmod 0644 /etc/cron.d/laravel-scheduler \
    && touch /var/log/cron.log \
    && chown -R www-data:www-data \
        storage \
        bootstrap/cache

CMD ["cron", "-f"]
