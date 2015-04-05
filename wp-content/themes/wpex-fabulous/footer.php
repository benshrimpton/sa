<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 * @subpackage Fabulous WPExplorer Theme
 * @since Fabulous 1.0
 */

$wpex_footer_box_class = apply_filters( 'wpex_footer_box_class', wpex_grid_class( get_theme_mod( 'wpex_footer_columns', '4' ) ) );
?>

		</div><!--.site-main -->
	</div><!-- .site-main-wrap -->
</div><!-- #wrap -->

<footer id="footer-wrap" class="site-footer clr">
	<div id="footer" class="container clr">
		<div id="footer-widgets" class="clr">
			<div class="footer-box <?php echo $wpex_footer_box_class; ?> col col-1">
				<?php dynamic_sidebar( 'footer-one' ); ?>
			</div><!-- .footer-box -->
			<?php
			// Second footer area
			if ( get_theme_mod( 'wpex_footer_columns', '4' ) > '1' ) { ?>
				<div class="footer-box <?php echo $wpex_footer_box_class; ?> col col-2">
					<?php dynamic_sidebar( 'footer-two' ); ?>
				</div><!-- .footer-box -->
			<?php } ?>
			<?php
			// Third Footer Area
			if ( get_theme_mod( 'wpex_footer_columns', '4' ) > '1' ) { ?>
				<div class="footer-box <?php echo $wpex_footer_box_class; ?> col col-3">
					<?php dynamic_sidebar( 'footer-three' ); ?>
				</div><!-- .footer-box -->
			<?php } ?>
			<?php
			// Fourth Footer Area
			if ( get_theme_mod( 'wpex_footer_columns', '4' ) > '1' ) { ?>
				<div class="footer-box <?php echo $wpex_footer_box_class; ?> col col-4">
					<?php dynamic_sidebar( 'footer-four' ); ?>
				</div><!-- .footer-box -->
			<?php } ?>
		</div><!-- #footer-widgets -->
		<div style="float: right;font-size: 13px; font-weight: normal;">COPYRIGHT 2013, SARAH APPLEBY LTD</div>
	</div><!-- #footer -->
</footer><!-- #footer-wrap -->

<?php wp_footer(); ?>
</body>
</html>