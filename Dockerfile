# Use the official PHP Apache image as the base image
FROM php:8.3-apache

# Set working directory inside the container
WORKDIR /var/www/html

# Copy custom PHP config
COPY php.ini /usr/local/etc/php/conf.d/custom.ini

# For production (no live reload + immutable image) also need to remove volume
# COPY public/ /var/www/html/

# Update Ubuntu, Install required PHP extensions and Enable necessary Apache rewrite module
RUN apt-get update \
    && docker-php-ext-install pdo pdo_mysql \
    && a2enmod rewrite