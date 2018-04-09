<?php
/**
 * The Header for our theme.
 *
 * @package neutral
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
	<header>
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$neutral_description = get_bloginfo( 'description', 'display' );
			if ( $neutral_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $neutral_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->
		<nav class="nav wrapper">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'top',
				'menu_id'        => 'main-nav',
				'menu_class'	=> 'main-menu'
			) );
			?>
		</nav>
	</header>