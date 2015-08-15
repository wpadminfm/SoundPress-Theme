<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package SoundPress-Theme
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function soundpress_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'soundpress_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function soundpress_jetpack_setup
add_action( 'after_setup_theme', 'soundpress_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function soundpress_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function soundpress_infinite_scroll_render
