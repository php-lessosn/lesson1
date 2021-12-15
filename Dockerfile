FROM php:7.4.14-apache

# UID & GUID are user_id and group_id of system user (project files owner)
ARG UID
ARG GUID
RUN usermod -u $UID www-data
RUN groupmod -g $GUID www-data

RUN apt-get update \
    && apt-get install -y \
        zip \
        libzip-dev \
        libicu-dev \
        libpng-dev \
        libjpeg62-turbo-dev \
        g++

RUN docker-php-ext-configure intl \
    && docker-php-ext-configure gd --with-jpeg \
    && docker-php-ext-install \
        gd \
        intl \
        pdo \
        pdo_mysql \
        zip

COPY ./docker/default.conf /etc/apache2/sites-enabled/000-default.conf
COPY ./docker/php.ini /usr/local/etc/php/php.ini
RUN a2enmod rewrite

EXPOSE 80

# Run the command on container startup
CMD apache2-foreground

