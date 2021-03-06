<?php
/**
 * The template for displaying the footer.
 *
* @package neutral
 */
?>
	<footer id="colophon" class="site-footer wrapper" role="contentinfo">
		<div class="clear_column"></div>	
		<?php
		if ( is_active_sidebar( 'sidebar-2' ) ||
			is_active_sidebar( 'sidebar-3' ) ) :
		?>

		<aside class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'neutral' ); ?>">
			<?php
			if ( is_active_sidebar( 'sidebar-2' ) ) {
			?>
				<div class="widget-column footer-widget-1 one_half">
					<?php dynamic_sidebar( 'sidebar-2' ); ?>
				</div>
			<?php
			}
			if ( is_active_sidebar( 'sidebar-3' ) ) {
			?>
				<div class="widget-column footer-widget-2 one_half">
					<?php dynamic_sidebar( 'sidebar-3' ); ?>
				</div>
			<?php } ?>
		</aside><!-- .widget-area -->

	<?php endif; ?>


	</footer>
<?php wp_footer(); ?>
</body>
</html>

