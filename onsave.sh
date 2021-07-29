#!/bin/bash

sleep 1
docker cp ~/Github/hola-theme dummy-theme_wordpress_1:/bitnami/wordpress/wp-content/themes
docker cp ~/Github/dummy-theme dummy-theme_wordpress_1:/bitnami/wordpress/wp-content/themes