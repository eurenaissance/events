#!/bin/bash
set -e

# Change www-data's uid & guid to be the same as directory in host or the configured one
usermod -u $(stat -c %u /app) www-data
groupmod -g $(stat -c %g /app) www-data

if [[ "$1" = 'supervisord' || "$1" = '/usr/sbin/nginx' || "$1" = '/usr/sbin/php-fpm7.1' ]]; then
    exec "$@"
fi

su www-data -s /bin/bash -c "PATH=\"$PATH\" $*"
