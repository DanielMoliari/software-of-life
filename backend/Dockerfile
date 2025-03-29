FROM php:8.2-fpm

# Instalar extensões essenciais do PHP
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl zip

# Instalar o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Define o diretório de trabalho no container
WORKDIR /var/www/html

# Copia os arquivos da aplicação
COPY . .

# Instala as dependências do Laravel
RUN composer install --no-interaction

# Dá permissão à pasta de cache/storage
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Comando padrão para iniciar o container
CMD ["php-fpm"]
