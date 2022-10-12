FROM php:8.0-apache

ADD ./default.conf /etc/apache2/sites-available/000-default.conf
ADD ./apache2.conf /etc/apache2/apache2.conf

RUN apt-get update \
    && apt-get install -y libmemcached-dev zlib1g-dev libpq-dev libicu-dev\
    && pecl install memcached \
    && docker-php-ext-enable memcached \
    && docker-php-ext-install pdo_mysql

RUN apt-get -y update \
&& docker-php-ext-configure intl \
&& docker-php-ext-install intl

RUN apt-get install -y  libjpeg-dev libpng-dev libfreetype6-dev \
    && docker-php-ext-configure gd --with-jpeg --with-freetype \
    && docker-php-ext-install -j$(nproc) gd

RUN apt-get update \
    && apt-get install -y nano

# Use php.ini for production of php docker base.
# It change config short_open_tag to Off for use xml tag.
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# For setting short open tag for php ready for kind of <? ?> tag
# RUN sed -i "s/short_open_tag = Off/short_open_tag = On/" "$PHP_INI_DIR/php.ini"
