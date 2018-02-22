<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage neutral
 */
?>

<article id="post-<?php the_ID(); ?>" class="cms-content">
	<div class="entry-content">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php the_content(); ?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->