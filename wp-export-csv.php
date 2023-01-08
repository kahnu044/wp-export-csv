<?php

/*
Plugin Name: Wp Export CSV
Description: Used To Export To CSV
Version: 0.1
Author: Kahnu
*/

define("WPECSV_PLUGIN_DIR_PATH", plugin_dir_path(__FILE__));
define("WPECSV_PLUGIN_URL", plugins_url());
define("WPECSV_VERSION", plugins_url());

add_action('admin_enqueue_scripts', function () {
    wp_enqueue_style('wpecsv-donor-css', WPECSV_PLUGIN_URL . 'assets/css/style.css', array(), WPECSV_VERSION);
    wp_enqueue_script('wpecsv-donor-js', WPECSV_PLUGIN_URL . 'assets/js/main.js', array('jquery'), WPECSV_VERSION);
    wp_localize_script('wpecsv-donor-js', 'wpecsv', array('ajaxurl' => admin_url('admin-ajax.php')));
});


// Add menu and submenu
add_action("admin_menu", function(){
   add_menu_page("WP Export CSV", "WP Export CSV", "manage_options", "wp-export-csv", "wpecsv_menu_callback", "dashicons-admin-network");
});

//function for normal csv import
function wpecsv_menu_callback()
{
   include_once  "inc/view/export-csv.php";
}