#!/bin/bash

SCRIPTPATH="$( cd -- "$(dirname "$0")" >/dev/null 2>&1 ; pwd -P )"
cd $SCRIPTPATH
source conf

sleep 1
#postcss ~/Github/$BASENAME-theme/style.min.css -u autoprefixer -b 'last 2 versions' --no-map -r
docker cp ~/Github/hola-theme/ $BASENAME-theme_wordpress_1:/bitnami/wordpress/wp-content/themes
docker cp ~/Github/$BASENAME-theme/ $BASENAME-theme_wordpress_1:/bitnami/wordpress/wp-content/themes