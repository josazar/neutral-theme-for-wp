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
		if ( is_active_sidebar( 'footer-1' ) ||
		is_active_sidebar( 'footer-2' ) ||
		is_active_sidebar( 'footer-3' ) ) :
		?>

		<aside class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'neutral' ); ?>">
			<?php
			if ( is_active_sidebar( 'footer-12' ) ) {
			?>
				<div class="widget-column footer-widget-1 one_third">
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</div>
			<?php
			}
			if ( is_active_sidebar( 'footer-2' ) ) {
			?>
				<div class="widget-column footer-widget-2 one_third">
					<?php dynamic_sidebar( 'footer-2' ); ?>
				</div>
			<?php }
			
			if ( is_active_sidebar( 'footer-3' ) ) {
				?>
					<div class="widget-column footer-widget-3 one_third">
						<?php dynamic_sidebar( 'footer-3' ); ?>
					</div>
				<?php } ?>
		</aside><!-- .widget-area -->
	<?php endif; ?>
	</footer>
<?php wp_footer(); ?>
</body>
</html>