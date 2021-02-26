<?php

/**
 * Fired during plugin activation
 *
 * @link       https://divisupreme.com
 * @since      1.0.0
 *
 * @package    Dsm_Supreme_Modules_Pro_For_Divi
 * @subpackage Dsm_Supreme_Modules_Pro_For_Divi/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Dsm_Supreme_Modules_Pro_For_Divi
 * @subpackage Dsm_Supreme_Modules_Pro_For_Divi/includes
 * @author     Divi Supreme <hello@divisupreme.com>
 */
class Dsm_Supreme_Modules_Pro_For_Divi_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		flush_rewrite_rules();
		if ( ! get_option( 'dsm_flush_rewrite_rules_flag' ) ) {
			add_option( 'dsm_flush_rewrite_rules_flag', true );
		}

	}

}
