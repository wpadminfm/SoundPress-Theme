<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SoundPress-Theme
 */

?>

	</div><!-- #content -->

		</div>
	</div><!--  close container -->
	<div class="row">
		<div class="col-sm-12">


	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'soundpress' ) ); ?>"><?php printf( esc_html__( 'Powered by %s', 'soundpress' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			SoundPress
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	</div>
		</div>
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
