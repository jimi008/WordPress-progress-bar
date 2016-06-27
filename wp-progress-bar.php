<?php 
/*
Plugin Name: WordPress Progress bar
Plugin URI:  http://URI_Of_Page_Describing_Plugin_and_Updates
Description: An automatic web page progress bar. WordPress progress bar automatically add beautiful progress and activity indicators for page loads and ajax navigation. It is free and open source.
Version:     3.0.0
Author:      Jamil Ahmed
Author URI:  http://prepareddevelopment.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: my-toolset

@link              http://prepareddevelopment.com
@since             1.0.0
@package           WordPress Progress bar

WordPress Progress bar is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
WordPress Progress bar is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with WordPress Progress bar. If not, see http://www.gnu.org/licenses/gpl-2.0.txt.
*/

// If this file is called directly, abort.

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


function wppbar_enqueue_style() {
	wp_enqueue_style( 'core', plugin_dir_url( __FILE__ ) . 'assets/css/style.min.css', false, '1.0.0' ); 
	wp_enqueue_style( 'core' );
}

function wppbar_enqueue_script() {
	wp_enqueue_script( 'vendors', plugin_dir_url( __FILE__ ) . 'assets/js/vendors.min.js', false, '1.0.0', false );
	wp_enqueue_script( 'vendors' );
}

add_action( 'wp_enqueue_scripts', 'wppbar_enqueue_style' );
add_action( 'wp_enqueue_scripts', 'wppbar_enqueue_script' );




	// We are in admin mode. 
function wppbar_admin_enqueue_style() {
	wp_enqueue_style( 'admin-core', plugin_dir_url( __FILE__ ) . 'admin/css/style.min.css', false, '1.0.0' );

}

function wppbar_admin_enqueue_script() {
	wp_enqueue_script( 'admin-custom', plugin_dir_url( __FILE__ ) . 'admin/js/custom.min.js', false, '1.0.0', false );
	wp_enqueue_script( 'admin-custom' );
}

add_action( 'admin_enqueue_scripts', 'wppbar_admin_enqueue_style' );
add_action( 'admin_enqueue_scripts', 'wppbar_admin_enqueue_script' );	


function add_wppbar_custom_menu() {
    //add an item to the menu
    add_menu_page (
        'WordPress Progress Bar',
        'WP Progress Bar',
        'manage_options',
        'wppbar-admin-page',
        'wppbar_admin_page_function',
        'dashicons-hammer',
        '23.56'
    );
}
add_action( 'admin_menu', 'add_wppbar_custom_menu' );

require_once 'admin/wppbar-admin-page.php';




?>