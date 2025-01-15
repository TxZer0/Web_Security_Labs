FROM php:7.2-apache

RUN apt-get update && apt-get install -y unzip zip git
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer require "twig/twig:^3.0.0"

WORKDIR /var/www/html

COPY ./src /var/www/html

RUN composer install --no-interaction --optimize-autoloader

RUN echo "Flag: {LAB-Template-001}" >> /etc/passwd
