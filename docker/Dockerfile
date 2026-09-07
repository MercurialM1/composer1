FROM php:8.4-fpm-alpine

# Устанавливаем зависимости
RUN apk add --no-cache \
    git \
    unzip \
    libzip-dev \
    postgresql-dev \
    && docker-php-ext-install pdo pdo_pgsql zip

# Устанавливаем Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Создаём entrypoint-скрипт для прав
COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

WORKDIR /var/www/html

# Запускаем entrypoint, затем PHP-FPM
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
CMD ["php-fpm"]
