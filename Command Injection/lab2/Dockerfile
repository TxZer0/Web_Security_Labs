FROM php:7.2-apache

RUN apt-get update && apt-get install dnsutils -y
RUN docker-php-ext-install mysqli pdo pdo_mysql

WORKDIR /var/www/html/

COPY ./src .

RUN echo "Flag: {LAB-OS_Command-002}" >> /etc/passwd