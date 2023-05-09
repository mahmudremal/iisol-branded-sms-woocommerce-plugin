<?php
/**
 * This plugin ordered by a client and done by Remal Mahmud (fiverr.com/mahmud_remal). Authority dedicated to that cient.
 *
 * @wordpress-plugin
 * Plugin Name:       IISOL Branded SMS WooCommerce Plugin
 * Plugin URI:        https://github.com/mahmudremal/futurewordpress-project-scratch-domain/
 * Description:       Branded SMS plugin sends personalized and branded messages to your customers. It offers a user-friendly interface, scheduling, and advanced analytics. Perfect for SMS marketing needs.
 * Version:           1.0.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Remal Mahmud
 * Author URI:        https://github.com/mahmudremal/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       iisol-branded-sms-woocommerce-plugin
 * Domain Path:       /languages
 * 
 * @package FutureWordPressProjectBrandedSms
 * @author  Remal Mahmud (https://github.com/mahmudremal)
 * @version 1.0.2
 * @link https://github.com/mahmudremal/futurewordpress-project-scratch-domain/
 * @category	WooComerce Plugin
 * @copyright	Copyright (c) 2023-25
 * 
 */

/**
 * Bootstrap the plugin.
 */



defined( 'FUTUREWORDPRESS_PROJECT_BRANDEDSMS__FILE__' ) || define( 'FUTUREWORDPRESS_PROJECT_BRANDEDSMS__FILE__', untrailingslashit( __FILE__ ) );
defined( 'FUTUREWORDPRESS_PROJECT_BRANDEDSMS_DIR_PATH' ) || define( 'FUTUREWORDPRESS_PROJECT_BRANDEDSMS_DIR_PATH', untrailingslashit( plugin_dir_path( FUTUREWORDPRESS_PROJECT_BRANDEDSMS__FILE__ ) ) );
defined( 'FUTUREWORDPRESS_PROJECT_BRANDEDSMS_DIR_URI' ) || define( 'FUTUREWORDPRESS_PROJECT_BRANDEDSMS_DIR_URI', untrailingslashit( plugin_dir_url( FUTUREWORDPRESS_PROJECT_BRANDEDSMS__FILE__ ) ) );
defined( 'FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_URI' ) || define( 'FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_URI', untrailingslashit( FUTUREWORDPRESS_PROJECT_BRANDEDSMS_DIR_URI ) . '/assets/build' );
defined( 'FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_PATH' ) || define( 'FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_PATH', untrailingslashit( FUTUREWORDPRESS_PROJECT_BRANDEDSMS_DIR_PATH ) . '/assets/build' );
defined( 'FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_JS_URI' ) || define( 'FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_JS_URI', untrailingslashit( FUTUREWORDPRESS_PROJECT_BRANDEDSMS_DIR_URI ) . '/assets/build/js' );
defined( 'FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_JS_DIR_PATH' ) || define( 'FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_JS_DIR_PATH', untrailingslashit( FUTUREWORDPRESS_PROJECT_BRANDEDSMS_DIR_PATH ) . '/assets/build/js' );
defined( 'FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_IMG_URI' ) || define( 'FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_IMG_URI', untrailingslashit( FUTUREWORDPRESS_PROJECT_BRANDEDSMS_DIR_URI ) . '/assets/build/src/img' );
defined( 'FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_CSS_URI' ) || define( 'FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_CSS_URI', untrailingslashit( FUTUREWORDPRESS_PROJECT_BRANDEDSMS_DIR_URI ) . '/assets/build/css' );
defined( 'FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_CSS_DIR_PATH' ) || define( 'FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_CSS_DIR_PATH', untrailingslashit( FUTUREWORDPRESS_PROJECT_BRANDEDSMS_DIR_PATH ) . '/assets/build/css' );
defined( 'FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_LIB_URI' ) || define( 'FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_LIB_URI', untrailingslashit( FUTUREWORDPRESS_PROJECT_BRANDEDSMS_DIR_URI ) . '/assets/build/library' );
defined( 'FUTUREWORDPRESS_PROJECT_BRANDEDSMS_ARCHIVE_POST_PER_PAGE' ) || define( 'FUTUREWORDPRESS_PROJECT_BRANDEDSMS_ARCHIVE_POST_PER_PAGE', 9 );
defined( 'FUTUREWORDPRESS_PROJECT_BRANDEDSMS_SEARCH_RESULTS_POST_PER_PAGE' ) || define( 'FUTUREWORDPRESS_PROJECT_BRANDEDSMS_SEARCH_RESULTS_POST_PER_PAGE', 9 );
defined( 'FUTUREWORDPRESS_PROJECT_BRANDEDSMS_OPTIONS' ) || define( 'FUTUREWORDPRESS_PROJECT_BRANDEDSMS_OPTIONS', get_option( 'iisol-branded-sms-woocommerce-plugin' ) );

require_once FUTUREWORDPRESS_PROJECT_BRANDEDSMS_DIR_PATH . '/inc/helpers/autoloader.php';
// require_once FUTUREWORDPRESS_PROJECT_BRANDEDSMS_DIR_PATH . '/inc/helpers/template-tags.php';

if( ! function_exists( 'futurewordpressprojectbrandedsms_get_theme_instance' ) ) {
	function futurewordpressprojectbrandedsms_get_theme_instance() {\FUTUREWORDPRESS_PROJECT_BRANDEDSMS\Inc\Project::get_instance();}
}
futurewordpressprojectbrandedsms_get_theme_instance();



