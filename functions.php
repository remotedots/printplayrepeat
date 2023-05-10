<?php

// Custom template tags for the theme.
require get_template_directory() . '/inc/utils.php';
require get_template_directory() . '/inc/commerce.php';




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
}
add_action( 'wp_enqueue_scripts', 'printplayrepeat_enqueue_style' );


/**
 * get related posts based on the posts' tags
 */
function get_related_posts() {
	global $post;

	$orig_post = $post;
	$tags      = wp_get_post_tags( $post->ID );

	if ( $tags ) :
		$tag_ids = array();

		foreach ( $tags as $individual_tag ) {
			$tag_ids[] = $individual_tag->term_id;
		}

		$args = array(
			'tag__in'          => $tag_ids,
			'post__not_in'     => array( $post->ID ),
			'posts_per_page'   => 4,
			'caller_get_posts' => 1
		);

		$my_query = new wp_query( $args );

		if ( $my_query->have_posts() ) : ?>
			<section class="related-posts posts-container">
				<h2>Related Posts</h2>
				<div class="posts">

				<?php
					while ( $my_query->have_posts() ) {
						$my_query->the_post();

						get_template_part( 'components/content' );
					}
				?>
				</div>
			</section>
		<?php endif;
	endif;
	$post = $orig_post;
	wp_reset_query();
}


/**
 * Filter the "read more" excerpt string link to the post.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function printplayrepeat_excerpt_more( $more ) {
	$more = sprintf( '<a class="read-more" href="%1$s">%2$s</a>',
            get_permalink( get_the_ID() ),
            __( 'Read More', 'printplayrepeat' )
        );
	return $more;
}
add_filter( 'excerpt_more', 'printplayrepeat_excerpt_more' );
