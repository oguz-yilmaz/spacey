FROM  bitnami/laravel:9

RUN php -r "readfile('https://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer \
    && curl -sLS https://deb.nodesource.com/setup_$NODE_VERSION.x | bash -

RUN apt-get install -y nodejs \
    && npm install -g npm

EXPOSE 8000

COPY . .

RUN php composer install && npm install && npm run dev

ENTRYPOINT ["php artisan serve"]
