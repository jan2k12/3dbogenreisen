<div class="mdl-cell mdl-cell--5-col-desktop mdl-cell--8-col-tablet mdl-cell--12-col-phone">
    <div class="mdl-card mdl-shadow--2dp">
        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text"><?php echo $reisePost->post_title; ?></h2>
        </div>
        <div class="mdl-card__media">
            <img src="<?php echo $reisePostThumbUrl ?>" border="0" alt="">
        </div>
        <div class="mdl-card__supporting-text">
			<?php echo substr( strip_shortcodes($reisePost->post_excerpt), 0, 175 ); ?>...
        </div>
        <div class="mdl-card__actions mdl-card--border" style="text-align: center;">

            <a href="<?php get_permalink( the_permalink($reisePost)); ?>" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                Zur Reise
            </a>
        </div>
    </div>
</div>