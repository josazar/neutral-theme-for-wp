<?php
/**
 * The Template for displaying all single posts.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<div class="wrapper">
	<main id="primary" class="site-main">
		<?php

		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			
			// the_post_navigation();


			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || '0' != get_comments_number() ) : ?>

				<div class="comments-area">
					<?php comments_template(); ?>
				</div>

			<?php endif;

		endwhile;
		?>
	</main><!-- #main -->
	<?php get_sidebar(); ?>
</div><!-- .wrapper -->
<?php
get_footer();
