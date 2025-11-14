# Imagen base de PHP con Apache
FROM php:8.3-apache

# Instala extensiones necesarias para Laravel
RUN apt-get update && apt-get install -y \
    git zip unzip libzip-dev libpng-dev libjpeg-dev libfreetype6-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring gd zip bcmath

# Habilitar mod_rewrite
RUN a2enmod rewrite

# Instalar Composer globalmente
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Definir el directorio de trabajo
WORKDIR /var/www/html

COPY . .

# Exponer el puerto del servidor Apache
EXPOSE 80
