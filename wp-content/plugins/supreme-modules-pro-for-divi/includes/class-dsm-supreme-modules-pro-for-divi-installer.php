<?php
/**
 * Divi Supreme Installer for Lite.
 *
 * @since 2.2.7
 */
class DSM_Installer {
	/**
	 * Contsruct.
	 *
	 * @since    2.2.7
	 */
	public function __construct() {
		$this->init();
	}
	/**
	 * Installer initialization
	 *
	 * @since 2.2.7
	 */
	public function init() {
		/**
		 * Check Free Divi Supreme Lite is installed or not!
		 *
		 * @since 2.2.7
		 */
		if ( ! $this->is_plugin_installed( 'supreme-modules-for-divi/supreme-modules-for-divi.php' ) ) {
			add_action( 'admin_notices', array( $this, 'display_notice' ) );
		}
	}

	/**
	 * Check if plugin exist
	 *
	 * @param string $slug plugin slug.
	 * @since 2.2.7
	 */
	public function is_plugin_installed( $slug ) {
		if ( ! function_exists( 'get_plugins' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}
		$all_plugins = get_plugins();

		if ( ! empty( $all_plugins[ $slug ] ) ) {
			return true;
		} else {
			return false;
		}
	}
	/**
	 * Display Notice
	 *
	 * @since 2.2.7
	 */
	public function display_notice() {
		global $current_screen;

		$plugin_var = 'plugins';
		$update_var = 'update';
		if ( $current_screen->parent_base === $plugin_var && $current_screen->base === $update_var ) {
			return;
		}

		if ( ! DSM_NOTICE::is_admin_notice_active( 'disable-install-lite-notice-forever' ) ) {
			return;
		}

		$dsm_supreme_modules_lite_plugin_slug = 'supreme-modules-for-divi';
		$install_url                          = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=' . esc_attr( $dsm_supreme_modules_lite_plugin_slug ) ), 'install-plugin_' . esc_attr( $dsm_supreme_modules_lite_plugin_slug ) );

		echo sprintf(
			'<div data-dismissible="disable-install-lite-notice-forever" class="notice notice-warning is-dismissible" class="notice notice-warning"><p>Notice: %1$s requires %2$s to be installed and activated. You will need to keep the %2$s version installed/activated to use the %1$s version. This is a fallback method to keep your site running smoothly without any issue in case the Divi Supreme Pro is not activated. This will not slow down your website or has any impact on performance when both are activated. %3$s</p></div>',
			'<strong>' . esc_html__( 'Divi Supreme Pro', 'dsm-supreme-modules-pro-for-divi' ) . '</strong>',
			'<strong>' . esc_html__( 'Divi Supreme Lite', 'dsm-supreme-modules-pro-for-divi' ) . '</strong>',
			'<p>' . sprintf(
				'<a href="%2$s" class="button-primary">%1$s</a>',
				esc_html__( 'Install Divi Supreme Lite', 'dsm-supreme-modules-pro-for-divi' ),
				esc_url( $install_url )
			) . '</p>'
		);
	}
}
new DSM_Installer();
// End.
