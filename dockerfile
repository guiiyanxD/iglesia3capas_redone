# Usa la imagen base de PHP con Apache
FROM php:8.1-apache

# 1. Instala dependencias del sistema y extensiones de PHP
RUN apt-get update && \
    apt-get install -y \
    libzip-dev \
    zip \
    && rm -rf /var/lib/apt/lists/*

# 2. Instala extensiones de PHP
RUN docker-php-ext-install pdo pdo_mysql mysqli zip

# 3. Habilita módulos esenciales de Apache
RUN a2enmod rewrite headers

# 4. Configura el VirtualHost de Apache
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

# 5. Asegura los permisos correctos
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

# (Opcional) 6. Configuración para Laravel u otros frameworks
# RUN pecl install redis && docker-php-ext-enable redis