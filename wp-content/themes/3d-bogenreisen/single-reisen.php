<?php
/**
 * Created by PhpStorm.
 * User: jan
 * Date: 26.11.16
 * Time: 18:26
 */?>
<?php
get_header(); ?>

<?php

	while(have_posts()) : the_post();
		get_template_part('template-parts/content','reisen');
	endwhile;
?>
<?php
    get_footer();
?>

