FROM ghcr.io/railwayapp/nixpacks:ubuntu-1707782610@sha256:8f4b0fd95dc3311cf9a59f236d8d7d7f956fe21a2a1d64b53c82f12c4e859f09

# Instalar las dependencias necesarias
RUN apt-get update && apt-get install -y \
    unzip \
    zip \
    curl

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app/

COPY . /app/
RUN composer install && npm install --production && \
    php artisan optimize && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache && \
    php artisan migrate --force

CMD ["php", "artisan", "serve"]