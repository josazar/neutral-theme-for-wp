<?php
/**
 * The default template for displaying content
 *
 */
?>

<article id="post-<?php the_ID(); ?>" class="main-content wrapper">
	<div class="entry-content">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php the_content(); ?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
