# Use the official Apache image as base
FROM php:8.2-apache

# Install essentials
RUN apt update && apt install -y \
    sudo \
    nano \
    micro \
    neofetch \
    htop \
    curl \
    wget \
    fish \
    git \
    zip \
    unzip \
    libicu-dev

# Install Node JS
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash \
    && apt-get install nodejs -y

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Configure PHP extension
RUN docker-php-ext-configure intl

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql intl

# Install and Enable Xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Copy xdebugger configuration
Copy ./xdebug.ini "${PHP_INI_DIR}/conf.d"

# Expose Port
EXPOSE 80

# Add localhost as default server name
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Copy Apache configuration files
Copy ./apache/auctionpromax-default.conf /etc/apache2/sites-available/000-default.conf

# Enable Apache Modules
RUN a2enmod rewrite && service apache2 restart

# Start Apache
CMD ["apachectl", "-D", "FOREGROUND"]