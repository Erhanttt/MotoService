# Përdor imazhin zyrtar të PHP me Apache
FROM php:8.2-apache

# Installo extensions që Laravel i nevojiten
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpq-dev libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd

# Aktivizo Apache mod_rewrite
RUN a2enmod rewrite

# Kopjo skedat e projektit në container
COPY . /var/www/html

# Vendos working directory
WORKDIR /var/www/html

# Vendos Apache DocumentRoot tek public/
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Ndrysho default configuration që Apache të përdorë public/
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Installo Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Installo dependencat e Laravel
RUN composer install --no-dev --optimize-autoloader

# Krijo symbolic link për storage (nëse dështojnë komandat, mos e ndal procesin)
RUN php artisan storage:link || true

# Gjenero APP_KEY nëse mungon
RUN php artisan key:generate || true

# Vendos lejet për storage dhe cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Konfiguro Apache që të lejojë .htaccess në public/
RUN echo "<Directory /var/www/html/public>\n\
    AllowOverride All\n\
</Directory>" >> /etc/apache2/apache2.conf

# Ekspozo portin 80 (default për HTTP)
EXPOSE 80

# Nis Apache
CMD ["apache2-foreground"]
