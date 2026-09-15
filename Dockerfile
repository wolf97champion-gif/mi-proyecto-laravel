FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip nginx

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . .

RUN composer install --no-dev --optimize-autoloader
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Configurar Nginx para apuntar a la carpeta public de Laravel
RUN echo "server { \
    listen 80; \
    root /var/www/html/public; \
    index index.php index.html; \
    location / { \
        try_files \$uri \$uri/ /index.php?\$query_string; \
    } \
    location ~ \.php\$ { \
        include fastcgi_params; \
        fastcgi_pass 127.0.0.1:9000; \
        fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name; \
    } \
}" > /etc/nginx/sites-available/default

EXPOSE 80
CMD service nginx start && php-fpm