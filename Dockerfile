# Menggunakan image resmi PHP dengan versi yang sesuai
FROM php:8.2-fpm

# Mengatur direktori kerja
WORKDIR /var/www

# Menginstal dependensi sistem
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

# Menginstal ekstensi PHP yang diperlukan
RUN docker-php-ext-install pdo pdo_mysql gd exif pcntl bcmath opcache

# Menginstal Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Menyalin file aplikasi ke dalam container
COPY . /var/www

# Mengatur izin
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage

# Menginstal dependensi PHP
RUN composer install --no-scripts --no-autoloader

# Menginstal Node.js dan npm
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Menginstal dependensi npm
RUN npm install

# Menjalankan build Vite
RUN npm run build

# Menjalankan perintah artisan untuk mengoptimalkan aplikasi
RUN php artisan optimize

# Menjalankan perintah untuk membuat symbolic link storage
RUN php artisan storage:link

# Menyalin konfigurasi Nginx
COPY ./docker/nginx/nginx.conf /etc/nginx/nginx.conf

# Mengekspos port 80
EXPOSE 80

# Menjalankan perintah supervisord
CMD ["php-fpm"]
