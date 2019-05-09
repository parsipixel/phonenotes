FROM php:7.3-fpm

RUN apt-get update && apt-get install -y libmcrypt-dev \
    mysql-client libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
    && pecl install xdebug-2.7.2 \
    && docker-php-ext-enable imagick xdebug \
    && docker-php-ext-install pdo_mysql
