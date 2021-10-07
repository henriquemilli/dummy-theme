#!/bin/bash

SCRIPTPATH="$( cd -- "$(dirname "$0")" >/dev/null 2>&1 ; pwd -P )"
cd $SCRIPTPATH
source conf
date=$(date -d now +%F)

#creates backup
docker exec -u 0 $BASENAME-theme_mariadb_1 mysqldump -u root bitnami_wordpress > $BASENAME-$date.sql
docker cp $BASENAME-theme_wordpress_1:/bitnami/wordpress/wp-content/ .
zip $BASENAME-$date.zip $BASENAME-$date.sql wp-content/ -r
rm $BASENAME-$date.sql
rm wp-content/ -rf