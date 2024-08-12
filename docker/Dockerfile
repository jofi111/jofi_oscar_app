FROM php:8.1-apache
WORKDIR /var/www/html
RUN docker-php-ext-install mysqli
COPY src/ /var/www/html/
EXPOSE 80
