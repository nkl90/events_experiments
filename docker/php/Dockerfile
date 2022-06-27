FROM php:8.1-fpm-buster
RUN apt update && apt install -y \
      git \
      unzip \
      zlib1g-dev \
      libpng-dev \
      libzip-dev \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install -j$(nproc) zip \
    && docker-php-ext-install -j$(nproc) pcntl \
    && pecl install xdebug-3.1.4 \
    && docker-php-ext-enable xdebug

COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

RUN EXPECTED_SIGNATURE=$(curl https://composer.github.io/installer.sig) \
    && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && ACTUAL_SIGNATURE=$(php -r "echo hash_file('SHA384', 'composer-setup.php');") \
    && if [ "$EXPECTED_SIGNATURE" != "$ACTUAL_SIGNATURE" ]; \
    then \
        >&2 echo 'ERROR: Invalid installer signature' \
        && rm -f composer-setup.php \
        && exit 1; \
    fi \
    && php composer-setup.php --quiet \
    && RESULT=$? \
    && rm composer-setup.php \
    && mv composer.phar /usr/local/bin/composer \
    && exit $RESULT

RUN apt-get update && \
    apt-get install -y libpq-dev && \
    docker-php-ext-install pdo pdo_pgsql pgsql

