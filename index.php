<?php
/**
 * The main template file.
 *
 *
 * @package neutral
 */
?>
<?php get_header(); ?>

<div class="wrapper">
	<main id="primary" class="site-main">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php
			get_template_part( 'template-parts/content', get_post_type() );
			?>
		<?php endwhile; ?>
	</main>
</div><!-- .wrapper -->
<?php get_footer(); ?>