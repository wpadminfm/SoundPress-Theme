<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SoundPress-Theme
 */

?>

<?php if ( 'podcast' == get_post_type( get_the_ID() ) ) { ?>
	<div class="podcast-billboard">
		<div class="billboard-content">

		<div class="blur-img">
			<?php the_post_thumbnail(); ?>
		</div>
		<?php $podcast_duration = get_post_meta( get_the_ID(), 'podcast_duration', true ); ?>
		<h2><i class="ion-music-note"></i><?php the_title(); ?> [<?php echo $podcast_duration; ?>]</h2>
	</div>
	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
	<div class="album-art" style="background-image: url('<?php echo $image[0]; ?>')"></div>
	</div>
	<div class="podcast-meta">
		<p>
			<?php $podcast_download = get_post_meta( get_the_ID(), 'podcast_download_url', true ); ?>
			<?php 	
					$soundpress_options = get_option( 'soundpress_option_name' );
					$client_id 	= $soundpress_options['soundcloud_oauth_client_id_0'];
			?>
			<a href="<?php echo $podcast_download; ?>?client_id=<?php echo $client_id; ?>"><i class="ion-android-download"></i>Download</a>
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
	</article><!-- #post-## -->

<?php } else { ?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php soundpress_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
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
</article><!-- #post-## -->

<?php } ?>
