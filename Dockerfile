FROM php:8.2.0fpm-alpine

RUN docker-php-ext-install pdo pdo_mysql
