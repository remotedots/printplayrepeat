<?php


/**
 * remove the product result count on the shop (products) page
 */
function printplayrepeat_remove_product_result_count() {
		remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );
		remove_action( 'woocommerce_after_shop_loop' , 'woocommerce_result_count', 20 );
}
add_action( 'after_setup_theme', 'printplayrepeat_remove_product_result_count', 99 );


/**
 * woocommerce will use the commerce.php template for rendering
 *  - shop page
 *  - single product
 */
function printplayrepeat_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
  // add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'printplayrepeat_add_woocommerce_support' );


/**
 * tell woocommerce to not use the default woocommerce.css
 */
add_filter( 'woocommerce_enqueue_styles', '__return_false' );


/**
 * remove the woof product filter styling. at the moment plugin NOT IN USE
 */
function printplayrepeat_dequeue_plugin_style() {
  wp_dequeue_style( 'frontend.filters' );
  wp_deregister_style( 'frontend.filters' );
}
//add_action( 'wp_enqueue_scripts', 'printplayrepeat_dequeue_plugin_style', 9999 );


/**
 * enqueue the printplayrepeat theme styles
 */
function printplayrepeat_enqueue_style() {
	wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css', false, '1.0', 'all');
	wp_enqueue_style( 'commerce', get_template_directory_uri() . '/css/commerce.css', false, '1.0', 'all');
}
add_action( 'wp_enqueue_scripts', 'printplayrepeat_enqueue_style' );
