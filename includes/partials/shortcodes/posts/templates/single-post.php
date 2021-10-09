<?php defined( 'ABSPATH' ) || exit; ?>

<?php
/**
 * READ BEFORE EDITING!
 *
 * Do not edit templates in the plugin folder, since all your changes will be
 * lost after the plugin update. Read the following article to learn how to
 * change this template or create a custom one:
 *
 * https://n3rds.work/docs/upfront-shortcodes-beitraege/
 */
?>

<div class="su-posts su-posts-single-post">
	<?php
		// Prepare marker to show only one post
		$first = true;
		// Posts are found
		if ( $posts->have_posts() ) {
			while ( $posts->have_posts() ) :
				$posts->the_post();
				global $post;

				// Show oly first post
				if ( $first ) {
					$first = false;
					?>
					<div id="su-post-<?php the_ID(); ?>" class="su-post">
						<h1 class="su-post-title"><?php the_title(); ?></h1>
						<div class="su-post-meta"><?php _e( 'Posted', 'upfront-shortcodes' ); ?>: <?php the_time( get_option( 'date_format' ) ); ?>
						<?php if ( have_comments() || comments_open() ) : ?>
							 | <a href="<?php comments_link(); ?>" class="su-post-comments-link"><?php comments_number( __( '0 Kommentare', 'upfront-shortcodes' ), __( '1 Kommentar', 'upfront-shortcodes' ), __( '%n Kommentare', 'upfront-shortcodes' ) ); ?></a>
						<?php endif; ?>
						</div>
						<div class="su-post-content">
							<?php the_content(); ?>
						</div>
					</div>
					<?php
				}
			endwhile;
		}
		// Posts not found
		else {
			echo '<h4>' . __( 'Beiträge nicht gefunden', 'upfront-shortcodes' ) . '</h4>';
		}
	?>
</div>
