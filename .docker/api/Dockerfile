FROM php:7.2-apache

WORKDIR /app

COPY php.ini /usr/local/etc/php/php.ini

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin/ --filename=composer

RUN apt-get update && \
    apt-get install -y \
    mysql-client

RUN docker-php-ext-install \
    pdo_mysql

ENV APP_ENV=dev
ENV COMPOSER_ALLOW_SUPERUSER=1

RUN composer --global config process-timeout 2000
RUN composer global require hirak/prestissimo

# configure Apache
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
RUN rm -r /var/www/html && ln -s /app /var/www/html
