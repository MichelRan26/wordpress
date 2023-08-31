<?php

define('ASSETS_DIRECTORY_PATH',get_stylesheet_directory_uri()."/assets");
define('SCRIPT_DIRECTORY_PATH',ASSETS_DIRECTORY_PATH."/js");
define('STYLE_DIRECTORY_PATH',ASSETS_DIRECTORY_PATH."/css");
define('IMAGE_DIRECTORY_PATH',ASSETS_DIRECTORY_PATH."/image");

function add_theme_scripts()
{
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('bootstrap',STYLE_DIRECTORY_PATH.'/bootstrap.min.css');
}
add_action('wp_enqueue_scripts', 'add_theme_scripts');
