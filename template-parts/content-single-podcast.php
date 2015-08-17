<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SoundPress-Theme
 */

?>
	<div class="podcast-billboard">
		<div class="billboard-content">
		<div class="blur-img">

			<?php 
			if ( has_post_thumbnail() ) {
				the_post_thumbnail(); 
			} else {
				?><img src="<?php echo get_header_image(); ?>">
				<?php
			}
			?>
		</div>
		
		<h2><i class="ion-music-note"></i><?php the_title(); ?></h2>
	</div>
	<?php
	if ( has_post_thumbnail() ) {
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'podcast-art' );
	} else {
		$image[] = get_header_image();
	} ?>
	<div class="album-art" style="background-image: url('<?php echo $image[0]; ?>')"></div>
	</div>
	<div class="podcast-meta">
		<p>
			<?php echo do_shortcode( '[podcast_episode episode="'.get_the_ID().'" content="player"]' ); ?>
		</p>
	</div>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-content">
			<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'soundpress' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			?>

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'soundpress' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php soundpress_entry_footer(); ?>
		</footer><!-- .entry-footer -->

		<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>
	</article><!-- #post-## -->
