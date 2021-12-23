FROM php:7.2-apache

RUN apt-get update
RUN docker-php-ext-install \
        pdo \
        pdo_mysql

EXPOSE 80
# Run the command on container startup
CMD apache2-foreground

