<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php bloginfo('title') ?></title>
	<?php wp_head(); ?>
</head>

<body>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'twentytwentyone' ); ?></a>

	<?php get_template_part( 'components/global-header' ); ?>

	<div id="content" class="site-content">
		<main id="main" class="site-main" role="main">
