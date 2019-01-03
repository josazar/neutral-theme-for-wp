<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package neutral
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<div class="wrapper">
	<main id="primary" class="site-main">

			<header class="entry-header">
				<h1 class="entry-title" itemprop="headline"><?php _e( 'Cette page est introuvable', 'neutral' ); ?></h1>
			</header><!-- .entry-header -->

			<div class="entry-content" itemprop="text">
				<?php
				echo '<p>';
				_e( 'Essayez une recherche :', 'neutral' );
				echo '</p>'; // WPCS: XSS OK.
				get_search_form();
				?>
			</div><!-- .entry-content -->
	</main><!-- #main -->
</div><!-- .wrapper -->
	<?php
get_footer();
