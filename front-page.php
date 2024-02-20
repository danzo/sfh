<?php
/**
 * Template Name: Front Page
 * Description: Page template full width.
 *
 */

echo do_shortcode('[wpv-post-body view_template="front-page-hero-ct"]');


get_header();

the_post();
?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'content' ); ?>>



	<h1 class="entry-title"><?php the_title(); ?></h1>
	
</div><!-- /#post-<?php the_ID(); ?> -->
<?php
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}

get_footer();
