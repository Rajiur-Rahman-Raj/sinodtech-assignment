#!/bin/sh

php-fpm -D

exec supervisord -n -c /etc/supervisor/supervisord.conf
