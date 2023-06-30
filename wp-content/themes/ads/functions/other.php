<?php
/* ===============================================================================
  Other
=============================================================================== */


/*===================================
wp_head (Remove unnecessary information)
===================================*/
// Versions
remove_action('wp_head', 'wp_generator');

/*
// Remove posting
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');

//
remove_action('wp_head', 'feed_links_extra', 3);
*/

// 「wp-block-library-css」を削除
function dequeue_plugins_style()
{
	//Specify and cancel the plugin ID
	wp_dequeue_style('wp-block-library');
}
add_action('wp_enqueue_scripts', 'dequeue_plugins_style', 9999);

// meta robots
function add_meta_robots_front_page()
{
	if (is_attachment()) {
		echo '<meta name="robots" content="index,follow" />';
	}
}
add_action('wp_head', 'add_meta_robots_front_page');
