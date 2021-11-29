<footer class="page-footer">
	<div class="content-wrapper">
		<div class="site-branding">
			<a href="/"><h1><?php echo get_bloginfo( 'name' ); ?></h1></a>
		</div><!-- .site-branding -->
		<?php
			wp_nav_menu( array(
				'menu' => 'Main menu'
			));
			wp_nav_menu( array(
				'menu' => 'Footer menu'
			));
		?>
	</div>
</footer>
