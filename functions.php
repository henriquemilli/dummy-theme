<?php
/**
 * Implements custom updater
 */
require 'updater/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/PixdataOrg/dummy-theme',
	__FILE__,
	'dummy-theme'
);
$myUpdateChecker->setBranch('master');
$myUpdateChecker->setAuthentication('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');

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 100 );
function child_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.min.css',
        array( 'elementor-frontend' ),
        wp_get_theme()->get('Version') // must have version in style header
    );
}

/**
 * Permit SVG files upload
 */
function add_file_types_to_uploads ( $file_types ) {
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg';

	$file_types = array_merge( $file_types, $new_filetypes );

	return $file_types;
}
add_filter( 'upload_mimes', 'add_file_types_to_uploads' );
