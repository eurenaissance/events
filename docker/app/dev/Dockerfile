FROM ubuntu:16.04

ENV LANG="en_US.UTF-8" \
    LC_ALL="en_US.UTF-8" \
    LANGUAGE="en_US.UTF-8" \
    TERM="xterm" \
    DEBIAN_FRONTEND="noninteractive" \
    SYMFONY_ALLOW_APPDEV=1 \
    NODE_VERSION=6.9.4 \
    COMPOSER_ALLOW_SUPERUSER=1

EXPOSE 80
WORKDIR /app

RUN apt-get update -q && \
    apt-get install -qy software-properties-common language-pack-en-base && \
    export LC_ALL=en_US.UTF-8 && \
    export LANG=en_US.UTF-8 && \
    add-apt-repository ppa:ondrej/php && \
    apt-get update -q && \
    apt-get install --no-install-recommends -qy \
        make \
        ca-certificates \
        cron \
        curl \
        nano \
        vim \
        nginx \
        git \
        graphviz \
        postgresql-client \
        php7.1 \
        php7.1-bcmath \
        php7.1-common \
        php7.1-curl \
        php7.1-dom \
        php7.1-fpm \
        php7.1-gd \
        php7.1-iconv \
        php7.1-intl \
        php7.1-json \
        php7.1-mbstring \
        php7.1-mcrypt \
        php7.1-pgsql \
        php7.1-pdo \
        php7.1-phar \
        php7.1-sqlite \
        php7.1-xdebug \
        php7.1-xml \
        php7.1-zip \
        php-apcu \
        php-uuid \
        supervisor \
        tzdata \
        wget && \
    cp /usr/share/zoneinfo/Europe/Paris /etc/localtime && echo "Europe/Paris" > /etc/timezone && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    mkdir /run/php


# Clean-up apt files
RUN apt-get autoremove -qy --purge curl wget \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* \
    # Dialout GID is 20 and it's the default UID/GID on MacOS
    && groupmod -g 80 dialout

COPY php.ini /etc/php/7.1/cli/conf.d/50-setting.ini
COPY pool.conf /etc/php/7.1/fpm/pool.d/www.conf
COPY nginx.conf /etc/nginx/nginx.conf
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY entrypoint.sh /usr/local/bin/entrypoint.sh

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
CMD ["supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
