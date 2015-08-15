<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SoundPress-Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php if ( 'podcast' == get_post_type( get_the_ID() ) ) { ?>
					<div class="podcast-billboard">
						<?php the_post_thumbnail(); ?>
						<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
					</div>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header class="entry-header">
							<?php if ( 'post' == get_post_type() ) : ?>
							<div class="entry-meta">
								<?php soundpress_posted_on(); ?>
							</div><!-- .entry-meta -->
							<?php endif; ?>
						</header><!-- .entry-header -->

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
				<?php } else {
					get_template_part( 'template-parts/content', get_post_format() );
				}
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
