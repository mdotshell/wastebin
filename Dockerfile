FROM php:7.4.4-apache-buster

WORKDIR /

ADD app/ /var/www/html

RUN apt update && apt install mariadb-client -y

RUN docker-php-ext-install mysqli

COPY docker-entrypoint.sh /usr/local/bin/

COPY wastebin.sql /

RUN chmod 777 /usr/local/bin/docker-entrypoint.sh && ln -s /usr/local/bin/docker-entrypoint.sh /

COPY wait-for-it.sh /usr/local/bin/

RUN chmod 777 /usr/local/bin/wait-for-it.sh && ln -s /usr/local/bin/wait-for-it.sh /

EXPOSE 80

ENTRYPOINT docker-entrypoint.sh
