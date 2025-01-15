FROM php:7.2-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql

WORKDIR /var/www/html/

COPY ./src .

RUN echo "Flag: {LAB-Deserialize-002}" >> /etc/passwd