FROM php:7.4-apache

RUN echo "display_errors = On" >> /usr/local/etc/php/conf.d/docker-php-errors.ini
RUN echo "display_startup_errors = On" >> /usr/local/etc/php/conf.d/docker-php-errors.ini
RUN echo "error_reporting = E_ALL" >> /usr/local/etc/php/conf.d/docker-php-errors.ini

COPY src/ /var/www/html/
RUN chown -R www-data:www-data /var/www/html