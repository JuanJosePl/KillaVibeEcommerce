FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git curl libpng-dev libjpeg-dev libfreetype6-dev \
    libonig-dev libxml2-dev libzip-dev zip unzip

RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        pdo pdo_mysql mbstring exif pcntl bcmath \
        gd intl zip calendar tokenizer xml

RUN pecl install redis && docker-php-ext-enable redis

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install --optimize-autoloader --no-scripts --no-interaction \
    --ignore-platform-req=ext-gd --ignore-platform-req=ext-exif

RUN npm install

RUN npm run build

EXPOSE $PORT

CMD php artisan serve --host=0.0.0.0 --port=$PORT
