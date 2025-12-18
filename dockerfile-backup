FROM php:7.4-apache

# Aktifkan mod_rewrite + install mysqli
RUN a2enmod rewrite && \
    docker-php-ext-install mysqli pdo_mysql

# Copy semua file project CI3 ke webroot
COPY app/ /var/www/html/

# Set permission supaya Apache bisa tulis cache/session/upload
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

# Port default Apache
EXPOSE 80

# Jalankan Apache
CMD ["apache2-foreground"]