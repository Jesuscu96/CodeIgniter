FROM php:8.3-apache

# 1. Instalar dependencias del sistema
# HEMOS AÑADIDO: libpng-dev, libjpeg62-turbo-dev, libfreetype6-dev (Necesarias para GD)
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libonig-dev \
    libzip-dev \
    libsodium-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    unzip \
    git \
    && rm -r /var/lib/apt/lists/*

# 2. Configurar la extensión GD
# Esto le dice a PHP dónde encontrar las librerías de imágenes que acabamos de instalar
RUN docker-php-ext-configure gd --with-freetype --with-jpeg

# 3. Instalar las extensiones de PHP
RUN docker-php-ext-install \
    mysqli \
    pdo \
    pdo_mysql \
    intl \
    mbstring \
    sodium \
    zip \
    gd

# 4. Habilitar mod_rewrite
RUN a2enmod rewrite

# 5. Copiar configuración de Apache (asegúrate de que el archivo vhost.conf existe en la misma carpeta)
COPY vhost.conf /etc/apache2/sites-available/000-default.conf

# 6. Directorio de trabajo y permisos
WORKDIR /var/www/html
RUN chown -R www-data:www-data /var/www/html