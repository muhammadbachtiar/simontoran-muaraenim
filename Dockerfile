FROM php:7.4-apache

# Copy aplikasi ke dalam image
COPY ./app /var/www/html

# Aktifkan mod_rewrite + install mysqli
RUN a2enmod rewrite && \
    docker-php-ext-install mysqli && \
    chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

# Set timezone
ENV TZ=Asia/Jakarta

WORKDIR /var/www/html

# Port default Apache
EXPOSE 80

# Jalankan Apache
CMD ["apache2-foreground"]