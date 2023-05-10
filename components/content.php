<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<?php ppr_post_thumbnail(); ?>

		<?php if ( is_singular() && in_the_loop() ) : ?>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php else : ?>
			<?php ppr_sticky(); ?>
			<?php ppr_categories(); ?>
			<?php ppr_posted_on(); ?>
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<?php endif; ?>

		<?php // twenty_twenty_one_post_thumbnail(); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php	the_content(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php ppr_entry_meta_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
