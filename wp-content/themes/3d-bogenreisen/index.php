<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
<div class="mdl-grid">
    <div class="mdl-cell mdl-cell--12-col">
<?php if ( have_posts() ) : ?>


	<?php if ( is_home() && ! is_front_page() ) : ?>
			<h1 class="page-title screen-reader-text"><?php single_post_title(); ?> </h1>

	<?php endif; ?>


	<?php
	// Start the loop.
	while ( have_posts() ) : the_post();		/*
		 * Include the Post-Format-specific template for the content.
		 * If you want to override this in a child theme, then include a file
		 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
		 */
		get_template_part( 'template-parts/content', get_post_format() );

		// End the loop.
	endwhile;

// If no content, include the "No posts found" template.
else :
	get_template_part( 'template-parts/content', 'none' );

endif;
next_posts_link('Nächste News');
previous_posts_link('Vorherige News');
?>
    </div>
</div>
<?php get_footer(); ?>
