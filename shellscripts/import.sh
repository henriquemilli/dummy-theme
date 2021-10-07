#!/bin/bash

SCRIPTPATH="$( cd -- "$(dirname "$0")" >/dev/null 2>&1 ; pwd -P )"
cd $SCRIPTPATH
source conf

#imports backup
unzip *.zip
sed -i 's/^(http|https)\:\/\/.*\.(com|io|it|net)$/http\:\/\/localhost/g' *.sql
docker exec -u 0 $BASENAME-theme_mariadb_1 mysqldump -u root bitnami_wordpress < *.sql
docker cp wp-content $BASENAME-theme_wordpress_1:/bitnami/wordpress/wp-content/
rm *.sql
rm wp-content/ -rf