<?php
/**
 * Neutral functions and definitions.
 * 
 * Inspired by https://underscore.me 
 * 
 * @package neutral
 */




 /**
  * Enqueues scripts and styles for front-end.
  *
  * @since neutral 0.1
  */
 function neutral_scripts_styles()
 {
 	// Loads our main stylesheet
 	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/css/main.css', false, '1.0', 'screen');

 	// add Jquery
 	wp_enqueue_script("jquery");

 	// JS PRINCIPAL APP-dist.JS
 	wp_enqueue_script( 'app-js', get_template_directory_uri() . '/assets/js/app-dist.js', array( 'jquery' ), '1', true );
 }
 add_action( 'wp_enqueue_scripts', 'neutral_scripts_styles' );


/**
 * Sets up theme defaults (called every time)
 */
function neutral_setup()
{
	/*
	* Make theme available for translation.
	*/
	load_theme_textdomain( 'neutral', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'neutral' ),
	) );

	// Image à la une
	add_theme_support( 'post-thumbnails' );
	
	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	// 1. Resize Image
	// add_image_size( 'vignette-photo', 640, 400, true );
}
add_action( 'after_setup_theme', 'neutral_setup' );


/**
 * Register our sidebars and widgetized areas.
 *
 */
function neutral_widgets_init() {
	// Widget de la sidebar
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'neutral' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Ajoutez ici les widgets de la colonne de droite.', 'neutral' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	// Pied de page
	register_sidebar( array(
		'name'          => 'Pied de page 1',
		'id'            => 'sidebar-2',
		'description'   => __( 'Ajoutez ici les widgets du pied de page.', 'neutral' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
	) );
	register_sidebar( array(
		'name'          => 'Pied de page 2',
		'id'            => 'sidebar-3',
		'description'   => __( 'Ajoutez ici les widgets du pied de page.', 'neutral' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
	) );


}
add_action( 'widgets_init', 'neutral_widgets_init' );


/**
 * Ajout de la class has-sidebar dnas le body si le template à une sidebar
 * 
 */
function neutral_has_sidebar($classes) {
	// Add class if sidebar is used.
	if ( is_active_sidebar( 'sidebar-1' ) && ! is_page() ) {
		$classes[] = 'has-sidebar';
	}
    // return the $classes array
    return $classes;
}
add_filter('body_class','neutral_has_sidebar');
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 * 
 */
function neutral_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}
	$link = sprintf(
		'<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Lire plus<span class="screen-reader-text"> "%s"</span>', 'neutral' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'neutral_excerpt_more' );


/**
 * Remove EMOJI Script
 */
 remove_action('wp_head', 'print_emoji_detection_script', 7);
 remove_action('admin_print_scripts', 'print_emoji_detection_script');
 remove_action('wp_print_styles', 'print_emoji_styles');
 remove_action('admin_print_styles', 'print_emoji_styles');


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';