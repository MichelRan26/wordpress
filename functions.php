<?php

define('SCRIPT_DIRECTORY_PATH',get_stylesheet_directory_uri()."/js/");
define('STYLE_DIRECTORY_PATH',get_stylesheet_directory_uri()."/css/");
define('IMAGE_DIRECTORY_PATH',get_stylesheet_directory_uri()."/image/");

function add_theme_scripts()
{
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('bootstrap',get_template_directory_uri() .'/css/bootstrap.min.css');
    /* wp_enqueue_script('script', get_template_directory_uri().'/js/script.js', ['jquery'], 1.1, true);
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    } */
}
add_action('wp_enqueue_script', 'add_theme_scripts');
