#!/bin/sh
set -e

# Устанавливаем владельца для папок, если они существуют
if [ -d "storage" ] && [ -d "bootstrap/cache" ]; then
    chown -R www-data:www-data storage bootstrap/cache
fi

# Запускаем переданную команду (php-fpm)
exec "$@"
