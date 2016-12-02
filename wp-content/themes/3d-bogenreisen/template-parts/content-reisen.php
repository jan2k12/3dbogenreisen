<?php
/**
 * Created by PhpStorm.
 * User: jan
 * Date: 26.11.16
 * Time: 18:52
 */ ?>

<div class="mdl-grid">
    <div class="mdl-cell mdl-cell--12-col">
        <h2>
			<?php
			    the_title();
			?>
        </h2>
    </div>
</div>
<div class="mdl-grid">
    <div class="mdl-cell mdl-cell--12-col">
        <?php
            the_content();
        ?>
    </div>
</div>