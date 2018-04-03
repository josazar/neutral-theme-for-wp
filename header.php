<?php
/**
 * The Header for our theme.
 *
 * @package WordPress
 * @subpackage emilyhawkes
 * @since emilyhawkes 0.1
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<nav class="nav wrapper">
		<?php
		wp_nav_menu( array(
			'theme_location' => 'top',
			'menu_id'        => 'main-nav',
			'menu_class'	=> 'main-menu'
		) );
		 ?>
	</nav>
