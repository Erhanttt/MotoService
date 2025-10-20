# Përdor imazhin zyrtar të PHP me Apache
FROM php:8.2-apache

# Installo extensions që Laravel i nevojiten
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpq-dev libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd

# Enable Apache mod_rewrite
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

# Installo dependencat e projektit
RUN composer install --no-dev --optimize-autoloader

# Kopjo dhe bëj publik storage link
RUN php artisan storage:link || true

# Gjenero APP_KEY nëse mungon
RUN php artisan key:generate || true

# Pastro cache që Laravel të lexojë APP_KEY nga ambienti
RUN php artisan config:clear

# Vendos lejet për storage dhe cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Configure Apache për Laravel
RUN echo "<Directory /var/www/html/public>\n\
    AllowOverride All\n\
</Directory>" >> /etc/apache2/apache2.conf

# ✅ Migrimi automatik gjatë nisjes së aplikacionit
CMD php artisan migrate --force && apache2-foreground

EXPOSE 80
