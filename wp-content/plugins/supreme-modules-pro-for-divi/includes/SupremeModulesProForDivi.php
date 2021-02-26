<?php
/**
 * Divi Supreme DiviExtension.
 *
 * @since 1.0.0
 */
class DSM_SupremeModulesProForDivi extends DiviExtension {

	/**
	 * The gettext domain for the extension's translations.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $gettext_domain = 'dsm-supreme-modules-pro-for-divi';

	/**
	 * The extension's WP Plugin name.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $name = 'supreme-modules-pro-for-divi';

	/**
	 * The extension's version
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $version = DSM_PRO_VERSION;

	/**
	 * DSM_SupremeModulesProForDivi constructor.
	 *
	 * @param string $name Plugin Name.
	 * @param array  $args Args.
	 */
	public function __construct( $name = 'supreme-modules-pro-for-divi', $args = array() ) {
		$this->plugin_dir     = plugin_dir_path( __FILE__ );
		$this->plugin_dir_url = plugin_dir_url( $this->plugin_dir );

		parent::__construct( $name, $args );
	}
}

new DSM_SupremeModulesProForDivi();
