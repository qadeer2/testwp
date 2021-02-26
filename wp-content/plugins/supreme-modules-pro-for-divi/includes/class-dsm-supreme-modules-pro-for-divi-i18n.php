<?php
/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://divisupreme.com
 * @since      1.0.0
 *
 * @package    Dsm_Supreme_Modules_Pro_For_Divi
 * @subpackage Dsm_Supreme_Modules_Pro_For_Divi/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Dsm_Supreme_Modules_Pro_For_Divi
 * @subpackage Dsm_Supreme_Modules_Pro_For_Divi/includes
 * @author     Divi Supreme <hello@divisupreme.com>
 */
class Dsm_Supreme_Modules_Pro_For_Divi_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'dsm-supreme-modules-pro-for-divi',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
