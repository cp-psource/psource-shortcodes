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

<ul class="su-posts su-posts-list-loop">
<?php
// Posts are found
if ( $posts->have_posts() ) {
	while ( $posts->have_posts() ) {
		$posts->the_post();
		global $post;
?>
<li id="su-post-<?php the_ID(); ?>" class="su-post"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
<?php
	}
}
// Posts not found
else {
?>
<li><?php _e( 'Beiträge nicht gefunden', 'upfront-shortcodes' ) ?></li>
<?php
}
?>
</ul>
