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
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

				<header class="entry-header">
					<h1 class="entry-title" itemprop="headline"><?php _e( 'Cette page est introuvable', 'neutral' ); ?></h1>
				</header><!-- .entry-header -->

				<div class="entry-content" itemprop="text">
					<?php
					echo '<p>404</p>'; // WPCS: XSS OK.

					get_search_form();
					?>
				</div><!-- .entry-content -->
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrapper -->
	<?php
get_footer();
