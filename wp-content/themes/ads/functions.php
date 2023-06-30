<?php
$templatepath = get_template_directory();
define('ADS_FUNCTIONS', $templatepath . '/functions/');
define('ADS_THEME', get_template_directory_uri());
include_once(ADS_FUNCTIONS . '/helper.php');
if (is_admin()) {
    include_once(ADS_FUNCTIONS . '/admin.php');
}
include_once(ADS_FUNCTIONS . '/media.php');
include_once(ADS_FUNCTIONS . '/other.php');
