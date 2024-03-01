# Use the official debian image
FROM debian:latest

# Install Apache2
RUN apt-get update && \
    apt-get install -y apache2 apache2-utils libapache2-mod-php && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Expose Port
EXPOSE 80

# Enable Apache Modules
RUN a2enmod rewrite

# Copy Apache configuration files
Copy auctionpromax-default.conf /etc/apache2/sites-available/000-default.conf

# Start Apache
CMD ["apachectl", "-D", "FOREGROUND"]