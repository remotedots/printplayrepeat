<?php

if ( ! function_exists( 'ppr_post_thumbnail' ) ) {
	function ppr_post_thumbnail() {
		if ( is_singular() && in_the_loop() ) : ?>
			<figure class="post-thumbnail">
				<?php
				// Lazy-loading attributes should be skipped for thumbnails since they are immediately in the viewport.
				the_post_thumbnail( 'post-thumbnail', array( 'loading' => false ) );
				?>
				<?php if ( wp_get_attachment_caption( get_post_thumbnail_id() ) ) : ?>
					<figcaption class="wp-caption-text"><?php echo wp_kses_post( wp_get_attachment_caption( get_post_thumbnail_id() ) ); ?></figcaption>
				<?php endif; ?>
			</figure><!-- .post-thumbnail -->
		<?php else : ?>
			<figure class="post-thumbnail">
				<a class="post-thumbnail-inner alignwide" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
					<?php the_post_thumbnail( 'thumbnail' ); ?>
				</a>
				<?php if ( wp_get_attachment_caption( get_post_thumbnail_id() ) ) : ?>
					<figcaption class="wp-caption-text"><?php echo wp_kses_post( wp_get_attachment_caption( get_post_thumbnail_id() ) ); ?></figcaption>
				<?php endif; ?>
			</figure>
		<?php endif;
	}
}

if ( ! function_exists( 'ppr_categories' ) ) {
	function ppr_categories() {
		$categories = get_the_category();
		if (!$categories) return; ?>
		<ul class="post-categories">
			<?php foreach ( $categories as $category ) : ?>
				<li class="category">
					<?php echo $category->name; ?>
				</li>
			<?php endforeach; ?>
		</ul>
		<?php
	}
}

if ( ! function_exists( 'ppr_sticky' ) ) {
	function ppr_sticky() {
		if ( is_sticky() ) {
			echo '<p class="post-sticky">' . esc_html_x( 'Featured post', 'Label for sticky posts', 'twentytwentyone' ) . '</p>';
		}
	}
}

if ( ! function_exists( 'ppr_entry_meta_footer' ) ) {
	function ppr_entry_meta_footer() {
		// Early exit if not a post.
		if ( 'post' !== get_post_type() ) {
			return;
		}

		// Hide meta information on pages.
		if ( is_singular() && in_the_loop() ) {
			echo '<div class="posted-by">';
			// Posted on.
			ppr_posted_on();
			// Edit post link.
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post. Only visible to screen readers. */
					esc_html__( 'Edit %s', 'printplayrepeat' ),
					'<span class="screen-reader-text">' . get_the_title() . '</span>'
				),
				'<span class="edit-link">',
				'</span>'
			);
			echo '</div>';

			if ( has_category() || has_tag() ) {

				echo '<div class="post-taxonomies">';

				/* translators: Used between list items, there is a space after the comma. */
				$categories_list = get_the_category_list( __( ', ', 'printplayrepeat' ) );
				if ( $categories_list ) {
					printf(
						/* translators: %s: List of categories. */
						'<span class="cat-links">' . esc_html__( 'Categorized as %s', 'printplayrepeat' ) . ' </span>',
						$categories_list // phpcs:ignore WordPress.Security.EscapeOutput
					);
				}

				/* translators: Used between list items, there is a space after the comma. */
				$tags_list = get_the_tag_list( '', __( ', ', 'printplayrepeat' ) );
				if ( $tags_list ) {
					printf(
						/* translators: %s: List of tags. */
						'<span class="tags-links">' . esc_html__( 'Tagged %s', 'printplayrepeat' ) . '</span>',
						$tags_list // phpcs:ignore WordPress.Security.EscapeOutput
					);
				}
				echo '</div>';
			}

		} else {

			$post_format = get_post_format();
			if ( 'aside' === $post_format || 'status' === $post_format ) {
				echo '<p><a href="' . esc_url( get_permalink() ) . '">' . twenty_twenty_one_continue_reading_text() . '</a></p>'; // phpcs:ignore WordPress.Security.EscapeOutput
			}

			// Edit post link.
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post. Only visible to screen readers. */
					esc_html__( 'Edit %s', 'twentytwentyone' ),
					'<span class="screen-reader-text">' . get_the_title() . '</span>'
				),
				'<span class="edit-link">',
				'</span><br>'
			);

			if ( has_category() || has_tag() ) {

				echo '<div class="post-taxonomies">';

				/* translators: Used between list items, there is a space after the comma. */
				/*
				$categories_list = get_the_category_list( __( ', ', 'twentytwentyone' ) );
				if ( $categories_list ) {
					printf(
						// translators: %s: List of categories.
						'<span class="cat-links">' . esc_html__( 'Categorized as %s', 'twentytwentyone' ) . ' </span>',
						$categories_list // phpcs:ignore WordPress.Security.EscapeOutput
					);
				}
				*/

				/* translators: Used between list items, there is a space after the comma. */
				$tags_list = get_the_tag_list( "<ul class='post-tags'><li class='tag'>", "</li><li class='tag'>", "</li></ul>" );
				if ( $tags_list ) {
					echo $tags_list;
				}
				echo '</div>';
			}
		}
	}
}

if ( ! function_exists( 'ppr_posted_on' ) ) {
	function ppr_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() )
		);
		echo '<span class="posted-on">';
		printf(
			/* translators: %s: Publish date. */
			esc_html__( '%s', 'printplayrepeat' ),
			$time_string // phpcs:ignore WordPress.Security.EscapeOutput
		);
		echo '</span>';
	}
}

?>