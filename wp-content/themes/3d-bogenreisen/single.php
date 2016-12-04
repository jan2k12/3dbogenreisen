<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
<div class="mdl-grid">
    <div class="mdl-cell mdl-cell--12-col">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the single post content template.
			get_template_part( 'template-parts/content', 'single' );
			// End of the loop.


		endwhile;

		?>
    </div>
</div>
<?php get_footer(); ?>
