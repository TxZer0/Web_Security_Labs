FROM php:7.2-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql

WORKDIR /var/www/html/

COPY ./src .
COPY ./src/httpd.conf /etc/apache2/sites-available/000-default.conf