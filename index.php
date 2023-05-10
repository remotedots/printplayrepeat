<?php get_header(); ?>

<?php if ( is_home() ) : ?>
	<?php // woocommerce_content(); ?>
<?php endif; ?>

<?php if ( is_home() && ! is_front_page() && ! empty( single_post_title( '', false ) ) ) : ?>
	<h1 class="page-title"><?php single_post_title(); ?></h1>
<?php endif; ?>

<?php
	if ( have_posts() ) {

		if ( !is_single() ) : ?>
			<section class="posts-container">
			<?php if ( is_archive() )
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
				<div class="posts">

		<?php	endif;

		while ( have_posts() ) {
			the_post();
			get_template_part( 'components/content' );
		}

		if ( !is_single() ) : ?>
				</div>
			</section>
		<?php endif;

		if ( is_single() )
			get_related_posts();

		// Previous/next page navigation.
		// twenty_twenty_one_the_posts_navigation();

	} else {

		// If no content, include the "No posts found" template.
		get_template_part( 'template-parts/content/content-none' );

	}
?>

</div>

<?php get_footer(); ?>
