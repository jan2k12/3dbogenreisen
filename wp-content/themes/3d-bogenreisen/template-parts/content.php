<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="mdl-cell mdl-cell--12-col">
        <a href=<?php the_permalink()?>><?php echo the_title()?></a>
    </div>
    <br/>
    <div class="mdl-cell mdl-cell--12-col excerpt">
        <?php if (has_post_thumbnail()) : ?>
        <?php the_post_thumbnail('postpreview') ?>
        <br/>
        <br/>
        <?php endif; ?>
        <?php  the_excerpt() ?>
        <a href="<?php echo get_permalink(); ?>"> Mehr lesen..</a>
    </div>
    <hr/>
</article><!-- #post-## -->
