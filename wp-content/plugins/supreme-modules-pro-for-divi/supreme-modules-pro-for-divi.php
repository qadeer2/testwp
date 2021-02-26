<?php
/**
 * Plugin Name: Divi Supreme Pro
 * Plugin URI:  https://divisupreme.com
 * Description: Divi Supreme Pro enhances the experience and features found on Divi. Packed with everything you need to build amazing websites with ease.
 * Version:     4.2.2
 * Author:      Divi Supreme
 * Author URI:  https://divisupreme.com
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: dsm-supreme-modules-pro-for-divi
 * Domain Path: /languages
 *
 * Divi Supreme Pro is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.

 * Divi Supreme Pro is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with Divi Supreme Pro. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
 *
 * @link              https://divisupreme.com
 * @since             1.0.0
 * @package           supreme-modules-pro-for-divi
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! defined( 'DSM_PRO_VERSION' ) ) {
	define( 'DSM_PRO_VERSION', '4.2.2' );
}
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-dsm-supreme-modules-pro-for-divi-activator.php
 */
function activate_dsm_supreme_modules_pro_for_divi() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-dsm-supreme-modules-pro-for-divi-activator.php';
	Dsm_Supreme_Modules_Pro_For_Divi_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-dsm-supreme-modules-pro-for-divi-deactivator.php
 */
function deactivate_dsm_supreme_modules_pro_for_divi() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-dsm-supreme-modules-pro-for-divi-deactivator.php';
	Dsm_Supreme_Modules_Pro_For_Divi_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_dsm_supreme_modules_pro_for_divi' );
register_deactivation_hook( __FILE__, 'deactivate_dsm_supreme_modules_pro_for_divi' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-dsm-supreme-modules-pro-for-divi.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_dsm_supreme_modules_pro_for_divi() {
	$plugin = new Dsm_Supreme_Modules_Pro_For_Divi();
	$plugin->run();
}

if ( version_compare( PHP_VERSION, '5.6', '<' ) ) {
	/**
	 * Display PHP version error
	 *
	 * @since 1.0.0
	 */
	function dsm_admin_notice__php_version_error() {
		echo sprintf(
			'<div class="notice notice-error"><p>Goodness! Either you do not have Divi installed or your PHP version is either too old or not recommended to use Divi Supreme! We are not going to load anything on your WordPress unless you update your PHP. Do you know by using Divi Supreme, you can create even more stunning and amazing site with it? Learn more about the WordPress requirements <a href="%1$s" target="_blank">here</a>. Current PHP version is: %2$s Recommended PHP version: 7 and above.</p></div>',
			esc_url( 'https://wordpress.org/about/requirements/' ),
			PHP_VERSION
		);
	}
	add_action( 'admin_notices', 'dsm_admin_notice__php_version_error' );
	return;
} else {
	define( 'DSM_PRO_APP_API_URL', 'https://divisupreme.com/index.php' );
	define( 'DSM_PRODUCT_ID', 'DSM-PRO' );
	define( 'DSM_PRO_INSTANCE', str_replace( array( 'https://', 'http://' ), '', trim( network_site_url(), '/' ) ) );
	run_dsm_supreme_modules_pro_for_divi();
}
