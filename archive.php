<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package neutral
 */

get_header(); ?>

<div class="wrapper">

	<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
		</header><!-- .page-header -->
	<?php endif; ?>

		<main id="primary" class="site-main" role="main">

		<?php
		if ( have_posts() ) :
		?>
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				// get_template_part( 'template-parts/content', 'excerpt' );
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_pagination(
				array(
					'prev_text'          => '<span class="screen-reader-text">' . __( 'Page précédente', 'neutral' ) . '</span>',
					'next_text'          => '<span class="screen-reader-text">' . __( 'Page suivante', 'neutral' ) . '</span>',
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'neutral' ) . ' </span>',
				)
			);

		endif;
		?>

		</main><!-- #main -->
	<?php get_sidebar(); ?>
</div><!-- .wrapper -->

<?php
get_footer();
