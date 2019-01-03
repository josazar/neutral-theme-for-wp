<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package neutral
 */

get_header();
?>

<div class="wrapper">
	<main id="primary" class="site-main">

	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<h1 class="page-title">
				<?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Résultat de votre recherche pour : %s', 'neutral' ), '<span>' . get_search_query() . '</span>' );
				?>
			</h1>
		</header><!-- .page-header -->

		<?php
		/* Start the Loop */
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content' );

		endwhile;

		the_posts_navigation();

	endif;
	?>

	</main><!-- #main -->
</div><!-- .wrapper -->
<?php
get_sidebar();
get_footer();
