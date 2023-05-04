<footer class="page-footer">
	<div class="content-wrapper">
		<div class="site-branding">
			<a href="/"><?php echo get_bloginfo( 'name' ); ?></a>
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
