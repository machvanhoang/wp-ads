<?php

/**
 * @package Vite Pproject
 */
/*
Plugin Name: Vite Pproject
Plugin URI: Vite Pproject
Description: Vite Pproject
Version: 5.1
Requires at least: 5.0
Requires PHP: 5.2
Author: Vite Pproject
Author URI: Vite Pproject
License: GPLv2 or later
Text Domain: Vite Pproject
*/

include_once "ajax.php";
function my_plugin_menu_page()
{
    echo '<div id="app"></div>';
}

function my_plugin_add_menu_page()
{
    add_menu_page(
        'Vite Settings',
        'Vite Settings',
        'manage_options',
        'vite-setting',
        'my_plugin_menu_page',
        'dashicons-admin-settings',
        99
    );
}
add_action('admin_menu', 'my_plugin_add_menu_page');
function my_plugin_enqueue_scripts()
{
    wp_enqueue_style(
        'my-plugin-style',
        plugins_url('dist/assets/index.css', __FILE__),
        array(),
        '1.0',
        ''
    );
    wp_enqueue_script(
        'my-plugin-script',
        plugins_url('dist/assets/index.js', __FILE__),
        array('jquery'),
        '1.0',
        true
    );
    wp_script_add_data('my-plugin-script', 'type', 'module');
}

add_action('admin_enqueue_scripts', 'my_plugin_enqueue_scripts');

function add_type_attribute($tag, $handle, $src)
{
    if ('my-plugin-script' !== $handle) {
        return $tag;
    }
    $tag = '<script type="module" src="' . esc_url($src) . '"></script>';
    return $tag;
}
add_filter('script_loader_tag', 'add_type_attribute', 10, 3);
