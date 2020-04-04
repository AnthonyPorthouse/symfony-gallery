FROM php:fpm-alpine

RUN docker-php-ext-install opcache pdo_mysql \
    && apk add --no-cache $PHPIZE_DEPS \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && apk del $PHPIZE_DEPS

RUN apk add --no-cache icu icu-dev \
    && docker-php-ext-install intl
