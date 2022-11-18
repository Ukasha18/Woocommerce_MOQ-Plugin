<?php
/**
 * Plugin Name: MOQ Controller Plugin
 * Description: Adding minimum and maximum quantuties. 
 * Version: 1.0
 * Author: Ukasha Aziz
 * Author URI: https://www.instagram.com/
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'MOQC_PLUGIN_DIR' ) ) {
	define( 'MOQC_PLUGIN_DIR', __DIR__ );
}

if ( ! defined( 'MOQC_PLUGIN_DIR_URL' ) ) {
	define( 'MOQC_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'MOQC_ABSPATH' ) ) {
	define( 'MOQC_ABSPATH', dirname( __FILE__ ) );
}

require_once MOQC_ABSPATH . '/includes/class-moqc-loader.php';