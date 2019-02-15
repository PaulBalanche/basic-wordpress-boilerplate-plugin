<?php
/**
* Plugin Name: Basic wordpress boilerplate plugin
* Plugin URI: https://github.com/PaulBalanche/basic-wordpress-boilerplate-plugin
* Description: Basic Wordpress boilerplate theme
* Text Domain: basic-wordpress-boilerplate-plugin
* Version: 1.0.0
* Author: Paul Balanche
**/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

error_reporting(E_ALL | E_STRICT);



/**
* Define variables
*
*/
define( 'WPEXTEND_DIR'							, plugin_dir_path( __FILE__ ) );
define( 'WPEXTEND_PLUGIN_URL'					, plugins_url('', __FILE__) . '/' );
define( 'WPEXTEND_ASSETS_URL'					, WPEXTEND_PLUGIN_URL . 'assets' . '/' );
define( 'WPEXTEND_IMPORT_DIR'					, get_stylesheet_directory() . '/wpextend/import/' );
define( 'WPEXTEND_PREFIX_FILE_CLASS'			, 'class-' );
define( 'WPEXTEND_PREFIX_DATA_IN_DB'			, 'meta_wpextend_' );
define( 'WPEXTEND_TEXTDOMAIN'					, 'wp-extend' );



/**
* Initialize plugin
*
*/
add_action( 'plugins_loaded', '_wpextend_init' );
function _wpextend_init() {

	// Load text domain
	load_plugin_textdomain( WPEXTEND_TEXTDOMAIN, false, basename( dirname( __FILE__ ) ) . '/languages' );
	
	// Functions
	require( WPEXTEND_DIR . '/inc/functions/basic-functions.php' );

	// WP-Extend vendor autoloader
	require( WPEXTEND_DIR . '/vendor/autoload.php' );

	// Load Main instance
	$instance_Wpextend_Main = Wpextend\Main::getInstance();
}