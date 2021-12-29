FROM composer:2.1.9 as build
WORKDIR /app
COPY . /app

RUN composer update

FROM php:7.4-apache

RUN docker-php-ext-install pdo pdo_mysql

#install some base extensions
RUN apt-get update && \
     apt-get install -y \
         libzip-dev \
    && pecl install mongodb \
    && cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini \
    && echo "extension=mongodb.so" >> /usr/local/etc/php/php.ini \
    && docker-php-ext-install zip

EXPOSE 8080
COPY --from=build /app /var/www/
COPY .docker/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY .env.example /var/www/.env
COPY composer.lock /var/www/composer.lock

RUN chmod 777 -R /var/www/storage/ && \
    echo "Listen 8080" >> /etc/apache2/ports.conf && \
    chown -R www-data:www-data /var/www/ && \
    a2enmod rewrite \
