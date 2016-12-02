<?php
/**
 * Created by PhpStorm.
 * User: jan
 * Date: 24.11.16
 * Time: 20:03
 */

if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'bogenreisen_setup' ) ) :
	function bogenreisen_setup() {
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
	 * Enable support for custom logo.
	 *
	 *
	 */
		add_theme_support( 'custom-logo',
			array(
				'height' => 240,
				'width' => 240,
				'flex-height' => true,
			) );


		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1200, 9999 );

		add_image_size('cardImage',330,168,true);
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'status',
			'audio',
			'chat',
		) );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'maintop' => __( 'Top Menü', 'bogenreisen' ),
			'footerleft'=>__('Footer Links','bogenreisen')
		) );
		// Indicate widget sidebars can use selective refresh in the Customizer.
		add_theme_support( 'customize-selective-refresh-widgets' );

	}
endif;
add_action( 'after_setup_theme', 'bogenreisen_setup' );


if(! function_exists('create_post_type')):
	function create_post_type(){
	register_post_type('reisen',array(
		'labels'=>getCPTLabels(),
		'label'=>'Reise',
		'description'=>'Bogen Reisen',
		'supports' => array('title',
							'editor',
							'author',
							'thumbnail',
							'excerpt',
							'custom-fields',
							'revisions',
							'page-attributes',
							'post-formats'
		),
		'public'=>true,
		'has_archive'=>true,
		'show_ui'=>true,
		'show_in_nav_menus'=>true,
		'show_in_menu'=>true,
		'show_in_admin_bar'=>true,
		'menu_position'=>3,
		'menu_icon'=>'dashicons-admin-site',
		'hierarchical'=>true,
		'capability_type'=>'page'
	));
	};
endif;
add_action('init','create_post_type');

function getCPTLabels(){
	return array('name' => __( 'Reisen' ),
                  'singular_name' => __( 'Reise' )
	);
}

if ( ! function_exists( 'material_fonts_url' ) ):
	function material_fonts_icon() {
		return "https://fonts.googleapis.com/icon?family=Material+Icons";

	}
endif;

function get_material_font(){
	return "http://fonts.googleapis.com/css?family=Roboto:300,400,500,700";
}

function bogenreisenStylesAndScripts() {
	wp_enqueue_style( 'material-font', get_material_font(), array(), null );
	wp_enqueue_style( 'material-fonts-icon', material_fonts_icon(), array(), null );
	wp_enqueue_style( 'materialDesign',
		get_template_directory_uri() . '/css/material.min.css',
		array( ),
		null );
	wp_enqueue_style( 'bogenreisen-style', get_stylesheet_uri() );
	wp_enqueue_script( 'materialScript', get_template_directory_uri() . '/js/material.min.js' );
}

add_action( 'wp_enqueue_scripts', 'bogenreisenStylesAndScripts' );

function bogen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'twentysixteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 1', 'twentysixteen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 2', 'twentysixteen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'bogen_widgets_init' );

function add_menuclass($ulclass) {
	return preg_replace('/<a rel="nofollow"/', '<a rel="nofollow" class="mdl-navigation__link"', $ulclass, 1);
}
add_filter('wp_nav_menu','add_menuclass');

//[reisekarte id=xxx ]
function showReisekarte($attr){


	$id=$attr['id'];
	$reisePost=get_post($id);
	set_query_var('reisePost',$reisePost);

	set_query_var('reisePostThumbUrl',get_the_post_thumbnail_url($reisePost,'cardImage'));
	ob_start();
	get_template_part('template-parts/content','card-reise');
	return ob_get_clean();

}
add_shortcode('reisekarte','showReisekarte');

function startCardGrid($attr){

	return "<div class='mdl-grid'>";

}
add_shortcode('gridContainerStart','startCardGrid');

function endCardGrid($attr){

	return "</div>";

}
add_shortcode('gridContainerEnd','endCardGrid');

