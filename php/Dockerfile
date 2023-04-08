# Pull alpine image
FROM php:8.1.5-fpm-alpine3.15

# Install more PHP core extension and necessary modules
RUN apk add --no-cache \
    bzip2-dev \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    libwebp-dev \
    libxpm-dev \
    libxml2-dev \
    libzip-dev \
    libstdc++ \
    nodejs \
    npm \
    beanstalkd \
    bash \
    git \
    tzdata \
    linux-headers \
    && apk add --no-cache --virtual .build-deps gcc make g++ autoconf re2c file wget

# Install gRPC && protobuf
# RUN apk add grpc protobuf \
#     && pecl install grpc \
#     && pecl install protobuf

# Install PHP dependencies and modules
RUN docker-php-ext-install \
    bz2 \
    mysqli \
    opcache \
    zip \
    pdo_mysql
    # && docker-php-ext-enable \
    # grpc \
    # protobuf

# Install composer using source
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer \
    && composer global require "laravel/installer"

# Update npm && install components
RUN npm install -g npm \
    && npm install -g sass 

# Remove dependencies
RUN apk del .build-deps

# Copy the build script and souce code into docker
COPY www.conf /usr/local/etc/php-fpm.d/www.conf
COPY open.sh /open.sh

# Make script runnable
RUN chmod +x /open.sh

# DosTounix Delete ^M
RUN dos2unix /open.sh

# Make docker run forever
CMD ["/bin/sh","/open.sh"]
