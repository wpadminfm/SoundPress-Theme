<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SoundPress-Theme
 */

?>

	<a class="main-link" href="<?php the_permalink()?>">
	<div class="podcast-billboard">
		<div class="billboard-content">
		<div class="blur-img">
			<?php 
			if ( has_post_thumbnail() ) {
				the_post_thumbnail(); 
			} else {
				?><img src="<?php header_image(); ?>">
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
	</a>
	<div class="podcast-meta">
		<p>
			<?php echo do_shortcode( '[podcast_episode episode="'.get_the_ID().'" content="player"]' ); ?>
		</p>
	</div>


