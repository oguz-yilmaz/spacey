FROM php:8.1.1-apache

RUN apt-get update && apt-get install -y ca-certificates gnupg
RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash -

RUN apt-get update && apt-get upgrade -y && apt-get install -y git nodejs

WORKDIR /app/www/html

RUN php -r "readfile('https://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

RUN node --version

EXPOSE 8000

COPY . .

RUN composer install && npm install && npm run dev

CMD ["php","artisan", "serve"]

# docker build -t test-app .
# docker run -ti --network host test-app
