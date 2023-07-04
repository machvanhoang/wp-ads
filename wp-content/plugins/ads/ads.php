<?php

/**
 * @package Ads Plugin
 */
/*
Plugin Name: Ads Plugin
Plugin URI: Ads Plugin
Description: Ads Plugin
Version: 5.1
Requires at least: 5.0
Requires PHP: 5.2
Author: Ads Plugin
Author URI: Ads Plugin
License: GPLv2 or later
Text Domain: Ads Plugin
*/
include_once "ajax.php";
function ads_plugin_menu_page()
{
    echo '<div id="app"></div>';
}

function ads_plugin_add_menu_page()
{
    add_menu_page(
        'Ads Settings',
        'Ads Settings',
        'manage_options',
        'ads-setting',
        'ads_plugin_menu_page',
        'dashicons-admin-settings',
        99
    );
}
add_action('admin_menu', 'ads_plugin_add_menu_page');
function ads_plugin_enqueue_scripts()
{
    wp_enqueue_style(
        'ads-plugin-style',
        plugins_url('dist/assets/index.css', __FILE__),
        array(),
        '1.0',
        ''
    );
    wp_enqueue_script(
        'ads-plugin-script',
        plugins_url('dist/assets/index.js', __FILE__),
        array('jquery'),
        '1.0',
        true
    );
    wp_script_add_data('ads-plugin-script', 'type', 'module');
}

add_action('admin_enqueue_scripts', 'ads_plugin_enqueue_scripts');

function add_type_attribute($tag, $handle, $src)
{
    if ('ads-plugin-script' !== $handle) {
        return $tag;
    }
    $tag = '<script type="module" src="' . esc_url($src) . '"></script>';
    return $tag;
}
add_filter('script_loader_tag', 'add_type_attribute', 10, 3);


##### SET QUERY VAR ADN ADD WRITE RULE
function addQueryVar($vars)
{
    $vars[] = 'type_email';
    return $vars;
}
add_filter('query_vars', 'addQueryVar');
function media_post_type_rewrite_rule()
{
    add_rewrite_rule(
        '^send-email',
        'index.php?type_email=contact',
        'top'
    );
    add_rewrite_endpoint('send-email', EP_ROOT);
    add_rewrite_endpoint('contact', EP_ROOT);
    add_rewrite_endpoint('send', EP_ROOT);
}
add_action('init', 'media_post_type_rewrite_rule');
function handle_email_submission()
{
    if (isset($_POST['submit']) && $_POST['submit'] === 'Send email') {
        var_dump($_GET);
        echo "Email sent successfully!";
        die;
    }
}
add_action('template_redirect', 'handle_email_submission');
