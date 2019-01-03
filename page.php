<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package neutral
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<div class="wrapper">
	<main id="primary" class="site-main">
		<?php

		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || '0' != get_comments_number() ) : ?>

				<div class="comments-area">
					<?php comments_template(); ?>
				</div>

			<?php endif;

		endwhile;
		?>
	</main><!-- #main -->
</div><!-- .wrapper -->
<?php
get_footer();
