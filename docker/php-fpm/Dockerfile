FROM php:7.1-fpm

ADD php.ini /usr/local/etc/php/conf.d/php.ini
ADD entrypoint.sh /opt/entrypoint.sh
RUN chmod a+x /opt/entrypoint.sh

RUN set -x \
  && apt-get update \
  && apt-get upgrade -y --no-install-recommends \
  && apt-get install -y mysql-client git \
  && git clone https://github.com/phpredis/phpredis.git /usr/src/php/ext/redis \
  && docker-php-ext-install pdo_mysql mysqli mbstring redis
