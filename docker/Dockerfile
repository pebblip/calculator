FROM php:7.4-apache

ARG PROJECT
ENV PROJECT_ROOT /opt/calculator
ENV APACHE_DOCUMENT_ROOT ${PROJECT_ROOT}/public

WORKDIR ${PROJECT_ROOT}

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY ${PROJECT} ${PROJECT_ROOT}

RUN curl -sL https://deb.nodesource.com/setup_13.x | bash - && \
apt-get install -y nodejs

