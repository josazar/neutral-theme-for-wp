<?php
/**
 * The template for displaying posts within the loop.
 *
 * @package neutral
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

	<header class="entry-header">
		<?php 
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php
					neutral_posted_on();
					neutral_posted_by();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
	</header><!-- .entry-header -->

	<?php neutral_post_thumbnail(); ?>

	<div class="entry-content" itemprop="text">
		<?php
		if (is_singular()) :
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'underscore' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );
		else : 
			the_excerpt();
		endif;

		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages :', 'neutral' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php neutral_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
