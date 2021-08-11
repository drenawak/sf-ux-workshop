FROM php:8.0.6-apache
MAINTAINER Occitech <contact@occitech.fr>

RUN apt-get update \
   && apt-get install -y \
    locales \
    apt-utils \
    git \
    libicu-dev \
    g++ \
    libpng-dev \
    libxml2-dev \
    libzip-dev \
    libonig-dev \
    libxslt-dev

RUN apt-get update \
  && apt-get install -y npm

#Get and move composer to binary folder
RUN curl -sSk https://getcomposer.org/installer | php -- --disable-tls && \
   mv composer.phar /usr/local/bin/composer

#Generate ubuntu locales for compatibility with french
RUN echo "en_US.UTF-8 UTF-8" > /etc/locale.gen && \
    echo "fr_FR.UTF-8 UTF-8" >> /etc/locale.gen && \
    locale-gen

#Install php packages
RUN docker-php-ext-configure intl
RUN docker-php-ext-install pdo pdo_mysql gd opcache intl zip calendar dom mbstring zip gd xsl
RUN pecl install apcu && docker-php-ext-enable apcu

RUN a2enmod rewrite
#Set workdir
WORKDIR /var/www/