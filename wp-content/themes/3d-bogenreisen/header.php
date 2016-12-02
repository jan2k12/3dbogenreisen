<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header has-drawer mdl-layout--no-desktop-drawer-button">
    <header class="mdl-layout__header">
        <div class="mdl-layout__drawer-button">
            <i class="material-icons">menu</i>
        </div>
        <div class="mdl-layout__header-row">
            <span class="mdl-layout-title">3d Bogen Reisen</span>
        </div>
        <div class="mdl-layout__header-row mdl-layout--large-screen-only">
            <div class="mdl-layout-spacer"></div>
            <nav class="mdl-navigation">
				<?php
				$menuItems = wp_get_nav_menu_items( 'Mainmenue' );
				foreach ( $menuItems as $item ) {
					echo "<a href=" . $item->url . " class='mdl-navigation__link'>" . $item->title . "</a>";
				}

				?>
            </nav>
        </div>
    </header>
    <div class="mdl-layout__drawer mdl-layout--small-screen-only">
        <span class="mdl-layout-title">
            Title
        </span>
        <nav class="mdl-navigation">
	        <?php
	        $menuItems = wp_get_nav_menu_items( 'Mainmenue' );
	        foreach ( $menuItems as $item ) {
		        echo "<a href=" . $item->url . " class='mdl-navigation__link'>" . $item->title . "</a>";
	        }

	        ?>
        </nav>
    </div>
<main class="mdl-layout__content">


