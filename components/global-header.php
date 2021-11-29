<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

$blog_name        = get_bloginfo( 'name' );
$blog_description = get_bloginfo( 'description', 'display' );
$show_title       = ( true === get_theme_mod( 'display_title_and_tagline', true ) );

?>

<header class="page-header">
	<nav id="secondary-navigation" class="secondary-nav" role="navigation">
		<?php
		wp_nav_menu(
			array(
				'menu'            => 'Secondary menu',
				'menu_class'      => 'menu-wrapper',
				'container_class' => 'secondary-menu-container',
				'items_wrap'      => '<ul id="secondary-menu-list" class="%2$s">%3$s</ul>',
			)
		);
		?>
	</nav>
	<div class="site-branding">
		<?php if ( $blog_name && $show_title ) : ?>
			<a href="/" title="<?php echo $blog_name; ?>"><h1><?php echo $blog_name; ?></h1></a>
		<?php endif; ?>

		<?php if ( $blog_description && $show_title ) : ?>
			<p class="site-description"><?php echo $blog_description; ?></p>
		<?php endif; ?>

	</div><!-- .site-branding -->

	<nav id="main-navigation" class="main-nav" role="navigation" aria-label="<?php esc_attr_e( 'Main menu' ); ?>">
		<!--div class="menu-button-container">
			<button id="main-mobile-menu" class="button" aria-controls="main-menu-list" aria-expanded="false">
				<span class="dropdown-icon open"><?php esc_html_e( 'Menu' ); ?>
					<?php //echo twenty_twenty_one_get_icon_svg( 'ui', 'menu' ); ?>
				</span>
				<span class="dropdown-icon close"><?php esc_html_e( 'Close' ); ?>
					<?php //echo twenty_twenty_one_get_icon_svg( 'ui', 'close' ); ?>
				</span>
			</button><!-- #main-mobile-menu -->
		</div--><!-- .menu-button-container -->
		<?php
		wp_nav_menu(
			array(
				'menu'            => 'Main menu',
				'menu_class'      => 'menu-wrapper',
				'container_class' => 'main-menu-container',
				'items_wrap'      => '<ul id="main-menu-list" class="%2$s">%3$s</ul>',
			)
		);
		?>
	</nav><!-- #main-navigation -->
</header>
