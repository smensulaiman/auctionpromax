# Use the official Apache image as base
FROM php:8.2-fpm

RUN apt update && apt install curl wget -y

# Install PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy your Apache configuration files
COPY ./apache/auctionpromax-default.conf /etc/apache2/sites-available/000-default.conf
