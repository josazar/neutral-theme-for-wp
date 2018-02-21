<?php
/**
 * neutral functions and definitions.
 *
 * @package WordPress
 * @subpackage neutral
 * @since neutral 0.1
 *
 */


/**
 * Sets up theme defaults (called every time)
 */
function neutral_setup()
{
	// This theme uses wp_nav_menu() in two location.
	register_nav_menu( 'primary', 'Menu principal' );
	// Image à la une
	add_theme_support( 'post-thumbnails' );

	// 1. Resize Image
	// add_image_size( 'vignette-photo', 640, 400, true );
}
add_action( 'after_setup_theme', 'neutral_setup' );


/**
 * Register our sidebars and widgetized areas.
 *
 */
function neutral_widgets_init() {
	register_sidebar( array(
		'name'          => 'Pied de page',
		'id'            => 'footer_widget_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
	) );
}
add_action( 'widgets_init', 'neutral_widgets_init' );


/**
 * Enqueues scripts and styles for front-end.
 *
 * @since neutral 0.1
 */
function neutral_scripts_styles()
{
	// Loads our main stylesheet
	wp_enqueue_style( 'neutral-style', get_template_directory_uri() . '/css/main.css', false, '1.0', 'screen');

	// on ajoute jQuery
	wp_enqueue_script("jquery");

	// JS PRINCIPAL APP.JS
	wp_enqueue_script( 'app-js', get_template_directory_uri() . '/js/app.js', array( 'jquery' ), '1', true );
}
add_action( 'wp_enqueue_scripts', 'neutral_scripts_styles' );


/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 * (from twenty_twelve wordpress theme)
 *
 * @since neutral 0.1
 *
 */
function neutral_wp_title( $title, $sep )
{
	global $paged, $page;
	if ( is_feed() )
		return $title;
	// Add the site name.
	$title .= get_bloginfo( 'name' );
	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'neutral' ), max( $paged, $page ) );
	return $title;
}
add_filter( 'wp_title', 'neutral_wp_title', 10, 2 );
