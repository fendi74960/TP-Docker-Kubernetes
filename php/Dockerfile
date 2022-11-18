# Install a apache server for PHP 7
FROM php:7.1-apache-buster
RUN cp "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

# update and upgrade apt-get, and also install pdo_mysql for php 
RUN apt-get update && apt-get upgrade -y
RUN docker-php-ext-install pdo_mysql

# Copy the content of userlist_php to /var/www/html
#  (where the php file should be in the server)
COPY userlist_php  /var/www/html