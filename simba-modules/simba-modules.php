<?php
/**
 * Plugin Name: Simba Modules
 * Plugin URI: http://www.wpbeaverbuilder.com
 * Description: Custom Beaver Builder Modules.
 * Version: 1.0
 * Author: Simon Barnett
 * Author URI: http://www.wpbeaverbuilder.com
 */
define( 'SB_MODULES_DIR', plugin_dir_path( __FILE__ ) );
define( 'SB_MODULES_URL', plugins_url( '/', __FILE__ ) );

/**
 * Portfolio Popup Module
 */
function load_sb_modules() {
	if ( class_exists( 'FLBuilder' ) ) {
			require_once 'sb-portfolio-popup/sb-portfolio-popup.php';
	}
}
add_action( 'init', 'load_sb_modules' );
