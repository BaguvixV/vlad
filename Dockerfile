# --------------------------------------------------------------
# Base Image
# --------------------------------------------------------------
# Use the official PHP Apache image as the base.
# This image comes with PHP pre-installed and Apache configured.
FROM php:8.3-apache

# --------------------------------------------------------------
# Working Directory
# --------------------------------------------------------------
# Set the working directory inside the container.
# All subsequent commands (COPY, RUN, etc.) will use this as the default path.
WORKDIR /var/www/html

# --------------------------------------------------------------
# PHP Configuration
# --------------------------------------------------------------
# Copy your custom PHP configuration file into the container.
# Files in /usr/local/etc/php/conf.d/ are automatically loaded by PHP.
COPY config/php.ini /usr/local/etc/php/conf.d/custom.ini

# --------------------------------------------------------------
# Apache Configuration
# --------------------------------------------------------------
# Copy a custom Apache configuration that allows .htaccess overrides
# This enables URL rewriting and directory-specific configurations.
COPY config/apache-app.conf /etc/apache2/conf-available/app.conf

# --------------------------------------------------------------
# Install PHP Extensions and Enable Apache Modules
# --------------------------------------------------------------
# Update package lists, install PDO and PDO MySQL extensions.
# Enable the Apache mod_rewrite module for clean URLs.
RUN apt-get update \
    && docker-php-ext-install pdo pdo_mysql \
    && a2enmod rewrite

# --------------------------------------------------------------
# Set Permissions for Apache
# --------------------------------------------------------------
# Ensure the Apache user (www-data) owns the web directory
# and set proper read/execute permissions. Then enable the custom Apache config.
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && a2enconf app