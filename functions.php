<?php
define('MY_FIRST_THEME_PATH',get_template_directory_uri());
define('ASSETS_DIRECTORY_PATH',get_stylesheet_directory_uri()."/assets");
define('SCRIPT_DIRECTORY_PATH',ASSETS_DIRECTORY_PATH."/js");
define('STYLE_DIRECTORY_PATH',ASSETS_DIRECTORY_PATH."/css");
define('IMAGE_DIRECTORY_PATH',ASSETS_DIRECTORY_PATH."/images");

function add_theme_scripts()
{
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('bootstrap',STYLE_DIRECTORY_PATH.'/bootstrap.min.css');
}
add_action('wp_enqueue_scripts', 'add_theme_scripts');
/* Beginning of Menus*/

/**Top Level Menu */
function my_admin_notices(){
    echo "<h2>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </h2>";
}
add_action('admin_notices','my_admin_notices');

function my_options_menu(){
    if(!current_user_can('manage_options')){
        wp_die(__("Vous n'avez pas la permission de consulter cette page"));
    }
}
function my_load_function(){
    remove_action('admin_notices','my_admin_notices');
}
function add_my_menu(){
    /* Adds a menu page on the setting main menu*/
    /**
     * add_options_page($page_title,$menu_title,$capability,$menu_slug,$callback,$icon_url,$position)
     */
    $hook_suffix = add_options_page( 'My options', 'My menu', 'manage_options', 'my-unique-identifier','my_options_menu','dashicons-admin-appearance',0);
    add_action('load-'.$hook_suffix,'my_load_function');
}
add_action('admin_menu','add_my_menu');

/*SubLevel Menus */

function sub_level_options_menu() {
    if(!current_user_can('manage_options')){
        wp_die(__("Vous n'avez pas l'autorisaion de consulter cette page"));
    }
    echo "<h1>Submenu in edit.php</h1>";
}

function add_my_submenu() {
    /*Add a submenu page */
    /**
     * add_submenu_page($paren_slug,$page_title,$menu_title,$capability,$menu_slug,$callback,$position)
     */
    add_submenu_page(
        'edit.php?post_type=page',
        'This is a submenu',
        'My submenu',
        'manage_options',
        'submenu-page',
        'sub_level_options_menu'
    );
}

//add_action('admin_menu','add_my_submenu');

/*Dashboard page*/
function dashboard_menus_content(){
    if(!current_user_can('manage_options')){
        wp_die(__("Vous n'avez pas l'autorisation d'accéder à cette page"));
    }
    echo "<h1>This is Dashboard menus</h1>";
}

function add_dashboard_menus(){
    add_dashboard_page(
        'Custom dashboard page',
        'Custom dahsboadr menus',
        'manage_options',
        'custom-dahsboard-menus',
        'dashboard_menus_content'
    );
}
//add_action('admin_menu','add_dashboard_menus');
/*Get all child pages*/
function get_child_pages_content(){
    if(!current_user_can('manage_options')){
        wp_die(__("Vous n'avez pas l'autorisation de consulter cette page"));
    }
    echo "<h1>Liste des pages enfants</h1>";
}
/*Get comments notes*/
function get_comments_notes(){
    if(!current_user_can('manage_options')){
        wp_die(__("Vous n'avez pas l'autorisation de consulter cette page"));
    }
    echo "<h1>Liste des notes sur les commentaires</h1>"; 
}
/*Insert multiples menus in various place*/
function add_menus(){
    /*Add a menu "Page Enfants" in Pages admin*/
    add_pages_page(__('Liste des pages enfants','menus-admins'),__('Pages enfants','menus-admins'),'manage_options','listes-pages-enfants','get_child_pages_content');

    /*Add a menu "Notes" in Comments admin*/
    add_comments_page(__('Liste des notes sur les commentaires','menu-admins'),__('Notes','menus-admis'),'manage_options','listes-notes-commmentaires','get_comments_notes');
}
add_action('admin_menu','add_menus');

function add_comments_notes_submenu(){
    add_submenu_page('listes-notes-commmentaires',__('Filtre des notes','menus-admins'),__('Filtrer les notes','menu-admins'),'manage_options','filtres-notes-commentaires');
}
add_action('admin_menu','add_comments_notes_submenu');

/*Ending of menus*/

/*Set up custom headers*/
function set_custom_header(){
    $header_info = array(
        'default-image' =>  MY_FIRST_THEME_PATH.'/screenshot.jpg',
        'default-text-color' => '000',
        'width' => 700,
        'height' => 150,
        'flex-width' => true,
        'flex-height' => true,
    );
    add_theme_support('custom-header',$header_info);
    $header_images = array(
        'water' => array(
            'url'=>IMAGE_DIRECTORY_PATH.'/water.jpg',
            'thumbnail_url' => IMAGE_DIRECTORY_PATH.'/water.jpg',
            'description'=> 'Water',
        ),
        'espion' => array(
            'url' => IMAGE_DIRECTORY_PATH.'/espion.jpeg',
            'thumbnail_url'=>IMAGE_DIRECTORY_PATH.'/espion.jpeg',
            'description'=> 'Espion'
        )
    );

    /*Register a default image*/
    register_default_headers($header_images);
}
add_action('after_setup_theme','set_custom_header');

/*Set up custom logo*/
function set_custom_logo(){
    $defaults = array(
        'height' => 100,
        'width' => 400,
        'flex-width' => true,
        'flex-heihgt' => true,
        'header-text' => array('site-title','site-description'),
        'unlink-homepage-logo' => true
    );
    add_theme_support ('custom-logo',$defaults);
}
add_action('after_setup_theme','set_custom_logo');


