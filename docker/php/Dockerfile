FROM php:8.1-fpm

RUN apt-get update && apt-get install -y bash curl git unzip libicu-dev

RUN pecl install xdebug

RUN docker-php-ext-install pdo_mysql \
  && docker-php-ext-enable xdebug

RUN groupmod -o -g 1000 www-data && \
    usermod -o -u 1000 -g www-data www-data

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN chown -R www-data:www-data /var/www/

WORKDIR /var/www
