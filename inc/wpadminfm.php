<?php

/**
 * Mix Podcasts with posts
 * @param  object $query the query object
 * @return void
 */
function wpadminfm_pre_get_posts( $query ) {

	if ($query->is_main_query() ) {
		if ($query->is_archive || $query->is_home() ) {
			$query->set('post_type', array( 'podcast', 'post' ) );
		}
	}
}
add_action( 'pre_get_posts', 'wpadminfm_pre_get_posts' );