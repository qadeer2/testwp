<?php
/**
 * WordPress settings API
 */
if ( ! class_exists( 'DSM_Settings' ) ) :
	class DSM_Settings {
		var $licence;
		private $settings_api;

		function __construct() {

			$this->licence = new DSM_PRO_licence();
			// if ( isset( $_GET['page'] ) && ( 'dsm_license_page' === $_GET['page'] ) ) {
				add_action( 'init', array( $this, 'options_update' ), 1 );
			// }
			add_action( 'admin_notices', array( $this, 'admin_notices' ) );

			if ( ! $this->licence->licence_key_verify() ) {
				add_action( 'admin_notices', array( $this, 'admin_no_key_notices' ) );
				// add_action('network_admin_notices', array($this, 'admin_no_key_notices'));
			}

			$this->settings_api = new DSM_Settings_API();

			add_action( 'admin_init', array( $this, 'admin_init' ) );
			add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		}

		function admin_init() {

			// set the settings
			$this->settings_api->set_sections( $this->get_settings_sections() );
			$this->settings_api->set_fields( $this->get_settings_fields() );

			// initialize settings
			$this->settings_api->admin_init();

		}

		function admin_menu() {
			$dsm_plugin_menu_name = $this->settings_api->get_option( 'dsm_plugin_menu_name', 'dsm_settings_misc' );
			$dsm_plugin_menu_icon = $this->settings_api->get_option( 'dsm_plugin_menu_icon', 'dsm_settings_misc' );
			if ( '' !== $dsm_plugin_menu_name ) {
				$dsm_plugin_menu_name = $dsm_plugin_menu_name;
			} else {
				$dsm_plugin_menu_name = __( 'Divi Supreme Pro', 'dsm-supreme-modules-pro-for-divi' );
			}

			if ( '' !== $dsm_plugin_menu_icon ) {
				if ( filter_var( $dsm_plugin_menu_icon, FILTER_VALIDATE_URL ) === true ) {
					$dsm_plugin_menu_icon = esc_url( $dsm_plugin_menu_icon );
				} else {
					$dsm_plugin_menu_icon = $dsm_plugin_menu_icon;
				}
			} else {
				$dsm_plugin_menu_icon = 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyMy4xNiAyNSI+PGRlZnM+PHN0eWxlPi5jbHMtMXtpc29sYXRpb246aXNvbGF0ZTt9LmNscy0ye2ZpbGw6I2ZmZjt9LmNscy0ze2ZpbGw6IzIzMWYyMDtvcGFjaXR5OjAuMjU7bWl4LWJsZW5kLW1vZGU6bXVsdGlwbHk7fTwvc3R5bGU+PC9kZWZzPjx0aXRsZT5pY29uLTEyOHgxMjg8L3RpdGxlPjxnIGNsYXNzPSJjbHMtMSI+PGcgaWQ9IkxheWVyXzEiIGRhdGEtbmFtZT0iTGF5ZXIgMSI+PHBhdGggY2xhc3M9ImNscy0yIiBkPSJNMjkuMjYsMTIuNzVBMTIuNDgsMTIuNDgsMCwwLDAsMTcuMzMsNEgxMC40MkEzLjc1LDMuNzUsMCwwLDAsNi42Nyw3Ljc1djcuOTFhMy43NSwzLjc1LDAsMCwwLDMuNzUsMy43NWgwYTMuNzUsMy43NSwwLDAsMCwzLjc1LTMuNzVoMFYxMS40OWgzLjE0YzMsMCw1LDEuNCw1LDQuODJhNi40NCw2LjQ0LDAsMCwxLS4yMywxLjc1LDQuNTUsNC41NSwwLDAsMS00LjE2LDMuNDNIMTAuNDJhMy43NSwzLjc1LDAsMCwwLTMuNzUsMy43NWgwQTMuNzUsMy43NSwwLDAsMCwxMC40MiwyOWg3LjkxYTMuNzcsMy43NywwLDAsMCwxLjE3LS4xOUExMi41LDEyLjUsMCwwLDAsMjkuODMsMTYuNWgwQTEyLjUyLDEyLjUyLDAsMCwwLDI5LjI2LDEyLjc1WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoLTYuNjcgLTQpIi8+PHBhdGggY2xhc3M9ImNscy0yIiBkPSJNMjcuNDgsOS4yYTEyLjU1LDEyLjU1LDAsMCwwLTQuMDctMy42Myw3LjQyLDcuNDIsMCwwLDAtMi4zMi0uMzcsNi43Miw2LjcyLDAsMCwwLTYuOTIsNi4yOWgzLjE0YzMsMCw1LDEuNCw1LDQuODJhNi40NCw2LjQ0LDAsMCwxLS4yMywxLjc1LDQuNTUsNC41NSwwLDAsMS00LjE2LDMuNDMsMTIuNDksMTIuNDksMCwwLDAsOS41OC01LjI0LDYuMDUsNi4wNSwwLDAsMCwwLTdaIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtNi42NyAtNCkiLz48cGF0aCBjbGFzcz0iY2xzLTMiIGQ9Ik0yOC40LDExLjFhNS41Niw1LjU2LDAsMCwxLC4xMywxLjIyYzAsMy41My0zLjExLDYuNTMtNy40NSw3LjY2YTQuNjEsNC42MSwwLDAsMS0zLjE0LDEuNTEsMTIuNDksMTIuNDksMCwwLDAsOS41OC01LjI0QTYsNiwwLDAsMCwyOC40LDExLjFaIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtNi42NyAtNCkiLz48cGF0aCBjbGFzcz0iY2xzLTMiIGQ9Ik0yMi42Nyw1LjM3YTcuNSw3LjUsMCwwLDAtMS41OC0uMTcsNi43Miw2LjcyLDAsMCwwLTYuOTIsNi4yOWgxQTcuNjgsNy42OCwwLDAsMSwyMi42Nyw1LjM3WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoLTYuNjcgLTQpIi8+PC9nPjwvZz48L3N2Zz4=';
			}

			add_menu_page( $dsm_plugin_menu_name, $dsm_plugin_menu_name, 'manage_options', 'divi_supreme_settings', array( $this, 'plugin_page' ), $dsm_plugin_menu_icon, 99 );

			if ( ! $this->licence->licence_key_verify() ) {
				$hook_id = add_submenu_page( 'divi_supreme_settings', __( 'License', 'dsm-supreme-modules-pro-for-divi' ), __( 'License', 'dsm-supreme-modules-pro-for-divi' ), 'manage_options', 'dsm_license_page', array( $this, 'licence_form' ) );
			} else {
				$hook_id = add_submenu_page( 'divi_supreme_settings', __( 'License', 'dsm-supreme-modules-pro-for-divi' ), __( 'License', 'dsm-supreme-modules-pro-for-divi' ), 'manage_options', 'dsm_license_page', array( $this, 'licence_deactivate_form' ) );
			}

			// add_action( 'load-' . $hook_id, array( $this, 'load_dependencies' ) );
			// add_action( 'load-' . $hook_id, array( $this, 'admin_notices' ) );

			add_action( 'admin_print_styles-' . $hook_id, array( $this, 'admin_print_styles' ) );
			add_action( 'admin_print_scripts-' . $hook_id, array( $this, 'admin_print_scripts' ) );

		}

		function get_settings_sections() {
			$sections = array(
				array(
					'id'    => 'dsm_general',
					'title' => __( 'General Settings', 'dsm-supreme-modules-pro-for-divi' ),
				),
				array(
					'id'    => 'dsm_theme_builder',
					'title' => __( 'Easy Theme Builder', 'dsm-supreme-modules-pro-for-divi' ),
				),
				array(
					'id'    => 'dsm_settings_social_media',
					'title' => __( 'Social Media Settings', 'dsm-supreme-modules-pro-for-divi' ),
				),
				array(
					'id'    => 'dsm_settings_misc',
					'title' => __( 'Misc', 'dsm-supreme-modules-pro-for-divi' ),
				),
			);
			return $sections;
		}

		/**
		 * Returns all the settings fields
		 *
		 * @return array settings fields
		 */
		function get_settings_fields() {
			$settings_fields = array(
				'dsm_general'               => array(
					array(
						'name'  => 'dsm_section_subtitle',
						'class' => 'dsm-section-subtitle',
						'label' => __( 'Divi Supreme Extensions', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'  => __( 'This is where you can enable Divi Extensions.' ),
						'type'  => 'subheading',
					),
					array(
						'name'    => 'dsm_use_scheduled_content',
						'class'   => 'dsm-settings-checkbox',
						'label'   => __( 'Enable Scheduled Element on Section, Row, Columns and Modules', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'checkbox',
						'default' => 'off',
					),
					array(
						'name'    => 'dsm_use_supreme_popup',
						'class'   => 'dsm-settings-checkbox',
						'label'   => __( 'Enable Divi Popup', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'checkbox',
						'default' => 'off',
					),
					array(
						'name'    => 'dsm_use_library_widget',
						'class'   => 'dsm-settings-checkbox',
						'label'   => __( 'Enable Divi Library Widget', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'checkbox',
						'default' => 'off',
					),
					array(
						'name'    => 'dsm_use_readmore_content',
						'class'   => 'dsm-settings-checkbox',
						'label'   => __( 'Enable Divi Readmore Content', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'checkbox',
						'default' => 'off',
					),
					array(
						'name'    => 'dsm_use_shortcode',
						'class'   => 'dsm-settings-checkbox',
						'label'   => __( 'Enable Divi Library Shortcodes', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'checkbox',
						'default' => 'off',
					),
					array(
						'name'    => 'dsm_use_builder_responsive_viewer',
						'class'   => 'dsm-settings-checkbox',
						'label'   => __( 'Enable Divi Builder Responsive Viewer', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'checkbox',
						'default' => 'off',
					),
				),
				'dsm_theme_builder'         => array(
					array(
						'name'  => 'dsm_theme_builder_header',
						'label' => __( 'Theme Builder Header', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'  => __( 'Configure Theme Builder Header settings here.' ),
						'type'  => 'subheading',
					),
					array(
						'name'    => 'dsm_theme_builder_header_fixed',
						'class'   => 'dsm-settings-checkbox',
						'label'   => __( 'Enable Fixed Header', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'This will make the Divi Theme Builder Header stay fixed to the top. For developers, the fixed header CSS Class Selector is ".dsm_fixed_header"', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'checkbox',
						'default' => 'off',
					),
					array(
						'name'    => 'dsm_theme_builder_header_fixed_devices',
						'label'   => __( 'Disable On', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'This will disable the fixed header on selected devices.', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'multicheck',
						'options' => array(
							'tablet' => 'Tablet',
							'phone'  => 'Phone',
						),
					),
					array(
						'name'    => 'dsm_theme_builder_header_auto_calc',
						'class'   => 'dsm-settings-checkbox',
						'label'   => __( 'Push Body Down', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'This will calculate the Divi Theme Builder Header height automatically and apply the height to the body to prevent the first section from overlapping. This will push the first section down based on the header height. This is not needed if you have a transparent background for the header.', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'checkbox',
						'default' => 'off',
					),
					array(
						'name'              => 'dsm_theme_builder_header_start_threshold',
						'label'             => __( 'On Scroll Threshold', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'              => __( 'You can define when the header should take effect after viewport. (Default: 200)', 'dsm-supreme-modules-pro-for-divi' ),
						'type'              => 'text',
						'default'           => '200',
						'sanitize_callback' => 'sanitize_text_field',
					),
					array(
						'name'  => 'dsm_theme_builder_header_scroll_options',
						'label' => __( 'Scrolling', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'  => __( 'Here you can make changes to the element on scroll.' ),
						'type'  => 'subheading',
					),
					array(
						'name'    => 'dsm_theme_builder_header_scroll',
						'class'   => 'dsm-settings-checkbox',
						'label'   => __( 'Enable Scrolling Options', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'This will enable the scrolling elements configured below. For developers, the active scroll CSS Class Selector is ".dsm_fixed_header_scroll_active"', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'checkbox',
						'default' => 'off',
					),
					array(
						'name'    => 'dsm_theme_builder_header_first_section_background_color',
						'label'   => __( '#1 Section Background Color', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Change the background color for the first section in the Header on scroll.', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'color',
						'default' => '',
					),
					array(
						'name'    => 'dsm_theme_builder_header_second_section_background_color',
						'label'   => __( '#2 Section Background Color', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Change the background color for the second section in the Header on scroll.', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'color',
						'default' => '',
					),
					array(
						'name'    => 'dsm_theme_builder_header_show_box_shadow_scroll',
						'class'   => 'dsm-settings-checkbox',
						'label'   => __( 'Show Box Shadow on Scroll', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'This will hide the box shadow on page load and show on shrink threshold.', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'checkbox',
						'default' => 'off',
					),
					array(
						'name'  => 'dsm_theme_builder_header_shrink_options',
						'label' => __( 'Shrink', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'  => __( 'Here you can make changes to the shrink elements.' ),
						'type'  => 'subheading',
					),
					array(
						'name'    => 'dsm_theme_builder_header_shrink',
						'class'   => 'dsm-settings-checkbox',
						'label'   => __( 'Enable Shrink on Scroll', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'This will shrink your Divi Theme Builder Header and stays fixed when you scroll. For developers, the active shrink CSS Class Selector is ".dsm_fixed_header_shrink_active"', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'checkbox',
						'default' => 'off',
					),
					/*
					array(
						'name'    => 'dsm_theme_builder_header_shrink_devices',
						'label'   => __( 'Disable On', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'This will disable the shrink effect on selected devices.', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'multicheck',
						'options' => array(
							'tablet'  => 'Tablet',
							'phone'   => 'Phone',
						),
					),*/
					array(
						'name'              => 'dsm_theme_builder_header_section_padding',
						'label'             => __( 'Shrink Section Padding (px)', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'              => __( 'If Shrink on Scroll is enabled, you can define a custom top and bottom padding in pixel(px) value for the section when shrinked.', 'dsm-supreme-modules-pro-for-divi' ),
						'type'              => 'text',
						'default'           => '',
						'sanitize_callback' => 'sanitize_text_field',
					),
					array(
						'name'              => 'dsm_theme_builder_header_row_padding',
						'label'             => __( 'Shrink Row Padding (px)', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'              => __( 'If Shrink on Scroll is enabled, you can define a custom top and bottom padding in pixel(px) value for the row when shrinked.', 'dsm-supreme-modules-pro-for-divi' ),
						'type'              => 'text',
						'default'           => '',
						'sanitize_callback' => 'sanitize_text_field',
					),
					array(
						'name'              => 'dsm_theme_builder_header_menu_padding',
						'label'             => __( 'Shrink Menu Module Padding (px)', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'              => __( 'If Shrink on Scroll is enabled, you can define a custom top and bottom padding in pixel(px) value for the menu module when shrinked.', 'dsm-supreme-modules-pro-for-divi' ),
						'type'              => 'text',
						'default'           => '',
						'sanitize_callback' => 'sanitize_text_field',
					),
					array(
						'name'              => 'dsm_theme_builder_header_shrink_image',
						'label'             => __( 'Shrink Image (%)', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'              => __( 'If Shrink on Scroll is enabled, you can define a max-width in percentage(%) value when shrinked. (Default: 70)', 'dsm-supreme-modules-pro-for-divi' ),
						'type'              => 'text',
						'default'           => '70',
						'sanitize_callback' => 'sanitize_text_field',
					),
					array(
						'name'    => 'dsm_theme_builder_header_shrink_logo',
						'label'   => __( 'Switch Logo Image on Shrink', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'If Shrink on Scroll is enabled, you can change the logo image when shrinked.', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'file',
						'default' => '',
						'options' => array(
							'button_label' => 'Choose Image',
						),
					),
				),
				'dsm_settings_social_media' => array(
					array(
						'name'  => 'dsm_section_subtitle',
						'class' => 'dsm-section-subtitle',
						'label' => __( 'Social Media Settings', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'  => __( 'Configure Social Media settings here.' ),
						'type'  => 'subheading',
					),
					'dsm_facebook_app_id'    => array(
						'name'              => 'dsm_facebook_app_id',
						'label'             => __( 'Facebook APP ID', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'              => sprintf(
							'Enter the Facebook App ID. You can go to <a href="%1$s" target="_blank">Facebook Developer</a> and click on Create New App to get one.',
							esc_url( 'https://developers.facebook.com/apps/' )
						),
						'default'           => ' ',
						'type'              => 'text',
						'sanitize_callback' => 'sanitize_text_field',
					),
					'dsm_facebook_site_lang' => array(
						'name'    => 'dsm_facebook_site_lang',
						'class'   => 'dsm-settings-checkbox',
						'label'   => __( 'Facebook Language', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Check this box if you would like your Divi Facebook Modules to use your WordPress Site Language instead of the default English(US).', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'checkbox',
						'default' => 'off',
					),
				),
				'dsm_settings_misc'         => array(
					'dsm_uninstall_on_delete'    => array(
						'name'  => 'dsm_uninstall_on_delete',
						'class' => 'dsm-settings-checkbox',
						'label' => __( 'Remove Data on Uninstall?', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'  => __( 'Check this box if you would like Divi Supreme to completely remove all of its data when the plugin is deleted.', 'dsm-supreme-modules-pro-for-divi' ),
						'type'  => 'checkbox',
					),
					'dsm_allow_mime_json_upload' => array(
						'name'    => 'dsm_allow_mime_json_upload',
						'class'   => 'dsm-settings-checkbox',
						'label'   => __( 'Allow JSON file upload', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Check this box if you would like allow JSON file through WordPress Media Uploader.', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					'dsm_allow_mime_svg_upload'  => array(
						'name'    => 'dsm_allow_mime_svg_upload',
						'class'   => 'dsm-settings-checkbox',
						'label'   => __( 'Allow SVG file upload', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Check this box if you would like allow SVG file through WordPress Media Uploader.', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'checkbox',
						'default' => 'off',
					),
					'dsm_plugin_menu_name'       => array(
						'name'              => 'dsm_plugin_menu_name',
						'label'             => __( 'Menu Name', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'              => __( 'Change the menu name of Divi Supreme Pro.', 'dsm-supreme-modules-pro-for-divi' ),
						'type'              => 'text',
						'placeholder'       => __( 'Divi Supreme Pro', 'dsm-supreme-modules-pro-for-divi' ),
						'sanitize_callback' => 'sanitize_text_field',
					),
					'dsm_plugin_menu_icon'       => array(
						'name'              => 'dsm_plugin_menu_icon',
						'label'             => __( 'Menu Icon', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'              => sprintf(
							'Image URL or <a href="%1$s" target="_blank">%2$s</a> to use for icon. Custom image should be 20px by 20px.',
							esc_url( 'https://developer.wordpress.org/resource/dashicons/' ),
							esc_html__( 'Dashicon class name', 'dsm-supreme-modules-pro-for-divi' )
						),
						'type'              => 'text',
						'placeholder'       => __( 'Full URL for icon or Dashicon class', 'dsm-supreme-modules-pro-for-divi' ),
						'sanitize_callback' => 'sanitize_text_field',
					),
				),
			);

			return $settings_fields;
		}

		function plugin_page() {
			echo '<div class="wrap">';
			$this->settings_api->show_navigation();
			$this->settings_api->show_forms();
			echo '</div>';
		}

		/**
		 * Get all the pages
		 *
		 * @return array page names with key value pairs
		 */
		function get_pages() {
			$pages         = get_pages();
			$pages_options = array();
			if ( $pages ) {
				foreach ( $pages as $page ) {
					$pages_options[ $page->ID ] = $page->post_title;
				}
			}

			return $pages_options;
		}

		// Start of license.
		function options_interface() {
			if ( ! $this->licence->licence_key_verify() && ! is_multisite() ) {
				$this->licence_form();
				return;
			}

			/*
			if(!$this->licence->licence_key_verify() && is_multisite()) {
				$this->licence_multisite_require_nottice();
				return;
			}*/
		}

		function options_update() {
			if ( isset( $_POST['dsm_pro_license_form_submit'] ) && isset( $_POST['dsm_pro_license'] ) && wp_verify_nonce( sanitize_key( $_POST['dsm_pro_license'] ), 'dsm_pro_license' ) ) {
				$this->licence_form_submit();
				return;
			}
		}

		function load_dependencies() {}

		function admin_notices() {
			global $slt_form_submit_messages;

			if ( ! is_array( $slt_form_submit_messages ) ) {
				return;
			}

			if ( count( $slt_form_submit_messages ) > 0 ) {
				foreach ( $slt_form_submit_messages  as  $message ) {
					echo "<div class='" . esc_attr( $message['type'] ) . " notice-warning notice fade'><p>" . esc_html( $message['text'] ) . '</p></div>';
				}
			}

		}

		function admin_print_styles(){}

		function admin_print_scripts(){}


		function admin_no_key_notices() {
			if ( ! current_user_can( 'manage_options' ) ) {
				return;
			}

			if ( ! DSM_NOTICE::is_admin_notice_active( 'disable-done-notice-forever' ) ) {
				return;
			}

			$screen = get_current_screen();

			/*
			if(is_multisite())
				{
					if(isset($screen->id) && $screen->id    ==  'settings_page_woo-ms-options-network')
						return;
					?><div data-dismissible="disable-done-notice-forever" class="notice notice-info is-dismissible"><p><?php _e( "Divi Supreme Pro: Please enter your", 'wooslt' ) ?> <a href="<?php echo network_admin_url() ?>settings.php?page=dsm_license_page_network"><?php _e( "Licence key", 'dsm-supreme-modules-pro-for-divi' ) ?></a> to get regular update.</p></div><?php
				}
				else {
			*/
			if ( isset( $screen->id ) && 'settings_page_dsm_license_page' === $screen->id ) {
				return;
			}
			?><div data-dismissible="disable-done-notice-forever" class="notice notice-info is-dismissible"><p><?php esc_html_e( 'Divi Supreme Pro: Please enter your', 'dsm-supreme-modules-pro-for-divi' ); ?> <a href="admin.php?page=dsm_license_page"><?php esc_html_e( 'Licence key', 'dsm-supreme-modules-pro-for-divi' ); ?></a> to get regular update.</p></div>
					<?php
					/*}*/
		}

		function licence_form_submit() {
			global $slt_form_submit_messages;

			// check for de-activation.
			if ( isset( $_POST['dsm_pro_license_form_submit'] ) && isset( $_POST['dsm_pro_licence_deactivate'] ) && isset( $_POST['dsm_pro_license'] ) && wp_verify_nonce( sanitize_key( $_POST['dsm_pro_license'] ), 'dsm_pro_license' ) ) {
				global $slt_form_submit_messages;

				$license_data = get_site_option( 'dsm_pro_license' );
				$license_key  = $license_data['key'];

				// build the request query.
				$args        = array(
					'woo_sl_action'     => 'deactivate',
					'licence_key'       => $license_key,
					'product_unique_id' => DSM_PRODUCT_ID,
					'domain'            => DSM_PRO_INSTANCE,
				);
				$request_uri = DSM_PRO_APP_API_URL . '?' . http_build_query( $args, '', '&' );
				$data        = wp_remote_get( $request_uri );

				if ( is_wp_error( $data ) || 200 !== $data['response']['code'] ) {
					$slt_form_submit_messages[] = array(
						'type' => 'error',
						'text' => __( 'There was a problem connecting to ', 'dsm-supreme-modules-pro-for-divi' ) . DSM_PRO_APP_API_URL,
					);

					return;
				}

				$response_block = json_decode( $data['body'] );

				// retrieve the last message within the $response_block.
				$response_block = $response_block[ count( $response_block ) - 1 ];
				$response       = $response_block->message;

				if ( isset( $response_block->status ) ) {
					if ( 'success' === $response_block->status && 's201' === $response_block->status_code ) {
							// the license is active and the software is active.
							$slt_form_submit_messages[] = array(
								'type' => 'updated',
								'text' => $response_block->message,
							);

							$license_data = get_site_option( 'dsm_pro_license' );

							// save the license.
							$license_data['key']         = '';
							$license_data['last_check']  = time();
							$license_data['expiry_date'] = '';

							update_site_option( 'dsm_pro_license', $license_data );
					} else { // if message code is e104  force de-activation.
						if ( 'e002' === $response_block->status_code || 'e104' === $response_block->status_code || 'e211' === $response_block->status_code || 'e110' === $response_block->status_code ) {
							$license_data = get_site_option( 'dsm_pro_license' );
							// save the license.
							$license_data['key']         = '';
							$license_data['last_check']  = time();
							$license_data['expiry_date'] = '';

							update_site_option( 'dsm_pro_license', $license_data );

							$slt_form_submit_messages[] = array(
								'type' => 'error',
								'text' => __( 'There was a problem deactivating the licence: ', 'dsm-supreme-modules-pro-for-divi' ) . $response_block->message,
							);

						} else {
							$slt_form_submit_messages[] = array(
								'type' => 'error',
								'text' => __( 'There was a problem deactivating the licence: ', 'dsm-supreme-modules-pro-for-divi' ) . $response_block->message,
							);
							return;
						}
					}
				} else {
					$slt_form_submit_messages[] = array(
						'type' => 'error',
						'text' => __( 'There was a problem with the data block received from ', 'dsm-supreme-modules-pro-for-divi' ) . DSM_PRO_APP_API_URL,
					);
					return;
				}

				/*
				// redirect
				$current_url = 'http' . ( isset( $_SERVER['HTTPS'] ) ? 's' : '' ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

				wp_redirect( $current_url );
				die();
				*/

			}
			if ( isset( $_POST['dsm_pro_license_form_submit'] ) && isset( $_POST['dsm_pro_license_activate'] ) && isset( $_POST['dsm_pro_license'] ) && wp_verify_nonce( sanitize_key( $_POST['dsm_pro_license'] ), 'dsm_pro_license' ) ) {

				$license_key = isset( $_POST['license_key'] ) ? trim( sanitize_key( $_POST['license_key'] ) ) : '';

				if ( '' === $license_key ) {
					$slt_form_submit_messages[] = array(
						'type' => 'error',
						'text' => __( "Licence key can't be empty", 'dsm-supreme-modules-pro-for-divi' ),
					);
					return;
				}

				// build the request query.
				$args        = array(
					'woo_sl_action'     => 'activate',
					'licence_key'       => $license_key,
					'product_unique_id' => DSM_PRODUCT_ID,
					'domain'            => DSM_PRO_INSTANCE,
				);
				$request_uri = DSM_PRO_APP_API_URL . '?' . http_build_query( $args, '', '&' );
				$data        = wp_remote_get( $request_uri );

				if ( is_wp_error( $data ) || 200 !== $data['response']['code'] ) {
					$slt_form_submit_messages[] = array(
						'type' => 'error',
						'text' => __( 'There was a problem connecting to ', 'dsm-supreme-modules-pro-for-divi' ) . DSM_PRO_APP_API_URL,
					);
					return;
				}

				$response_block = json_decode( $data['body'] );
				// retrieve the last message within the $response_block.
				$response_block = $response_block[ count( $response_block ) - 1 ];
				$response       = $response_block->message;

				if ( isset( $response_block->status ) ) {
					if ( 'success' === $response_block->status && ( 's100' === $response_block->status_code || 's101' === $response_block->status_code ) ) {
							// the license is active and the software is active.
							$slt_form_submit_messages[] = array(
								'type' => 'updated',
								'text' => $response_block->message,
							);

							$license_data = get_site_option( 'dsm_pro_license' );
							// save the license.
							$license_data['key']         = $license_key;
							$license_data['last_check']  = time();
							$license_data['expiry_date'] = $response_block->licence_expire;

							update_site_option( 'dsm_pro_license', $license_data );
					} else {
						$slt_form_submit_messages[] = array(
							'type' => 'error',
							'text' => __( 'There was a problem activating the licence: ', 'dsm-supreme-modules-pro-for-divi' ) . $response_block->message,
						);
						return;
					}
				} else {
					$slt_form_submit_messages[] = array(
						'type' => 'error',
						'text' => __( 'There was a problem with the data block received from ', 'dsm-supreme-modules-pro-for-divi' ) . DSM_PRO_APP_API_URL,
					);
					return;
				}

				/*
				// redirect
				$current_url = 'http' . ( isset( $_SERVER['HTTPS'] ) ? 's' : '' ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

				wp_redirect( $current_url );
				die();
				*/

			}

		}

		function licence_form() {
			?>
				<div class="wrap">
					<h2><?php esc_html_e( 'Divi Supreme Pro License', 'dsm-supreme-modules-pro-for-divi' ); ?></h2>
					<form id="form_data" name="form" method="post">
						<div class="postbox" style="padding: 0px 25px 25px; margin-top: 10px;">
							<?php wp_nonce_field( 'dsm_pro_license', 'dsm_pro_license' ); ?>
							<input type="hidden" name="dsm_pro_license_form_submit" value="true" />
							<input type="hidden" name="dsm_pro_license_activate" value="true" />
							<table class="form-table">
								<tbody>
									<tr>
										<th scope="row"><label for="blogname">License</label></th>
										<td><input type="password" value="" name="license_key" class="text-input"></td>
									</tr>
								</tbody>
							</table>
							<div class="explain"><?php esc_html_e( 'If you forgotten/lost your the license key, you can always retrieve it from your ', 'dsm-supreme-modules-pro-for-divi' ); ?> <a href="https://divisupreme.com/my-account/" target="_blank"><?php esc_html_e( 'Divi Supreme Account', 'dsm-supreme-modules-pro-for-divi' ); ?></a>. <?php esc_html_e( 'More license keys can be generate from your account.', 'dsm-supreme-modules-pro-for-divi' ); ?></a> 
							</div>
						</div>                        
						<p class="submit">
							<input type="submit" name="Submit" class="button-primary dsm-admin-button" value="<?php esc_html_e( 'Activate', 'dsm-supreme-modules-pro-for-divi' ); ?>">
						</p>
					</form> 
				</div> 
			<?php

		}

		function licence_deactivate_form() {
			$license_data       = get_site_option( 'dsm_pro_license' );
			$licese_data_key    = esc_attr( $license_data['key'] );
			$licese_data_expiry = ! empty( $license_data['expiry_date'] ) ? new DateTime( $license_data['expiry_date'] ) : '';
			$licese_expiry      = '' !== $licese_data_expiry ? $licese_data_expiry->format( 'd F Y' ) : __( 'Reactivate license key to get latest expiry date.', 'dsm-supreme-modules-pro-for-divi' );
			/*
			if(is_multisite())
				{
					?>
						<div class="wrap">
							<h2><?php _e( "Divi Supreme Pro License", 'dsm-supreme-modules-pro-for-divi' ) ?></h2>
					<?php
				}
			*/
			?>
			<div class="notice notice-success"><p><?php esc_html_e( 'Your Divi Supreme Pro license has been activated.', 'dsm-supreme-modules-pro-for-divi' ); ?></p></div>
			<div class="wrap"> 
				<h2><?php esc_html_e( 'Divi Supreme Pro License', 'dsm-supreme-modules-pro-for-divi' ); ?></h2>
				<form id="form_data" name="form" method="post">    
					<div class="postbox" style="padding: 0px 25px 25px;">
					<?php wp_nonce_field( 'dsm_pro_license', 'dsm_pro_license' ); ?>
					<input type="hidden" name="dsm_pro_license_form_submit" value="true" />
					<input type="hidden" name="dsm_pro_licence_deactivate" value="true" />
					<table class="form-table">
						<tbody>
							<tr>
								<th scope="row"><label for="blogname">License Key</label></th>
								<td><?php if ( $this->licence->is_local_instance() ) { ?>
									Local instance, no key applied.
									<?php
									} else {
										?>
									<b><?php echo esc_attr( substr( $licese_data_key, 0, 20 ) ); ?>-xxxxxxxx-xxxxxxxx</b>
									<?php } ?></td>
								<th scope="row"><label for="expiry_date">Expiry Date</label></th>
								<td> <?php echo esc_attr( $licese_expiry ); ?></td>
							</tr>
						</tbody>
					</table>
						<div class="explain"><?php esc_html_e( 'You can generate more keys from your ', 'dsm-supreme-modules-pro-for-divi' ); ?> <a href="https://divisupreme.com/my-account/" target="_blank">Divi Supreme Account</a> 
						</div>
					</div>
					<a class="button-secondary dsm-admin-button-cancel" title="Deactivate" href="javascript: void(0)" onclick="jQuery(this).closest('form').submit();">Deactivate</a>
				</form>
			</div>
				<?php
				/*
				if(is_multisite()) {
				?>
				</div>
				<?php
				}*/
		}

		/*
		function licence_multisite_require_nottice() {
		?>
			<div class="wrap">
				<div id="icon-settings" class="icon32"></div>
				<h2><?php _e( "General Settings", 'dsm-supreme-modules-pro-for-divi' ) ?></h2>

				<h2 class="subtitle"><?php _e( "Software License", 'dsm-supreme-modules-pro-for-divi' ) ?></h2>
				<div id="form_data">
					<div class="postbox">
						<div class="section section-text ">
							<h4 class="heading"><?php _e( "License Key Required", 'dsm-supreme-modules-pro-for-divi' ) ?>!</h4>
							<div class="option">
								<div class="explain"><?php _e( "Enter the License Key you got when bought this product. If you lost the key, you can always retrieve it from", 'dsm-supreme-modules-pro-for-divi' ) ?> <a href="http://www.nsp-code.com/premium-plugins/my-account/" target="_blank"><?php _e( "My Account", 'dsm-supreme-modules-pro-for-divi' ) ?></a><br />
								<?php _e( "More keys can be generate from", 'dsm-supreme-modules-pro-for-divi' ) ?> <a href="https://divisupreme.com/my-account/" target="_blank"><?php _e( "My Account", 'dsm-supreme-modules-pro-for-divi' ) ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php

		}*/
		// End of License.
	}

endif;
new DSM_Settings();
