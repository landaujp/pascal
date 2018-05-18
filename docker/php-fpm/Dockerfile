FROM php:7.1-fpm

ADD php.ini /usr/local/etc/php/conf.d/php.ini
ADD entrypoint.sh /opt/entrypoint.sh
RUN chmod a+x /opt/entrypoint.sh

RUN apt-get update
RUN apt-get install -y mysql-client git
RUN git clone https://github.com/phpredis/phpredis.git /usr/src/php/ext/redis
RUN docker-php-ext-install pdo_mysql mysqli mbstring redis
