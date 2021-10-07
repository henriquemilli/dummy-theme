<?php

/**
 * Displays reviews 
 */
add_shortcode( 'dummy_product_reviews', 'product_reviews_shortcode' );
function product_reviews_shortcode() {

    require( __DIR__ . '/customProductReviews/customProductReviews.php');
    return $heading . $html;
}


/**
 * Display the comment form via shortcode on singular pages
 */

add_shortcode( 'dummy_comment_form', 'product_reviews_form_shortcode');
function product_reviews_form_shortcode() {

    return comments_template( 'woocommerce/single-product-reviews.php' );
}


/**
 * Outputs a registration/login form
 */
add_shortcode( 'dummy_registration', 'dummy_registration_func' );
function dummy_registration_func() {
    if( is_user_logged_in(  ) ) {
        return;
    }
    require( __DIR__ . '/registerAndLoginForm/registerAndLoginForm.php');
}