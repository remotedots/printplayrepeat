<?php

/**
 * tells woocommerce to use the woocommerce.php template for rendering
 *  - shop page
 *  - single product
 */
function ppr_add_woocommerce_support() {
  add_theme_support( 'woocommerce' );
  add_theme_support( 'wc-product-gallery-zoom' );
  // add_theme_support( 'wc-product-gallery-lightbox' );
  add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'ppr_add_woocommerce_support' );

/**
 * removes the product result count on the shop (products) page
 */
function ppr_remove_product_result_count() {
		remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );
		remove_action( 'woocommerce_after_shop_loop' , 'woocommerce_result_count', 20 );
}
add_action( 'after_setup_theme', 'ppr_remove_product_result_count', 99 );

/**
 * removes sorting dropdown from woocommerce
 */
function ppr_remove_filtering() {
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
}
add_action( 'init', 'ppr_remove_filtering' );

/**
 * tells woocommerce not to use the default woocommerce.css
 */
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

/**
 * shows the description of the page on the shop page
 */
function ppr_show_excerpt_shop_page() {
  global $post;
  ?>
  <div class="short-description">
    <?php the_excerpt(); ?>
  </div>
  <?php
}
add_action( 'woocommerce_after_shop_loop_item_title', 'ppr_show_excerpt_shop_page', 5 );

?>