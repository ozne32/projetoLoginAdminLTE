FROM php:8.3-fpm
#aqui no começo eu só coloco a imagem que eu vou utilizar
#dependências que precisa para o projeto rodar
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxm12-dev \
    zip \
    unzip

#extensões do php
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets
#pegar o composer 
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
#utiliza o usuário que está em .env para rodar o composer e os comandos artisan(da tabela)
RUN useradd -G www-data, root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user 
# instala o redis
RUN pecl install -o -f redis \
    && rm -rf /tml/pear \
    && docker-php-ext-enable redis
# diretório em que o projeto vai ficar armazenado
WORKDIR /var/www

COPY docker/php/custom.ini /usr/local/etc/php/conf.d/custom.ini

USER $user