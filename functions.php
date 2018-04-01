<?php
/**
 * neutral functions and definitions.
 *
 *
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
 * Remove EMOJI Script
 */
 remove_action('wp_head', 'print_emoji_detection_script', 7);
 remove_action('admin_print_scripts', 'print_emoji_detection_script');
 remove_action('wp_print_styles', 'print_emoji_styles');
 remove_action('admin_print_styles', 'print_emoji_styles');
