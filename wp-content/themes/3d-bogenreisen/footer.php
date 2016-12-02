<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
</main>
<footer class="mdl-mini-footer">
    <div class="mdl-mini-footer__left-section">
            <div class="mdl-logo">
                More Information
            </div>
            <ul class="mdl-mini-footer__link-list">
            <?php
                $menuItems=wp_get_nav_menu_items('footerLeft');
                foreach ($menuItems as $item){
                    echo "<li><a href=".$item->url.">".$item->title."</a></li>";
                }
            ?>
            </ul>

    </div>
</footer>

<?php wp_footer(); ?>
</div>
</body>
</html>
