<?php

/* function myfirsttheme_setup()
{
    $styled_blocks = ['latest-comments'];
    foreach ($styled_blocks as $block_name) {
        $args = [
            'handle' => "myfirsttheme-$block_name",
            'src' => get_theme_file_uri("assets/css/blocks/$block_name.css"),
            $args['path'] = get_theme_file_path("assets/css/blocks/$block_name.css"),
        ];
        wp_enqueue_block_style("core/$block_name", $args);
    }
}
add_action('after_setup_theme', 'myfirsttheme_setup'); */
define('SCRIPT_DIRECTORY_PATH',get_template_directory_uri()."/js/");
define('STYLE_DIRECTORY_PATH',get_template_directory_uri()."/css/");
define('IMAGE_DIRECTORY_PATH',get_template_directory());

function add_theme_scripts()
{
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_script('script', get_template_directory_uri().'/js/script.js', ['jquery'], 1.1, true);
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_script', 'add_theme_scripts');
