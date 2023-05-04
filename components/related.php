<!--div class="relatedthumb">
	<a rel="nofollow" target="_blank" href="<? the_permalink()?>"><?php the_post_thumbnail(array(150,100)); ?><br />
	<?php the_title(); ?>
	</a>
</div-->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<?php ppr_post_thumbnail(); ?>

		<?php if ( is_singular() ) : ?>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php else : ?>
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<?php endif; ?>

		<?php // twenty_twenty_one_post_thumbnail(); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php	the_excerpt(); ?>
	</div><!-- .entry-content -->

	<!--footer class="entry-footer">
		<?php ppr_entry_meta_footer(); ?>
	</footer--><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
