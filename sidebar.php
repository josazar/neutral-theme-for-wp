<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package neutral
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<div id="right-sidebar" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">

	<div class="inside-right-sidebar">
		<?php

		if ( ! dynamic_sidebar( 'sidebar-1' ) ) :?>

			<aside id="search" class="widget widget_search">
				<?php get_search_form(); ?>
			</aside>

			<aside id="archives" class="widget">
				<h2 class="widget-title"><?php esc_html_e( 'Archives', 'neutral' ); ?></h2>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>
			</aside>
		
		<?php
		endif;
		?>
	</div><!-- .inside-right-sidebar -->
</div><!-- #secondary -->
