#!/bin/bash

wait-for-it.sh -t 0 $MYSQL_HOST:$MYSQL_PORT -- echo "database is up"

a2enmod rewrite

mysql -h $MYSQL_HOST -P $MYSQL_PORT --user=$MYSQL_USER --password=$MYSQL_PASSWORD $MYSQL_DATABASE < /wastebin.sql

apache2-foreground

exec "$@"