<?php
/**
 * The template for displaying single posts.
 *
 * @package neutral
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' );	?>
		</header><!-- .entry-header -->

		<div class="entry-content" itemprop="text">
			<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages :', 'neutral' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->

</article><!-- #post-## -->
