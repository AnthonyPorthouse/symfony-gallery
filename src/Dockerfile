FROM php:fpm-alpine as base
WORKDIR /app
RUN docker-php-ext-install opcache pdo_mysql \
    && apk add --no-cache $PHPIZE_DEPS \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && apk del $PHPIZE_DEPS
RUN apk add --no-cache icu icu-dev \
    && docker-php-ext-install intl

FROM base as build
COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY ./composer.json ./composer.lock ./
RUN composer install

FROM base
VOLUME ["/app/var", "/app/vendor"]
COPY ./ /app
COPY --from=build /app/vendor ./vendor
