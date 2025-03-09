FROM php:8.3-cli
WORKDIR /app
COPY . .
RUN docker-php-ext-install pdo pdo_mysql
CMD php -S 0.0.0.0:8000 -t public
