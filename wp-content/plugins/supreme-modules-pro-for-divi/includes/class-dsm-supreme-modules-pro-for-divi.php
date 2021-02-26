<?php
if ( ! function_exists( 'is_plugin_active' ) ) {
	require_once ABSPATH . '/wp-admin/includes/plugin.php';
}

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://divisupreme.com
 * @since      1.0.0
 *
 * @package    Dsm_Supreme_Modules_Pro_For_Divi
 * @subpackage Dsm_Supreme_Modules_Pro_For_Divi/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Dsm_Supreme_Modules_Pro_For_Divi
 * @subpackage Dsm_Supreme_Modules_Pro_For_Divi/includes
 * @author     Divi Supreme <hello@divisupreme.com>
 */
class Dsm_Supreme_Modules_Pro_For_Divi {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Dsm_Supreme_Modules_Pro_For_Divi_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'DSM_PRO_VERSION' ) ) {
			$this->version = DSM_PRO_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'dsm-supreme-modules-pro-for-divi';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Dsm_Supreme_Modules_Pro_For_Divi_Loader. Orchestrates the hooks of the plugin.
	 * - Dsm_Supreme_Modules_Pro_For_Divi_i18n. Defines internationalization functionality.
	 * - Dsm_Supreme_Modules_Pro_For_Divi_Admin. Defines all hooks for the admin area.
	 * - Dsm_Supreme_Modules_Pro_For_Divi_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-dsm-supreme-modules-pro-for-divi-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-dsm-supreme-modules-pro-for-divi-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-dsm-supreme-modules-pro-for-divi-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-dsm-supreme-modules-pro-for-divi-public.php';

		/**
		 * The class responsible for defining all actions that occur in Divi Supreme
		 * side of the site.
		 */
		include_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/license/class.dsm-license-load.php';
		include_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/license/class.licence.php';
		include_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/license/class.updater.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class.settings-api.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class.page-settings.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/persist-admin-notices-dismissal/persist-admin-notices-dismissal.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-dsm-supreme-modules-pro-for-divi-installer.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/SupremeModulesLoader.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/widgets/class-dsm-widget-library.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-dsm-json-handler.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-dsm-svg-handler.php';

		$this->loader = new Dsm_Supreme_Modules_Pro_For_Divi_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Dsm_Supreme_Modules_Pro_For_Divi_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Dsm_Supreme_Modules_Pro_For_Divi_i18n();

		$this->loader->add_action( 'init', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Dsm_Supreme_Modules_Pro_For_Divi_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

		// Load License.
		global $dsm_license_load;
		$dsm_license_load = new DSM_LICENSE_LOAD();
		// Load page settings.
		$this->settings_api = new DSM_Settings_API();

		// Plugin Admin.
		add_action( 'divi_extensions_init', array( $this, 'dsm_initialize_extension' ) );
		add_action( 'admin_init', array( 'DSM_NOTICE', 'init' ) );
		add_filter( 'admin_footer_text', array( $this, 'dsm_admin_footer_text' ) );

		// JSON Handler.
		if ( 'on' === $this->settings_api->get_option( 'dsm_allow_mime_json_upload', 'dsm_settings_misc' ) || '' === $this->settings_api->get_option( 'dsm_allow_mime_json_upload', 'dsm_settings_misc' ) ) {
			new DSM_JSON_Handler();
		}

		// SVG Handler.
		if ( 'on' === $this->settings_api->get_option( 'dsm_allow_mime_svg_upload', 'dsm_settings_misc' ) ) {
			new DSM_SVG_Handler();
		}

		// Plugin links.
		add_filter( 'plugin_action_links', array( $this, 'dsm_add_action_plugin' ), 10, 5 );
		add_filter( 'plugin_row_meta', array( $this, 'dsm_plugin_row_meta' ), 10, 2 );

		/*
		Divi Template.
		add_action( 'init', array( $this, 'dsm_flush_rewrite_rules' ), 20 );
		if ( $this->settings_api->get_option( 'dsm_use_header_footer', 'dsm_general' ) === 'on' ) {
			add_action( 'init', array( $this, 'dsm_header_footer_posttypes' ), 0 );
			add_filter( 'single_template', array( $this, 'dsm_load_headerfooter_template' ) );
			add_filter( 'post_class', array( $this, 'dsm_load_headerfooter_post_class' ), 11 );
			add_action( 'add_meta_boxes', array( $this, 'dsm_add_header_footer_meta_box' ), 11 );
			add_action( 'save_post', array( $this, 'dsm_save_header_footer_meta_box' ), 10, 3 );
			add_action( 'et_after_main_content', array( $this, 'dsm_custom_footer' ) );
			add_filter( 'template_include', array( $this, 'dsm_redirect_template' ) );
			add_action( 'wp_print_scripts', array( $this, 'dsm_custom_footer_settings' ), 30 );
			add_action( 'admin_notices', array( $this, 'dsm_header_footer_admin_notice' ) );
			add_action( 'wp_print_scripts', array( $this, 'dsm_custom_top_header' ), 25 );
			add_filter( 'body_class', array( $this, 'dsm_header_footer_top_header' ) );
			add_action( 'et_html_main_header', array( $this, 'dsm_custom_header' ) );
			add_filter( 'manage_edit-dsm_header_footer_columns', array( $this, 'dsm_divi_template_post_columns_header' ) );
			add_action( 'manage_dsm_header_footer_posts_custom_column', array( $this, 'dsm_divi_template_post_columns_content' ) );
		}
		*/

		// Scheduled Content.
		if ( 'on' === $this->settings_api->get_option( 'dsm_use_scheduled_content', 'dsm_general' ) ) {
			$this->dsm_add_scheduled_content_modules();
			add_filter( 'et_pb_all_fields_unprocessed_et_pb_section', array( $this, 'dsm_add_section_setting' ) );
			add_filter( 'et_module_shortcode_output', array( $this, 'output_section' ), 10, 3 );
			add_filter( 'et_pb_all_fields_unprocessed_et_pb_row', array( $this, 'dsm_add_row_setting' ) );
			add_filter( 'et_module_shortcode_output', array( $this, 'output_row' ), 10, 3 );
			add_filter( 'et_pb_all_fields_unprocessed_et_pb_column', array( $this, 'dsm_add_column_setting' ) );
			add_filter( 'et_module_shortcode_output', array( $this, 'output_column' ), 10, 3 );
			add_filter( 'et_module_shortcode_output', array( $this, 'output_modules' ), 10, 3 );
		}

		// Popup.
		if ( 'on' === $this->settings_api->get_option( 'dsm_use_supreme_popup', 'dsm_general' ) ) {
			$this->dsm_add_popup_modules();
			add_filter( 'et_module_shortcode_output', array( $this, 'output_modules_popup' ), 10, 3 );
		}

		// Read More.
		if ( 'on' === $this->settings_api->get_option( 'dsm_use_readmore_content', 'dsm_general' ) ) {
			$this->dsm_add_readmore_modules();
			add_filter( 'et_module_shortcode_output', array( $this, 'output_modules_readmore' ), 10, 3 );
		}

		// Widget Library dsm_widget_library.
		if ( 'on' === $this->settings_api->get_option( 'dsm_use_library_widget', 'dsm_general' ) ) {
			add_action(
				'widgets_init',
				function() {
					register_widget( 'dsm_widget_library' );
				}
			);
		}

		// Divi Theme Builder.
		if ( 'on' === $this->settings_api->get_option( 'dsm_theme_builder_header_fixed', 'dsm_theme_builder' ) ) {
			add_filter( 'body_class', array( $this, 'dsm_theme_builder_header_css_classes' ) );
		}

		// Gallery.
		add_filter( 'attachment_fields_to_edit', array( $this, 'dsm_attachment_fields_to_edit' ), 10, 2 );
		add_filter( 'attachment_fields_to_save', array( $this, 'dsm_attachment_fields_to_save' ), 10, 2 );

		// ContactForm7.
		add_filter( 'et_builder_load_actions', array( $this, 'dsm_et_builder_load_cf7' ) );
		add_action( 'wp_ajax_nopriv_dsm_load_cf7_library', array( $this, 'dsm_load_cf7_library' ) );
		add_action( 'wp_ajax_dsm_load_cf7_library', array( $this, 'dsm_load_cf7_library' ) );
		if ( class_exists( 'WPCF7' ) ) {
			remove_action( 'wpcf7_init', 'wpcf7_add_shortcode_submit', 20 );
			add_action( 'wpcf7_init', array( $this, 'dsm_wpcf7_add_form_tag_submit' ) );
			remove_action( 'wpcf7_init', 'wpcf7_add_form_tag_select', 20 );
			add_action( 'wpcf7_init', array( $this, 'dsm_wpcf7_add_form_tag_select' ) );
		}

		// Caldera.
		add_filter( 'et_builder_load_actions', array( $this, 'dsm_et_builder_load_caldera_forms' ) );
		add_action( 'wp_ajax_nopriv_dsm_load_caldera_forms', array( $this, 'dsm_load_caldera_forms' ) );
		add_action( 'wp_ajax_dsm_load_caldera_forms', array( $this, 'dsm_load_caldera_forms' ) );

		// Divi shortcode.
		if ( ! defined( 'DSM_SHORTCODE' ) ) {
			define( 'DSM_SHORTCODE', 'divi_shortcode' );
		}
		add_shortcode( DSM_SHORTCODE, array( $this, 'dsm_divi_shortcode' ) );
		if ( 'on' === $this->settings_api->get_option( 'dsm_use_shortcode', 'dsm_general' ) ) {
			add_filter( 'manage_edit-et_pb_layout_columns', array( $this, 'dsm_divi_shortcode_post_columns_header' ) );
			add_action( 'manage_et_pb_layout_posts_custom_column', array( $this, 'dsm_divi_shortcode_post_columns_content' ) );
		}
		// Sync or Defer script.
		add_filter( 'script_loader_tag', array( $this, 'add_async_defer_attribute' ), 10, 2 );
	}

	/**
	 * Add sync or defer to registered script
	 * of the plugin.
	 *
	 * @since    2.6.2
	 * @access   public
	 */
	public function add_async_defer_attribute( $tag, $handle ) {
		$async_scripts = array( 'dsm-facebook' );
		if ( in_array( $handle, $async_scripts ) ) {
			return str_replace( ' src', ' async defer src', $tag );
		}
		return $tag;
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Dsm_Supreme_Modules_Pro_For_Divi_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Dsm_Supreme_Modules_Pro_For_Divi_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

	/**
	 * Creates the extension's main class instance.
	 *
	 * @since 1.0.0
	 */
	public function dsm_initialize_extension() {
		require_once plugin_dir_path( __FILE__ ) . 'SupremeModulesProForDivi.php';
	}

	/**
	 * Flush Rules for Divi Template.
	 *
	 * @since 1.0.0
	 */
	public function dsm_flush_rewrite_rules() {
		if ( get_option( 'dsm_flush_rewrite_rules_flag' ) ) {
			flush_rewrite_rules();
			delete_option( 'dsm_flush_rewrite_rules_flag' );
		}
	}

	/**
	 * Creates the plugin action links.
	 *
	 * @since 1.0.0
	 */
	public function dsm_add_action_plugin( $actions, $plugin_file ) {
		static $plugin;

		if ( ! isset( $plugin ) ) {
			$plugin = 'supreme-modules-pro-for-divi/supreme-modules-pro-for-divi.php';
		}
		if ( $plugin === $plugin_file ) {
			$settings = array( 'settings' => '<a href="' . esc_url( get_admin_url( null, 'admin.php?page=divi_supreme_settings' ) ) . '">' . __( 'Settings', 'dsm-supreme-modules-pro-for-divi' ) . '</a>' );
			$license  = array( 'license' => '<a href="' . esc_url( get_admin_url( null, 'admin.php?page=dsm_license_page' ) ) . '">' . __( 'License', 'dsm-supreme-modules-pro-for-divi' ) . '</a>' );

			$actions = array_merge( $license, $actions );
			$actions = array_merge( $settings, $actions );

		}
		return $actions;
	}

	/**
	 * Creates the Divi Footer Admin.
	 *
	 * @since 1.0.0
	 */
	public function dsm_plugin_row_meta( $links, $file ) {
		if ( 'supreme-modules-pro-for-divi/supreme-modules-pro-for-divi.php' === $file ) {
			$row_meta = array(
				'docs'    => '<a href="' . esc_url( 'https://docs.divisupreme.com/' ) . '" target="_blank" aria-label="' . esc_attr__( 'Divi Supreme Documentation', 'dsm-supreme-modules-pro-for-divi' ) . '">' . esc_html__( 'Documentation', 'dsm-supreme-modules-pro-for-divi' ) . '</a>',
				'support' => '<a href="' . esc_url( 'https://divisupreme.com/contact/' ) . '" target="_blank" aria-label="' . esc_attr__( 'Get Support', 'dsm-supreme-modules-pro-for-divi' ) . '">' . esc_html__( 'Get Support', 'dsm-supreme-modules-pro-for-divi' ) . '</a>',
			);
			return array_merge( $links, $row_meta );
		}
		return (array) $links;
	}

	public function dsm_admin_footer_text( $footer_text ) {
		$current_screen                 = get_current_screen();
		$is_divi_supreme_screen         = ( $current_screen && false !== strpos( $current_screen->id, 'toplevel_page_divi_supreme_settings' ) );
		$is_divi_supreme_screen_license = ( 'divi-supreme-pro_page_dsm_license_page' === $current_screen->id );

		if ( $is_divi_supreme_screen || $is_divi_supreme_screen_license ) {
			$footer_text = sprintf(
				/* translators: 1: DiviSupreme 2:: five stars */
				__( 'If you like %1$s please leave us a %2$s rating. A huge thanks in advance!', 'dsm-supreme-modules-pro-for-divi' ),
				sprintf( '<strong>%s</strong>', esc_html__( 'Divi Supreme', 'dsm-supreme-modules-pro-for-divi' ) ),
				'<a href="https://wordpress.org/support/plugin/supreme-modules-for-divi/reviews/?rate=5#new-post" class="dsm-rating-link" aria-label="' . esc_attr__( 'five star', 'dsm-supreme-modules-pro-for-divi' ) . '" data-rated="' . esc_attr__( 'Thanks :)', 'dsm-supreme-modules-pro-for-divi' ) . '">&#9733;&#9733;&#9733;&#9733;&#9733;</a>'
			);
		}

		return $footer_text;
	}
	public function dsm_admin_load_enqueue( $hook_suffix ) {
		if ( in_array( $hook_suffix, array( 'post.php', 'post-new.php' ) ) ) {
			$screen = get_current_screen();

			if ( is_object( $screen ) && 'dsm_header_footer' === $screen->post_type ) {
				wp_enqueue_script( 'dsm-admin-js', plugins_url( 'admin/js/dsm-admin.js', dirname( __FILE__ ) ) );
			}
		}
	}

	/**
	 * Shortcode Empty Paragraph fix
	 *
	 * @since 1.0.0
	 */
	public function dsm_fix_shortcodes( $content ) {
		$array   = array(
			'<p>['    => '[',
			']</p>'   => ']',
			']<br />' => ']',
		);
		$content = strtr( $content, $array );
		return $content;
	}

	/**
	 * Creates the Divi Supreme Shortcodes.
	 *
	 * @since 1.0.0
	 */
	public function dsm_divi_shortcode( $divi_shortcode = array() ) {
		if ( empty( $divi_shortcode['id'] ) ) {
			return '';
		}
		return do_shortcode( '[et_pb_section global_module="' . $divi_shortcode['id'] . '"][/et_pb_section]' );
	}
	public function dsm_divi_shortcode_post_columns_header( $columns ) {
		$columns['shortcode'] = __( 'Shortcode', 'dsm-supreme-modules-pro-for-divi' );
		return $columns;
	}
	public function dsm_divi_shortcode_post_columns_content( $column_name ) {
		global $post;
		switch ( $column_name ) {
			case 'shortcode':
				$shortcode = sprintf( '[%s id="%d"]', DSM_SHORTCODE, $post->ID );
				printf( '<input class="dsm-shortcode-input" type="text" readonly onfocus="this.select()" value="%s" style="width:100%%" />', esc_attr( $shortcode ) );
				break;
		}
	}

	/**
	 * Creates the Divi Supreme Read More
	 *
	 * @since 1.0.0
	 */
	public function dsm_add_readmore_modules() {
		$dsm_readmore_divi_modules = dsm_load_readme_divi_modules();
		foreach ( $dsm_readmore_divi_modules as $module ) {
			if ( 'none' !== $module ) {
				$filter = 'et_pb_all_fields_unprocessed_' . $module . '';
				add_filter( $filter, array( $this, 'dsm_add_readmore_modules_setting' ) );
			}
		}
	}
	public function dsm_add_readmore_modules_setting( $fields_unprocessed ) {
		$fields = array();

		$fields['dsm_modules_readmore'] = array(
			'label'            => esc_html__( 'Use Read More', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'option_category'  => 'configuration',
			'options'          => array(
				'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'default'          => 'off',
			'default_on_front' => 'off',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'description'      => esc_html__( 'Here you can choose whether to use a Read More feature on this module or not.', 'dsm-supreme-modules-pro-for-divi' ),
		);

		$fields['dsm_modules_readmore_show_on_mobile'] = array(
			'label'            => esc_html__( 'Show On Mobile Only', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'option_category'  => 'configuration',
			'options'          => array(
				'on'  => esc_html__( 'On', 'dsm-supreme-modules-pro-for-divi' ),
				'off' => esc_html__( 'Off', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'description'      => esc_html__( 'Here you can choose whether to enable on mobile or not.', 'dsm-supreme-modules-pro-for-divi' ),
			'default'          => 'off',
			'default_on_front' => 'off',
			'show_if'          => array(
				'dsm_modules_readmore' => 'on',
			),
		);

		$fields['dsm_modules_readmore_height'] = array(
			'label'            => esc_html__( 'Collapsed Height', 'dsm-supreme-modules-pro-for-divi' ),
			'description'      => esc_html__( 'Control the collapsed height of the block.', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'range',
			'option_category'  => 'configuration',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'allowed_units'    => 'px',
			'default'          => '300px',
			'default_unit'     => 'px',
			'default_on_front' => '300px',
			'range_settings'   => array(
				'min'  => '100',
				'max'  => '800',
				'step' => '1',
			),
			'show_if'          => array(
				'dsm_modules_readmore' => 'on',
			),
		);

		$fields['dsm_modules_readmore_more_link_text'] = array(
			'label'            => esc_html__( 'Read More Text', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'text',
			'option_category'  => 'basic_option',
			'default'          => 'Read more',
			'default_on_front' => 'Read more',
			'description'      => esc_html__( 'Input of more text.', 'dsm-supreme-modules-pro-for-divi' ),
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'show_if'          => array(
				'dsm_modules_readmore' => 'on',
			),
		);

		$fields['dsm_modules_readmore_less_link_text'] = array(
			'label'            => esc_html__( 'Close Text', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'text',
			'option_category'  => 'basic_option',
			'default'          => 'Close',
			'default_on_front' => 'Close',
			'description'      => esc_html__( 'Input of close text.', 'dsm-supreme-modules-pro-for-divi' ),
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'show_if'          => array(
				'dsm_modules_readmore' => 'on',
			),
		);

		$fields['dsm_modules_readmore_font'] = array(
			'label'           => esc_html__( 'Font', 'dsm-supreme-modules-pro-for-divi' ),
			'type'            => 'font',
			'option_category' => 'font_option',
			'options'         => array(
				'bold'      => esc_html__( 'Bold', 'dsm-supreme-modules-pro-for-divi' ),
				'italic'    => esc_html__( 'Italic', 'dsm-supreme-modules-pro-for-divi' ),
				'uppercase' => esc_html__( 'Uppercase', 'dsm-supreme-modules-pro-for-divi' ),
				'underline' => esc_html__( 'Underline', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'description'     => esc_html__( 'Here you can choose the Read More Text Font.', 'dsm-supreme-modules-pro-for-divi' ),
			'tab_slug'        => 'custom_css',
			'toggle_slug'     => 'visibility',
			'show_if'         => array(
				'dsm_modules_readmore' => 'on',
			),
		);

		$fields['dsm_modules_readmore_text_align'] = array(
			'label'            => esc_html__( 'Text Alignment', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'text_align',
			'option_category'  => 'layout',
			'options'          => et_builder_get_text_orientation_options( array( 'justified' ) ),
			'default_on_front' => 'left',
			'description'      => esc_html__( 'Here you can choose the Read More Text alignment.', 'dsm-supreme-modules-pro-for-divi' ),
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'show_if'          => array(
				'dsm_modules_readmore' => 'on',
			),
		);

		$fields['dsm_modules_readmore_font_size'] = array(
			'label'           => esc_html__( 'Text Size', 'dsm-supreme-modules-pro-for-divi' ),
			'description'     => esc_html__( 'Increase or decrease the size of the Read Me text.', 'dsm-supreme-modules-pro-for-divi' ),
			'type'            => 'range',
			'option_category' => 'font_option',
			'tab_slug'        => 'custom_css',
			'toggle_slug'     => 'visibility',
			'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
			'default_unit'    => 'px',
			'range_settings'  => array(
				'min'  => '1',
				'max'  => '100',
				'step' => '1',
			),
			'default'         => '14px',
			'show_if'         => array(
				'dsm_modules_readmore' => 'on',
			),
		);

		$fields['dsm_modules_readmore_link_color'] = array(
			'label'        => esc_html__( 'Link Text Color', 'dsm-supreme-modules-pro-for-divi' ),
			'type'         => 'color-alpha',
			'custom_color' => true,
			'tab_slug'     => 'custom_css',
			'toggle_slug'  => 'visibility',
			'hover'        => 'tabs',
			'show_if'      => array(
				'dsm_modules_readmore' => 'on',
			),
		);

		$fields['dsm_modules_readmore_shadow'] = array(
			'label'            => esc_html__( 'Use Shadow', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'option_category'  => 'configuration',
			'options'          => array(
				'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'default'          => 'off',
			'default_on_front' => 'off',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'description'      => esc_html__( 'Here you can choose whether to use a shadow on that will have a  white gradient on lower visible part of the block. This works better with white background.', 'dsm-supreme-modules-pro-for-divi' ),
			'show_if'          => array(
				'dsm_modules_readmore' => 'on',
			),
		);

		$fields['dsm_modules_readmore_link_custom_css'] = array(
			'label'       => esc_html__( 'Link Custom CSS', 'dsm-supreme-modules-pro-for-divi' ),
			'type'        => 'codemirror',
			'tab_slug'    => 'custom_css',
			'toggle_slug' => 'visibility',
			'show_if'     => array(
				'dsm_modules_readmore' => 'on',
			),
		);

		return array_merge( $fields_unprocessed, $fields );
	}
	public function output_modules_readmore( $output, $render_slug, $module ) {
		if ( dsm_load_readme_divi_modules() !== $render_slug ) {
			if ( is_array( $output ) ) {
				return $output;
			}

			$dsm_modules_readmore_show_on_mobile    = isset( $module->props['dsm_modules_readmore_show_on_mobile'] ) ? $module->props['dsm_modules_readmore_show_on_mobile'] : 'off';
			$dsm_modules_readmore                   = isset( $module->props['dsm_modules_readmore'] ) ? $module->props['dsm_modules_readmore'] : 'off';
			$dsm_modules_readmore_link_color        = isset( $module->props['dsm_modules_readmore_link_color'] ) ? $module->props['dsm_modules_readmore_link_color'] : '';
			$dsm_modules_readmore_link_color__hover = isset( $module->props['dsm_modules_readmore_link_color__hover'] ) ? $module->props['dsm_modules_readmore_link_color__hover'] : '';

			if ( isset( $module->props['dsm_modules_readmore'] ) && 'on' === $module->props['dsm_modules_readmore'] ) {
				$dsm_modules_readmore_custom_css = isset( $module->props['dsm_modules_readmore_link_custom_css'] ) ? $module->props['dsm_modules_readmore_link_custom_css'] : '';

				$dsm_readmore_modules_class_output = '';
				$dsm_readmore_modules_data_output  = '';
				if ( 'on' === $module->props['dsm_modules_readmore_shadow'] ) {
					$dsm_readmore_modules_class_output .= ' dsm-readmore-shadow';
				}

				$data   = $dsm_readmore_modules_data_output . 'data-dsm-readmore-show-on-mobile="' . $dsm_modules_readmore_show_on_mobile . '" data-dsm-readmore-height="' . $module->props['dsm_modules_readmore_height'] . '" data-dsm-readmore-more-link="' . $module->props['dsm_modules_readmore_more_link_text'] . '"  data-dsm-readmore-less-link="' . $module->props['dsm_modules_readmore_less_link_text'] . '" ';
				$output = str_replace( 'class="et_pb_module ', $data . ' class="et_pb_module dsm-readmore ' . $dsm_readmore_modules_class_output . ' ', $output );
				$output = str_replace( 'class="et_pb_with_border ', $data . ' class="et_pb_with_border dsm-readmore ' . $dsm_readmore_modules_class_output . ' ', $output );

				if ( '' !== $dsm_modules_readmore_link_color ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dsm-readmore-btn-wrapper a',
							'declaration' => sprintf(
								'color: %1$s;',
								esc_html( $dsm_modules_readmore_link_color )
							),
						)
					);
				}

				if ( et_builder_is_hover_enabled( 'dsm_modules_readmore_link_color', $module->props ) ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dsm-readmore-btn-wrapper a:hover',
							'declaration' => sprintf(
								'color: %1$s;',
								esc_html( $module->props['dsm_modules_readmore_link_color__hover'] )
							),
						)
					);
				}

				if ( 'left' !== $module->props['dsm_modules_readmore_text_align'] ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dsm-readmore-btn-wrapper',
							'declaration' => sprintf(
								'text-align: %1$s;',
								esc_attr( $module->props['dsm_modules_readmore_text_align'] )
							),
						)
					);
				}

				if ( '14px' !== $module->props['dsm_modules_readmore_font_size'] ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dsm-readmore-btn-wrapper a',
							'declaration' => sprintf(
								'font-size: %1$s;',
								esc_html( $module->props['dsm_modules_readmore_font_size'] )
							),
						)
					);
				}

				if ( 'none' !== $module->props['max_width'] ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dsm-readmore-btn-wrapper',
							'declaration' => sprintf(
								'max-width: %1$s;',
								esc_html( $module->props['max_width'] )
							),
						)
					);
				}
				if ( '' !== $module->props['dsm_modules_readmore_font'] ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dsm-readmore-btn-wrapper a',
							'declaration' => et_builder_set_element_font( $module->props['dsm_modules_readmore_font'] ),
						)
					);
				}

				if ( '' !== $dsm_modules_readmore_custom_css ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dsm-readmore-btn-wrapper a',
							'declaration' => esc_html( $dsm_modules_readmore_custom_css ),
						)
					);
				}

				wp_enqueue_script( 'dsm-readme' );

			}
		}

		return $output;
	}

	/**
	 * Creates the Divi Supreme Popup
	 *
	 * @since 1.0.0
	 */

	public function dsm_add_popup_modules() {
		$dsm_popup_divi_modules = $this->dsm_merge_child_modules();

		foreach ( $dsm_popup_divi_modules as $module ) {
			if ( 'none' !== $module ) {
				$filter = 'et_pb_all_fields_unprocessed_' . $module . '';
				add_filter( $filter, array( $this, 'dsm_add_popup_modules_setting' ) );
			}
		}
	}
	public function dsm_add_popup_modules_setting( $fields_unprocessed ) {
		$fields                                      = array();
		$dsm_animation_in_type_list                  = array(
			'fadeIn'            => esc_html__( 'Fade In', 'dsm-supreme-modules-pro-for-divi' ),
			'fadeInDown'        => esc_html__( 'Fade In Down', 'dsm-supreme-modules-pro-for-divi' ),
			'fadeInDownBig'     => esc_html__( 'Fade In Down Big', 'dsm-supreme-modules-pro-for-divi' ),
			'fadeInLeft'        => esc_html__( 'Fade In Left', 'dsm-supreme-modules-pro-for-divi' ),
			'fadeInLeftBig'     => esc_html__( 'Fade In Left Big', 'dsm-supreme-modules-pro-for-divi' ),
			'fadeInRight'       => esc_html__( 'Fade In Right', 'dsm-supreme-modules-pro-for-divi' ),
			'fadeInRightBig'    => esc_html__( 'Fade In Right Big', 'dsm-supreme-modules-pro-for-divi' ),
			'fadeInDown'        => esc_html__( 'Fade In Down', 'dsm-supreme-modules-pro-for-divi' ),
			'fadeInDownBig'     => esc_html__( 'Fade In Down Big', 'dsm-supreme-modules-pro-for-divi' ),
			'fadeInUp'          => esc_html__( 'Fade In Up', 'dsm-supreme-modules-pro-for-divi' ),
			'fadeInUpBig'       => esc_html__( 'Fade In Up Big', 'dsm-supreme-modules-pro-for-divi' ),
			'bounce'            => esc_html__( 'Bounce', 'dsm-supreme-modules-pro-for-divi' ),
			'flash'             => esc_html__( 'Flash', 'dsm-supreme-modules-pro-for-divi' ),
			'pulse'             => esc_html__( 'Pulse', 'dsm-supreme-modules-pro-for-divi' ),
			'rubberBand'        => esc_html__( 'Rubber Band', 'dsm-supreme-modules-pro-for-divi' ),
			'shake'             => esc_html__( 'Shake', 'dsm-supreme-modules-pro-for-divi' ),
			'swing'             => esc_html__( 'Swing', 'dsm-supreme-modules-pro-for-divi' ),
			'tada'              => esc_html__( 'Tada', 'dsm-supreme-modules-pro-for-divi' ),
			'wobble'            => esc_html__( 'Wobble', 'dsm-supreme-modules-pro-for-divi' ),
			'jello'             => esc_html__( 'Jello', 'dsm-supreme-modules-pro-for-divi' ),
			'lightSpeedIn'      => esc_html__( 'Light Speed In', 'dsm-supreme-modules-pro-for-divi' ),
			'rollIn'            => esc_html__( 'Roll In', 'dsm-supreme-modules-pro-for-divi' ),
			'hinge'             => esc_html__( 'Hinge', 'dsm-supreme-modules-pro-for-divi' ),
			'bounceIn'          => esc_html__( 'bounceIn', 'dsm-supreme-modules-pro-for-divi' ),
			'bounceInDown'      => esc_html__( 'bounceInDown', 'dsm-supreme-modules-pro-for-divi' ),
			'bounceInLeft'      => esc_html__( 'bounceInLeft', 'dsm-supreme-modules-pro-for-divi' ),
			'bounceInRight'     => esc_html__( 'bounceInRight', 'dsm-supreme-modules-pro-for-divi' ),
			'bounceInUp'        => esc_html__( 'bounceInUp', 'dsm-supreme-modules-pro-for-divi' ),
			'slideInUp'         => esc_html__( 'Slide In Up', 'dsm-supreme-modules-pro-for-divi' ),
			'slideInDown'       => esc_html__( 'Slide In Down', 'dsm-supreme-modules-pro-for-divi' ),
			'slideInLeft'       => esc_html__( 'Slide In Left', 'dsm-supreme-modules-pro-for-divi' ),
			'slideInRight'      => esc_html__( 'Slide In Right', 'dsm-supreme-modules-pro-for-divi' ),
			'flip'              => esc_html__( 'Flip', 'dsm-supreme-modules-pro-for-divi' ),
			'flipInX'           => esc_html__( 'Flip In X', 'dsm-supreme-modules-pro-for-divi' ),
			'flipInY'           => esc_html__( 'Flip In Y', 'dsm-supreme-modules-pro-for-divi' ),
			'rotateIn'          => esc_html__( 'Rotate In', 'dsm-supreme-modules-pro-for-divi' ),
			'rotateInDownLeft'  => esc_html__( 'Rotate In Down Left', 'dsm-supreme-modules-pro-for-divi' ),
			'rotateInDownRight' => esc_html__( 'Rotate In Down Right', 'dsm-supreme-modules-pro-for-divi' ),
			'rotateInUpLeft'    => esc_html__( 'Rotate In Up Left', 'dsm-supreme-modules-pro-for-divi' ),
			'rotateInUpRight'   => esc_html__( 'Rotate In Up Right', 'dsm-supreme-modules-pro-for-divi' ),
			'zoomIn'            => esc_html__( 'Zoom In', 'dsm-supreme-modules-pro-for-divi' ),
			'zoomInDown'        => esc_html__( 'Zoom In Down', 'dsm-supreme-modules-pro-for-divi' ),
			'zoomInLeft'        => esc_html__( 'Zoom In Left', 'dsm-supreme-modules-pro-for-divi' ),
			'zoomInRight'       => esc_html__( 'Zoom In Right', 'dsm-supreme-modules-pro-for-divi' ),
			'zoomInUp'          => esc_html__( 'Zoom In Up', 'dsm-supreme-modules-pro-for-divi' ),
		);
		$dsm_animation_out_type_list                 = array(
			'fadeOut'            => esc_html__( 'Fade Out', 'dsm-supreme-modules-pro-for-divi' ),
			'fadeOutDown'        => esc_html__( 'Fade Out Down', 'dsm-supreme-modules-pro-for-divi' ),
			'fadeOutDownBig'     => esc_html__( 'Fade Out Down Big', 'dsm-supreme-modules-pro-for-divi' ),
			'fadeOutLeft'        => esc_html__( 'Fade Out Left', 'dsm-supreme-modules-pro-for-divi' ),
			'fadeOutLeftBig'     => esc_html__( 'Fade Out Left Big', 'dsm-supreme-modules-pro-for-divi' ),
			'fadeOutRight'       => esc_html__( 'Fade Out Right', 'dsm-supreme-modules-pro-for-divi' ),
			'fadeOutRightBig'    => esc_html__( 'Fade Out Right Big', 'dsm-supreme-modules-pro-for-divi' ),
			'fadeOutDown'        => esc_html__( 'Fade Out Down', 'dsm-supreme-modules-pro-for-divi' ),
			'fadeOutDownBig'     => esc_html__( 'Fade Out Down Big', 'dsm-supreme-modules-pro-for-divi' ),
			'fadeOutUp'          => esc_html__( 'Fade Out Up', 'dsm-supreme-modules-pro-for-divi' ),
			'fadeOutUpBig'       => esc_html__( 'Fade Out Up Big', 'dsm-supreme-modules-pro-for-divi' ),
			'bounceOut'          => esc_html__( 'Bounce Out', 'dsm-supreme-modules-pro-for-divi' ),
			'bounceOutDown'      => esc_html__( 'Bounce Out Down', 'dsm-supreme-modules-pro-for-divi' ),
			'bounceOutLeft'      => esc_html__( 'Bounce Out Left', 'dsm-supreme-modules-pro-for-divi' ),
			'bounceOutRight'     => esc_html__( 'Bounce Out Right', 'dsm-supreme-modules-pro-for-divi' ),
			'bounceOutUp'        => esc_html__( 'Bounce Out Up', 'dsm-supreme-modules-pro-for-divi' ),
			'slideOutUp'         => esc_html__( 'Slide Out Up', 'dsm-supreme-modules-pro-for-divi' ),
			'slideOutDown'       => esc_html__( 'Slide Out Down', 'dsm-supreme-modules-pro-for-divi' ),
			'slideOutLeft'       => esc_html__( 'Slide Out Left', 'dsm-supreme-modules-pro-for-divi' ),
			'slideOutRight'      => esc_html__( 'Slide Out Right', 'dsm-supreme-modules-pro-for-divi' ),
			'flipOutX'           => esc_html__( 'Flip Out X', 'dsm-supreme-modules-pro-for-divi' ),
			'flipOutY'           => esc_html__( 'Flip Out Y', 'dsm-supreme-modules-pro-for-divi' ),
			'rotateOut'          => esc_html__( 'Rotate Out', 'dsm-supreme-modules-pro-for-divi' ),
			'rotateOutDownLeft'  => esc_html__( 'Rotate Out Down Left', 'dsm-supreme-modules-pro-for-divi' ),
			'rotateOutDownRight' => esc_html__( 'Rotate Out Down Right', 'dsm-supreme-modules-pro-for-divi' ),
			'rotateOutUpLeft'    => esc_html__( 'Rotate Out Up Left', 'dsm-supreme-modules-pro-for-divi' ),
			'rotateOutUpRight'   => esc_html__( 'Rotate Out Up Right', 'dsm-supreme-modules-pro-for-divi' ),
			'zoomOut'            => esc_html__( 'Zoom Out', 'dsm-supreme-modules-pro-for-divi' ),
			'zoomOutDown'        => esc_html__( 'Zoom Out Down', 'dsm-supreme-modules-pro-for-divi' ),
			'zoomOutLeft'        => esc_html__( 'Zoom Out Left', 'dsm-supreme-modules-pro-for-divi' ),
			'zoomOutRight'       => esc_html__( 'Zoom Out Right', 'dsm-supreme-modules-pro-for-divi' ),
			'zoomOutUp'          => esc_html__( 'Zoom Out Up', 'dsm-supreme-modules-pro-for-divi' ),
			'lightSpeedOut'      => esc_html__( 'Light Speed Out', 'dsm-supreme-modules-pro-for-divi' ),
			'rollOut'            => esc_html__( 'rollOut', 'dsm-supreme-modules-pro-for-divi' ),
		);
		$fields['dsm_modules_popup']                 = array(
			'label'            => esc_html__( 'Use Popup', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'option_category'  => 'configuration',
			'options'          => array(
				'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'default'          => 'off',
			'default_on_front' => 'off',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'description'      => esc_html__( 'Here you can choose whether to use a Popup on this module or not.', 'dsm-supreme-modules-pro-for-divi' ),
		);
		$fields['dsm_modules_popup_type']            = array(
			'label'            => esc_html__( 'Popup Type', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'select',
			'option_category'  => 'layout',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'options'          => array(
				'inline' => esc_html__( 'Layout', 'dsm-supreme-modules-pro-for-divi' ),
				'iframe' => esc_html__( 'iFrame', 'dsm-supreme-modules-pro-for-divi' ),
				'image'  => esc_html__( 'Image', 'dsm-supreme-modules-pro-for-divi' ),
				'video'  => esc_html__( 'Video', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'default'          => 'inline',
			'default_on_front' => 'inline',
			'show_if'          => array(
				'dsm_modules_popup' => 'on',
			),
		);
		$fields['dsm_modules_popup_library']         = array(
			'label'            => esc_html__( 'Popup (Divi Library)', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'select',
			'option_category'  => 'layout',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'options'          => $this->dsm_load_library(),
			'default'          => 'none',
			'default_on_front' => 'none',
			'show_if'          => array(
				'dsm_modules_popup'      => 'on',
				'dsm_modules_popup_type' => 'inline',
			),
		);
		$fields['dsm_modules_popup_iframe_url']      = array(
			'label'           => esc_html__( 'iFrame URL', 'dsm-supreme-modules-pro-for-divi' ),
			'type'            => 'text',
			'option_category' => 'basic_option',
			'description'     => esc_html__( 'Input your destination URL here.', 'dsm-supreme-modules-pro-for-divi' ),
			'tab_slug'        => 'custom_css',
			'toggle_slug'     => 'visibility',
			'show_if'         => array(
				'dsm_modules_popup'      => 'on',
				'dsm_modules_popup_type' => 'iframe',
			),
		);
		$fields['dsm_modules_popup_image_src']       = array(
			'label'              => esc_html__( 'Image', 'dsm-supreme-modules-pro-for-divi' ),
			'type'               => 'upload',
			'option_category'    => 'basic_option',
			'upload_button_text' => esc_attr__( 'Upload an image', 'dsm-supreme-modules-pro-for-divi' ),
			'choose_text'        => esc_attr__( 'Choose an Image', 'dsm-supreme-modules-pro-for-divi' ),
			'update_text'        => esc_attr__( 'Set As Image', 'dsm-supreme-modules-pro-for-divi' ),
			'description'        => esc_html__( 'Upload an Popup image.', 'dsm-supreme-modules-pro-for-divi' ),
			'tab_slug'           => 'custom_css',
			'toggle_slug'        => 'visibility',
			'show_if'            => array(
				'dsm_modules_popup'      => 'on',
				'dsm_modules_popup_type' => 'image',
			),
		);
		$fields['dsm_modules_popup_video_url']       = array(
			'label'           => esc_html__( 'Video URL', 'dsm-supreme-modules-pro-for-divi' ),
			'type'            => 'text',
			'option_category' => 'basic_option',
			'description'     => esc_html__( 'Input Video URL here.', 'dsm-supreme-modules-pro-for-divi' ),
			'tab_slug'        => 'custom_css',
			'toggle_slug'     => 'visibility',
			'show_if'         => array(
				'dsm_modules_popup'      => 'on',
				'dsm_modules_popup_type' => 'video',
			),
		);
		$fields['dsm_modules_popup_trigger']         = array(
			'label'            => esc_html__( 'Trigger On', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'select',
			'option_category'  => 'layout',
			'options'          => array(
				'module' => esc_html__( 'Module(Click)', 'dsm-supreme-modules-pro-for-divi' ),
				'button' => esc_html__( 'Button(Click)', 'dsm-supreme-modules-pro-for-divi' ),
				'image'  => esc_html__( 'Image(Click)', 'dsm-supreme-modules-pro-for-divi' ),
				'links'  => esc_html__( 'Hyperlink(Click)', 'dsm-supreme-modules-pro-for-divi' ),
				'onload' => esc_html__( 'Page Load', 'dsm-supreme-modules-pro-for-divi' ),
				'scroll' => esc_html__( 'Scroll', 'dsm-supreme-modules-pro-for-divi' ),
				'exit'   => esc_html__( 'Exit Intent', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'default_on_front' => 'module',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'show_if'          => array(
				'dsm_modules_popup' => 'on',
			),
		);
		$fields['dsm_modules_popup_cookie_consent']  = array(
			'label'            => esc_html__( 'Use as Cookie Consent', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'option_category'  => 'configuration',
			'options'          => array(
				'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'default'          => 'off',
			'default_on_front' => 'off',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'description'      => esc_html__( 'Here you can choose whether this is a Cookie Consent Popup.', 'dsm-supreme-modules-pro-for-divi' ),
			'show_if'          => array(
				'dsm_modules_popup'         => 'on',
				'dsm_modules_popup_trigger' => 'onload',
			),
		);
		$fields['dsm_modules_popup_close_trigger']   = array(
			'label'            => esc_html__( 'Close Popup Triggers', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'select',
			'option_category'  => 'layout',
			'options'          => array(
				'true'  => esc_html__( 'Outside Popup', 'dsm-supreme-modules-pro-for-divi' ),
				'false' => esc_html__( 'Close Button', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'default_on_front' => 'true',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'show_if'          => array(
				'dsm_modules_popup' => 'on',
			),
		);
		$fields['dsm_modules_popup_auto_close']      = array(
			'label'            => esc_html__( 'Use Auto Close Popup', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'option_category'  => 'configuration',
			'options'          => array(
				'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'default'          => 'off',
			'default_on_front' => 'off',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'description'      => esc_html__( 'Here you can choose whether to close a popup automatically After (X) Seconds.', 'dsm-supreme-modules-pro-for-divi' ),
			'show_if'          => array(
				'dsm_modules_popup' => 'on',
			),
		);
		$fields['dsm_modules_popup_auto_close_time'] = array(
			'label'            => esc_html__( 'After Time Passed (in s)', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'range',
			'option_category'  => 'layout',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'validate_unit'    => true,
			'default'          => '5s',
			'default_unit'     => 's',
			'default_on_front' => '5s',
			'allow_empty'      => false,
			'range_settings'   => array(
				'min'  => '0',
				'max'  => '15',
				'step' => '1',
			),
			'show_if'          => array(
				'dsm_modules_popup'            => 'on',
				'dsm_modules_popup_auto_close' => 'on',
			),
		);
		$fields['dsm_modules_popup_timed_delay']     = array(
			'label'            => esc_html__( 'Timed Delay', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'range',
			'option_category'  => 'layout',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'validate_unit'    => true,
			'default'          => '1s',
			'default_unit'     => 's',
			'default_on_front' => '1s',
			'allowed_units'    => array( 's' ),
			'allow_empty'      => false,
			'range_settings'   => array(
				'min'  => '0',
				'max'  => '25',
				'step' => '1',
			),
			'show_if'          => array(
				'dsm_modules_popup'         => 'on',
				'dsm_modules_popup_trigger' => array( 'onload', 'scroll', 'exit' ),
			),
		);
		$fields['dsm_modules_popup_cookie_days']     = array(
			'label'            => esc_html__( 'Cookie Expiry', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'number',
			'option_category'  => 'basic_option',
			'default'          => '30',
			'default_unit'     => '',
			'default_on_front' => '30',
			'description'      => esc_html__( 'The number of days that the cookie is set for.', 'dsm-supreme-modules-pro-for-divi' ),
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'show_if'          => array(
				'dsm_modules_popup'         => 'on',
				'dsm_modules_popup_trigger' => array( 'onload', 'scroll' ),
			),
		);
		$fields['dsm_modules_popup_animation_in']    = array(
			'label'            => esc_html__( 'Entrance Animation In', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'select',
			'option_category'  => 'layout',
			'default_on_front' => 'fadeIn',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'options'          => $dsm_animation_in_type_list,
			'show_if'          => array(
				'dsm_modules_popup' => 'on',
			),
		);
		$fields['dsm_modules_popup_animation_out']   = array(
			'label'            => esc_html__( 'Exit Animation Out', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'select',
			'option_category'  => 'layout',
			'default_on_front' => 'fadeOut',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'options'          => $dsm_animation_out_type_list,
			'show_if'          => array(
				'dsm_modules_popup' => 'on',
			),
		);
		$fields['dsm_modules_popup_position']        = array(
			'label'            => esc_html__( 'Popup Position', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'select',
			'option_category'  => 'layout',
			'options'          => array(
				'top-left'      => esc_html__( 'Top Left', 'dsm-supreme-modules-pro-for-divi' ),
				'top-center'    => esc_html__( 'Top Center', 'dsm-supreme-modules-pro-for-divi' ),
				'top-right'     => esc_html__( 'Top Right', 'dsm-supreme-modules-pro-for-divi' ),
				'center-left'   => esc_html__( 'Center Left', 'dsm-supreme-modules-pro-for-divi' ),
				'center'        => esc_html__( 'Center', 'dsm-supreme-modules-pro-for-divi' ),
				'center-right'  => esc_html__( 'Center Right', 'dsm-supreme-modules-pro-for-divi' ),
				'bottom-left'   => esc_html__( 'Bottom Left', 'dsm-supreme-modules-pro-for-divi' ),
				'bottom-center' => esc_html__( 'Bottom Center', 'dsm-supreme-modules-pro-for-divi' ),
				'bottom-right'  => esc_html__( 'Bottom Right', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'default_on_front' => 'center',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'show_if'          => array(
				'dsm_modules_popup' => 'on',
			),
			'mobile_options'   => true,
		);
		$fields['dsm_modules_popup_position_type']   = array(
			'label'            => esc_html__( 'Popup Position Type', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'select',
			'option_category'  => 'layout',
			'options'          => array(
				'absolute' => esc_html__( 'Absolute', 'dsm-supreme-modules-pro-for-divi' ),
				'fixed'    => esc_html__( 'Fixed', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'default_on_front' => 'absolute',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'show_if'          => array(
				'dsm_modules_popup' => 'on',
			),
			'description'      => esc_html__( 'Here you can choose the postion type of the popup. Fixed position will allow user to scroll the page with the popup.', 'dsm-supreme-modules-pro-for-divi' ),
		);
		$fields['dsm_modules_popup_fullwidth']       = array(
			'label'            => esc_html__( 'Use Fullwidth', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'option_category'  => 'configuration',
			'default'          => 'off',
			'default_on_front' => 'off',
			'options'          => array(
				'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'description'      => esc_html__( 'Here you can choose whether to show the popup as Fullwidth.', 'dsm-supreme-modules-pro-for-divi' ),
			'show_if'          => array(
				'dsm_modules_popup' => 'on',
			),
		);
		$fields['dsm_modules_popup_width']           = array(
			'label'            => esc_html__( 'Popup Max Width', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'range',
			'option_category'  => 'layout',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'default_unit'     => 'px',
			'default_on_front' => '680px',
			'default'          => '680px',
			'allowed_units'    => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
			'range_settings'   => array(
				'min'  => '0',
				'max'  => '1200',
				'step' => '1',
			),
			'show_if'          => array(
				'dsm_modules_popup'           => 'on',
				'dsm_modules_popup_fullwidth' => 'off',
			),
			'mobile_options'   => true,
		);
		$fields['dsm_modules_overlay']               = array(
			'label'            => esc_html__( 'Show Overlay', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'option_category'  => 'configuration',
			'default'          => 'on',
			'default_on_front' => 'on',
			'options'          => array(
				'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'description'      => esc_html__( 'Here you can choose whether to use show the overlay or not.', 'dsm-supreme-modules-pro-for-divi' ),
			'show_if'          => array(
				'dsm_modules_popup' => 'on',
			),
		);
		$fields['dsm_modules_overlay_background']    = array(
			'label'        => esc_html__( 'Overlay Background Color', 'dsm-supreme-modules-pro-for-divi' ),
			'type'         => 'color-alpha',
			'custom_color' => true,
			'default'      => 'rgba(0,0,0,0.8)',
			'tab_slug'     => 'custom_css',
			'toggle_slug'  => 'visibility',
			'show_if'      => array(
				'dsm_modules_popup'   => 'on',
				'dsm_modules_overlay' => 'on',
			),
		);
		$fields['dsm_modules_popup_button']          = array(
			'label'            => esc_html__( 'Show Close Button', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'option_category'  => 'configuration',
			'default'          => 'on',
			'default_on_front' => 'on',
			'options'          => array(
				'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'description'      => esc_html__( 'Here you can choose whether to use show the close button or not.', 'dsm-supreme-modules-pro-for-divi' ),
			'show_if'          => array(
				'dsm_modules_popup' => 'on',
			),
		);
		$fields['dsm_modules_popup_close_button_placement'] = array(
			'label'            => esc_html__( 'Close Button Placement', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'select',
			'option_category'  => 'layout',
			'default_on_front' => 'true',
			'options'          => array(
				'true'  => esc_html__( 'Inside', 'dsm-supreme-modules-pro-for-divi' ),
				'false' => esc_html__( 'Outside', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'show_if'          => array(
				'dsm_modules_popup'        => 'on',
				'dsm_modules_popup_button' => 'on',
			),
		);
		$fields['dsm_modules_close_font_icon_size']         = array(
			'label'            => esc_html__( 'Close Icon Font Size', 'dsm-supreme-modules-pro-for-divi' ),
			'description'      => esc_html__( 'Control the size of the icon by increasing or decreasing the font size.', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'range',
			'option_category'  => 'layout',
			'allowed_units'    => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
			'default'          => '24px',
			'default_unit'     => 'px',
			'default_on_front' => '',
			'range_settings'   => array(
				'min'  => '0',
				'max'  => '100',
				'step' => '1',
			),
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'mobile_options'   => true,
			'show_if'          => array(
				'dsm_modules_popup'        => 'on',
				'dsm_modules_popup_button' => 'on',
			),
		);
		$fields['dsm_modules_close_font_icon']              = array(
			'label'            => esc_html__( 'Close Button Icon', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'select_icon',
			'option_category'  => 'basic_option',
			'class'            => array( 'et-pb-font-icon' ),
			'default_on_front' => 'M',
			'default'          => 'M',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'description'      => esc_html__( 'Choose an icon for your popup close button.', 'dsm-supreme-modules-pro-for-divi' ),
			'show_if'          => array(
				'dsm_modules_popup'        => 'on',
				'dsm_modules_popup_button' => 'on',
			),
		);
		$fields['dsm_modules_close_background_color']       = array(
			'label'        => esc_html__( 'Close Button Background Color', 'dsm-supreme-modules-pro-for-divi' ),
			'type'         => 'color-alpha',
			'custom_color' => true,
			'tab_slug'     => 'custom_css',
			'toggle_slug'  => 'visibility',
			'show_if'      => array(
				'dsm_modules_popup'        => 'on',
				'dsm_modules_popup_button' => 'on',
			),
			'hover'        => 'tabs',
		);
		$fields['dsm_modules_close_icon_color']             = array(
			'label'            => esc_html__( 'Close Button Icon Color', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'color-alpha',
			'custom_color'     => true,
			'default'          => 'rgba(0, 0, 0, 0.65)',
			'default_on_front' => 'rgba(0, 0, 0, 0.65)',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'show_if'          => array(
				'dsm_modules_popup'        => 'on',
				'dsm_modules_popup_button' => 'on',
			),
			'hover'            => 'tabs',
		);
		return array_merge( $fields_unprocessed, $fields );
	}
	public function output_modules_popup( $output, $render_slug, $module ) {
		if ( $this->dsm_load_divi_modules() !== $render_slug ) {
			if ( is_array( $output ) ) {
				return $output;
			}
			$dsm_modules_popup              = isset( $module->props['dsm_modules_popup'] ) ? $module->props['dsm_modules_popup'] : 'off';
			$dsm_modules_popup_library      = isset( $module->props['dsm_modules_popup_library'] ) ? $module->props['dsm_modules_popup_library'] : 'none';
			$dsm_modules_popup_type         = isset( $module->props['dsm_modules_popup_type'] ) ? $module->props['dsm_modules_popup_type'] : 'inline';
			$dsm_modules_overlay            = isset( $module->props['dsm_modules_overlay'] ) ? $module->props['dsm_modules_overlay'] : 'on';
			$dsm_modules_overlay_background = isset( $module->props['dsm_modules_overlay_background'] ) ? $module->props['dsm_modules_overlay_background'] : 'rgba(0,0,0,0.8)';

			if ( isset( $module->props['dsm_modules_popup'] ) && 'on' === $module->props['dsm_modules_popup'] ) {
				$dsm_modules_popup_animation_in           = $module->props['dsm_modules_popup_animation_in'];
				$dsm_modules_popup_animation_out          = $module->props['dsm_modules_popup_animation_out'];
				$dsm_modules_popup_trigger                = $module->props['dsm_modules_popup_trigger'];
				$dsm_modules_popup_cookie_consent         = isset( $module->props['dsm_modules_popup_cookie_consent'] ) ? $module->props['dsm_modules_popup_cookie_consent'] : 'off';
				$dsm_modules_popup_position               = $module->props['dsm_modules_popup_position'];
				$dsm_modules_popup_position_tablet        = isset( $module->props['dsm_modules_popup_position_tablet'] ) ? $module->props['dsm_modules_popup_position_tablet'] : $dsm_modules_popup_position;
				$dsm_modules_popup_position_phone         = isset( $module->props['dsm_modules_popup_position_phone'] ) ? $module->props['dsm_modules_popup_position_phone'] : $dsm_modules_popup_position_tablet;
				$dsm_modules_popup_position_type          = $module->props['dsm_modules_popup_position_type'];
				$dsm_modules_popup_button                 = $module->props['dsm_modules_popup_button'];
				$dsm_modules_popup_close_button_placement = $module->props['dsm_modules_popup_close_button_placement'];
				$dsm_modules_popup_close_trigger          = isset( $module->props['dsm_modules_popup_close_trigger'] ) ? $module->props['dsm_modules_popup_close_trigger'] : 'true';
				$dsm_modules_popup_auto_close             = 'on' === $module->props['dsm_modules_popup_auto_close'] ? ' data-dsm-popup-auto-close-time="' . esc_attr( $module->props['dsm_modules_popup_auto_close_time'] ) . '"' : '';
				$dsm_modules_popup_iframe_url             = '' !== $module->props['dsm_modules_popup_iframe_url'] ? ' data-dsm-popup-iframe-url="' . esc_url( $module->props['dsm_modules_popup_iframe_url'] ) . '"' : '';
				$dsm_modules_popup_image_src              = 'image' === $module->props['dsm_modules_popup_type'] ? ' data-dsm-popup-image-src="' . esc_url( $module->props['dsm_modules_popup_image_src'] ) . '"' : '';
				$dsm_modules_popup_video_url              = 'video' === $module->props['dsm_modules_popup_type'] ? ' data-dsm-popup-video-url="' . esc_url( $module->props['dsm_modules_popup_video_url'] ) . '"' : '';
				$dsm_modules_popup_timed_delay            = 'onload' === $module->props['dsm_modules_popup_trigger'] || 'scroll' === $module->props['dsm_modules_popup_trigger'] || 'exit' === $module->props['dsm_modules_popup_trigger'] ? ' data-dsm-popup-timed-delay="' . floatval( $module->props['dsm_modules_popup_timed_delay'] ) * 1000 . '"' : '';
				$dsm_modules_popup_cookie_expiry          = 'onload' === $module->props['dsm_modules_popup_trigger'] || 'scroll' === $module->props['dsm_modules_popup_trigger'] ? ' data-dsm-popup-cookie-expiry="' . $module->props['dsm_modules_popup_cookie_days'] . '"' : '';
				$dsm_modules_close_font_icon              = esc_attr( et_pb_process_font_icon( $module->props['dsm_modules_close_font_icon'] ) );
				$dsm_modules_close_icon_color             = $module->props['dsm_modules_close_icon_color'];
				$dsm_modules_close_icon_color_hover       = null !== et_pb_hover_options()->get_value( 'dsm_modules_close_icon_color', $module->props ) ? et_pb_hover_options()->get_value( 'dsm_modules_close_icon_color', $module->props ) : $dsm_modules_close_icon_color;
				$dsm_modules_close_background_color       = $module->props['dsm_modules_close_background_color'];
				$dsm_modules_close_background_color_hover = null !== et_pb_hover_options()->get_value( 'dsm_modules_close_background_color', $module->props ) ? et_pb_hover_options()->get_value( 'dsm_modules_close_background_color', $module->props ) : $dsm_modules_close_background_color;
				$dsm_modules_popup_fullwidth              = isset( $module->props['dsm_modules_popup_fullwidth'] ) ? $module->props['dsm_modules_popup_fullwidth'] : 'off';

				$dsm_modules_popup_width        = $module->props['dsm_modules_popup_width'];
				$dsm_modules_popup_width_values = et_pb_responsive_options()->get_property_values( $module->props, 'dsm_modules_popup_width' );
				$dsm_modules_popup_width_tablet = isset( $dsm_modules_popup_width_values['tablet'] ) ? $dsm_modules_popup_width_values['tablet'] : '';
				$dsm_modules_popup_width_phone  = isset( $dsm_modules_popup_width_values['phone'] ) ? $dsm_modules_popup_width_values['phone'] : '';

				$dsm_modules_close_font_icon_size        = $module->props['dsm_modules_close_font_icon_size'];
				$dsm_modules_close_font_icon_size_values = et_pb_responsive_options()->get_property_values( $module->props, 'dsm_modules_close_font_icon_size' );
				$dsm_modules_close_font_icon_size_tablet = isset( $dsm_modules_close_font_icon_size_values['tablet'] ) ? $dsm_modules_close_font_icon_size_values['tablet'] : '';
				$dsm_modules_close_font_icon_size_phone  = isset( $dsm_modules_close_font_icon_size_values['phone'] ) ? $dsm_modules_close_font_icon_size_values['phone'] : '';

				$dsm_modules_popup_check_trigger = 'on' === $dsm_modules_popup_cookie_consent ? '' : ' dsm-popup-trigger';
				$dsm_modules_popup_check_overlay = 'off' !== $dsm_modules_overlay ? 'data-dsm-popup-background="' . esc_html( $dsm_modules_overlay_background ) . '"' : '';

				$popup_responsive = ' data-dsm-popup-position-tablet="' . $dsm_modules_popup_position_tablet . '" data-dsm-popup-position-phone="' . $dsm_modules_popup_position_phone . '"';

				$data   = 'data-dsm-popup-order-class="' . ET_Builder_Element::get_module_order_class( $render_slug ) . '" data-dsm-popup-id="' . $dsm_modules_popup_library . '" data-dsm-popup-cookie-consent="' . $dsm_modules_popup_cookie_consent . '" data-dsm-popup-position="' . $dsm_modules_popup_position . '" ' . $popup_responsive . ' data-dsm-popup-position-type="' . $dsm_modules_popup_position_type . '"  data-dsm-popup-animation-in="' . $dsm_modules_popup_animation_in . '" data-dsm-popup-animation-out="' . $dsm_modules_popup_animation_out . '" data-dsm-popup-trigger="' . $dsm_modules_popup_trigger . '" data-dsm-popup-close-trigger="' . $dsm_modules_popup_close_trigger . '" data-dsm-popup-type="' . $dsm_modules_popup_type . '" ' . $dsm_modules_popup_auto_close . ' ' . $dsm_modules_popup_timed_delay . ' ' . $dsm_modules_popup_cookie_expiry . ' ' . $dsm_modules_popup_iframe_url . ' ' . $dsm_modules_popup_image_src . ' ' . $dsm_modules_popup_video_url . $dsm_modules_popup_check_overlay . ' data-dsm-popup-button="' . $dsm_modules_popup_button . '" data-dsm-popup-close-button-placement="' . $dsm_modules_popup_close_button_placement . '" data-dsm-popup-close-font-icon="' . $dsm_modules_close_font_icon . '" data-dsm-popup-fullwidth-width="' . $dsm_modules_popup_fullwidth . '"';
				$output = str_replace( 'class="et_pb_module ', $data . ' class="et_pb_module dsm-popup-' . $dsm_modules_popup_trigger . $dsm_modules_popup_check_trigger . ' ', $output );
				$output = str_replace( 'class="et_pb_button_module_wrapper ', $data . ' class="et_pb_button_module_wrapper dsm-popup-' . $dsm_modules_popup_trigger . $dsm_modules_popup_check_trigger . ' ', $output );
				$output = str_replace( 'class="et_pb_with_border ', $data . ' class="et_pb_with_border dsm-popup-' . $dsm_modules_popup_trigger . $dsm_modules_popup_check_trigger . ' ', $output );
				// Child Modules.
				$output = str_replace( 'class="dsm_card_carousel_child ', $data . ' class="dsm_card_carousel_child dsm-popup-' . $dsm_modules_popup_trigger . $dsm_modules_popup_check_trigger . ' ', $output );
				$output = str_replace( 'class="dsm_icon_list_child ', $data . ' class="dsm_icon_list_child dsm-popup-' . $dsm_modules_popup_trigger . $dsm_modules_popup_check_trigger . ' ', $output );

				$dsm_custom_popup         = '';
				$dsm_popup_selector_id    = 'dsm-popup-' . $dsm_modules_popup_library;
				$dsm_popup_order_class    = ET_Builder_Element::get_module_order_class( $render_slug );
				$dsm_popup_final_selector = '#' . $dsm_popup_order_class . '.mfp-content';

				if ( 'none' !== $dsm_modules_popup_library ) {
					$dsm_custom_popup  = '<div id="' . $dsm_popup_selector_id . '" class="mfp-hide dsm-popup">';
					$dsm_custom_popup .= do_shortcode( '[divi_shortcode id="' . $dsm_modules_popup_library . '"]' );
					$dsm_custom_popup .= '</div>';
				}
				$output .= $dsm_custom_popup;

				if ( 'false' === $dsm_modules_popup_close_button_placement ) {
					if ( isset( $dsm_modules_close_icon_color ) ) {
						ET_Builder_Element::set_style(
							$render_slug,
							array(
								'selector'    => '.dsm-popup-wrap #' . $dsm_popup_order_class . '.mfp-close',
								'declaration' => sprintf(
									'color: %1$s;',
									esc_attr( $dsm_modules_close_icon_color )
								),
							)
						);
					}
					if ( isset( $dsm_modules_close_icon_color_hover ) ) {
						ET_Builder_Element::set_style(
							$render_slug,
							array(
								'selector'    => '.dsm-popup-wrap #' . $dsm_popup_order_class . '.mfp-close:hover',
								'declaration' => sprintf(
									'color: %1$s;',
									esc_attr( $dsm_modules_close_icon_color_hover )
								),
							)
						);
					}
					if ( isset( $dsm_modules_close_background_color ) ) {
						ET_Builder_Element::set_style(
							$render_slug,
							array(
								'selector'    => '.dsm-popup-wrap #' . $dsm_popup_order_class . '.mfp-close',
								'declaration' => sprintf(
									'background: %1$s;',
									esc_attr( $dsm_modules_close_background_color )
								),
							)
						);
					}

					if ( '' !== $dsm_modules_close_background_color_hover && et_builder_is_hover_enabled( 'dsm_modules_close_background_color', $module->props ) ) {
						ET_Builder_Element::set_style(
							$render_slug,
							array(
								'selector'    => '.dsm-popup-wrap #' . $dsm_popup_order_class . '.mfp-close:hover',
								'declaration' => sprintf(
									'background: %1$s !important;',
									esc_attr( $dsm_modules_close_background_color_hover )
								),
							)
						);
					}
				} else {
					if ( isset( $dsm_modules_close_icon_color ) ) {
						ET_Builder_Element::set_style(
							$render_slug,
							array(
								'selector'    => $dsm_popup_final_selector . ' .mfp-close',
								'declaration' => sprintf(
									'color: %1$s;',
									esc_attr( $dsm_modules_close_icon_color )
								),
							)
						);
					}
					if ( isset( $dsm_modules_close_icon_color_hover ) ) {
						ET_Builder_Element::set_style(
							$render_slug,
							array(
								'selector'    => $dsm_popup_final_selector . ' .mfp-close:hover',
								'declaration' => sprintf(
									'color: %1$s;',
									esc_attr( $dsm_modules_close_icon_color_hover )
								),
							)
						);
					}
					if ( isset( $dsm_modules_close_background_color ) ) {
						ET_Builder_Element::set_style(
							$render_slug,
							array(
								'selector'    => $dsm_popup_final_selector . ' .mfp-close',
								'declaration' => sprintf(
									'background: %1$s;',
									esc_attr( $dsm_modules_close_background_color )
								),
							)
						);
					}
					if ( isset( $dsm_modules_close_background_color_hover ) ) {
						ET_Builder_Element::set_style(
							$render_slug,
							array(
								'selector'    => $dsm_popup_final_selector . ' .mfp-close:hover',
								'declaration' => sprintf(
									'background: %1$s !important;',
									esc_attr( $dsm_modules_close_background_color_hover )
								),
							)
						);
					}
					if ( 'inline' !== $dsm_modules_popup_type ) {
						ET_Builder_Element::set_style(
							$render_slug,
							array(
								'selector'    => $dsm_popup_final_selector . ' .mfp-close',
								'declaration' => sprintf(
									'background: %1$s;',
									esc_attr( $dsm_modules_close_background_color )
								),
							)
						);
					}
				}

				if ( 'off' === $dsm_modules_popup_fullwidth ) {
					if ( isset( $module->props['dsm_modules_popup_width'] ) ) {
						ET_Builder_Element::set_style(
							$render_slug,
							array(
								'selector'    => $dsm_popup_final_selector,
								'declaration' => sprintf(
									'max-width: %1$s;',
									esc_attr( $dsm_modules_popup_width )
								),
							)
						);
					}
					if ( isset( $dsm_modules_popup_width_tablet ) ) {
						ET_Builder_Element::set_style(
							$render_slug,
							array(
								'selector'    => $dsm_popup_final_selector,
								'declaration' => sprintf(
									'max-width: %1$s;',
									esc_attr( $dsm_modules_popup_width_tablet )
								),
								'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
							)
						);
					}

					if ( isset( $dsm_modules_popup_width_phone ) ) {
						ET_Builder_Element::set_style(
							$render_slug,
							array(
								'selector'    => $dsm_popup_final_selector,
								'declaration' => sprintf(
									'max-width: %1$s;',
									esc_attr( $dsm_modules_popup_width_phone )
								),
								'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
							)
						);
					}
				} else {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => $dsm_popup_final_selector,
							'declaration' => sprintf(
								'max-width: 100%%; width: 100%%;'
							),
						)
					);
				}

				et_pb_responsive_options()->generate_responsive_css( $dsm_modules_close_font_icon_size_values, '.dsm-popup-wrap #' . $dsm_popup_order_class . '.mfp-close .et-pb-icon', 'font-size', $render_slug );

				/*Overwrite Divi's close button*/
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '.dsm-popup-wrap #' . $dsm_popup_order_class . '.mfp-close:active',
						'declaration' => sprintf(
							'top: %1$s;',
							esc_attr( '0' )
						),
					)
				);

				if ( 'onload' === $dsm_modules_popup_trigger || 'scroll' === $dsm_modules_popup_trigger ) {
					wp_enqueue_script( 'dsm-js-cookie' );
				}
				if ( 'exit' === $dsm_modules_popup_trigger ) {
					wp_enqueue_script( 'dsm-glio' );
				}
				wp_enqueue_script( 'dsm-popup' );

			}
		}

		return $output;
	}

	/**
	 * Creates the Divi Supreme Scheduled Content
	 *
	 * @since 1.0.0
	 */
	public function dsm_add_scheduled_content_modules() {
		$dsm_load_divi_modules = $this->dsm_load_divi_with_child_modules();
		foreach ( $dsm_load_divi_modules as $module ) {
			if ( 'none' !== $module ) {
				$filter = 'et_pb_all_fields_unprocessed_' . $module . '';
				add_filter( $filter, array( $this, 'dsm_add_modules_setting' ) );
			}
		}
	}
	public function dsm_add_section_setting( $fields_unprocessed ) {
		$fields                                        = array();
		$fields['dsm_section_schedule_visibility']     = array(
			'label'            => esc_html__( 'Use Scheduled Element', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'option_category'  => 'configuration',
			'options'          => array(
				'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'default_on_front' => 'off',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'description'      => esc_html__( 'Here you can choose whether your Section will show or hide depending on the given date/time.', 'dsm-supreme-modules-pro-for-divi' ),
		);
		$fields['dsm_section_schedule_show_hide']      = array(
			'label'            => esc_html__( 'Show or Hide Section', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'select',
			'option_category'  => 'configuration',
			'options'          => array(
				'start' => esc_html__( 'Show', 'dsm-supreme-modules-pro-for-divi' ),
				'end'   => esc_html__( 'Hide', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'default_on_front' => 'start',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'show_if'          => array(
				'dsm_section_schedule_visibility' => 'on',
			),
		);
		$fields['dsm_section_schedule_after_datetime'] = array(
			'default'     => '',
			'label'       => esc_html__( 'Schedule a Date/Time', 'dsm-supreme-modules-pro-for-divi' ),
			'type'        => 'date_picker',
			'tab_slug'    => 'custom_css',
			'toggle_slug' => 'visibility',
			'show_if'     => array(
				'dsm_section_schedule_visibility'      => 'on',
				'dsm_section_schedule_day_week_on_off' => 'off',
			),

		);
		$fields['dsm_section_schedule_between']         = array(
			'label'            => esc_html__( 'Use Between Date/Time', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'option_category'  => 'configuration',
			'options'          => array(
				'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'default_on_front' => 'off',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'description'      => esc_html__( 'Here you can choose whether your Section will show or hide depending on the given date/time.', 'dsm-supreme-modules-pro-for-divi' ),
			'show_if'          => array(
				'dsm_section_schedule_visibility'      => 'on',
				'dsm_section_schedule_day_week_on_off' => 'off',
			),
		);
		$fields['dsm_section_schedule_end_datetime']    = array(
			'default'     => '',
			'label'       => esc_html__( 'Schedule a End Date/Time', 'dsm-supreme-modules-pro-for-divi' ),
			'type'        => 'date_picker',
			'tab_slug'    => 'custom_css',
			'toggle_slug' => 'visibility',
			'show_if'     => array(
				'dsm_section_schedule_visibility'      => 'on',
				'dsm_section_schedule_between'         => 'on',
				'dsm_section_schedule_day_week_on_off' => 'off',
			),
		);
		$fields['dsm_section_schedule_day_week_on_off'] = array(
			'label'            => esc_html__( 'Use Business Hour/Time', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'option_category'  => 'configuration',
			'options'          => array(
				'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'default_on_front' => 'off',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'description'      => esc_html__( 'Here you can choose whether your Section will show or hide depending on the given date/time.', 'dsm-supreme-modules-pro-for-divi' ),
			'show_if'          => array(
				'dsm_section_schedule_visibility' => 'on',
			),
		);
		$fields['dsm_section_schedule_day_week']        = array(
			'label'           => esc_html__( 'Select Day', 'dsm-supreme-modules-pro-for-divi' ),
			'type'            => 'multiple_checkboxes',
			'option_category' => 'configuration',
			'options'         => array(
				'monday'    => esc_html__( 'Monday', 'dsm-supreme-modules-pro-for-divi' ),
				'tuesday'   => esc_html__( 'Tuesday', 'dsm-supreme-modules-pro-for-divi' ),
				'wednesday' => esc_html__( 'Wednesday', 'dsm-supreme-modules-pro-for-divi' ),
				'thursday'  => esc_html__( 'Thursday', 'dsm-supreme-modules-pro-for-divi' ),
				'friday'    => esc_html__( 'Friday', 'dsm-supreme-modules-pro-for-divi' ),
				'saturday'  => esc_html__( 'Saturday', 'dsm-supreme-modules-pro-for-divi' ),
				'sunday'    => esc_html__( 'Sunday', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'tab_slug'        => 'custom_css',
			'toggle_slug'     => 'visibility',
			'show_if'         => array(
				'dsm_section_schedule_visibility'      => 'on',
				'dsm_section_schedule_day_week_on_off' => 'on',
			),
			'return_slugs'    => true,
		);
		$fields['dsm_section_schedule_opening_time']    = array(
			'label'            => esc_html__( 'Opening Time', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'text',
			'option_category'  => 'basic_option',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'show_if'          => array(
				'dsm_section_schedule_visibility'      => 'on',
				'dsm_section_schedule_day_week_on_off' => 'on',
			),
			'default_on_front' => '08:00',
		);
		$fields['dsm_section_schedule_closing_time']    = array(
			'label'            => esc_html__( 'Closing Time', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'text',
			'option_category'  => 'basic_option',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'show_if'          => array(
				'dsm_section_schedule_visibility'      => 'on',
				'dsm_section_schedule_day_week_on_off' => 'on',
			),
			'default_on_front' => '18:00',
		);
		$fields['dsm_section_schedule_user_logged_in']  = array(
			'label'            => esc_html__( 'Apply To', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'select',
			'option_category'  => 'configuration',
			'options'          => array(
				'all'       => esc_html__( 'All Users', 'dsm-supreme-modules-pro-for-divi' ),
				'logged-in' => esc_html__( 'Logged In Users', 'dsm-supreme-modules-pro-for-divi' ),
				'visitors'  => esc_html__( 'Visitor Users', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'default_on_front' => 'all',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'show_if'          => array(
				'dsm_section_schedule_visibility' => 'on',
			),
		);
		$fields['dsm_section_schedule_user_roles']      = array(
			'label'           => esc_html__( 'Select User Roles', 'dsm-supreme-modules-pro-for-divi' ),
			'type'            => 'multiple_checkboxes',
			'option_category' => 'configuration',
			'options'         => $this->dsm_get_user_role(),
			'tab_slug'        => 'custom_css',
			'toggle_slug'     => 'visibility',
			'show_if'         => array(
				'dsm_section_schedule_visibility'     => 'on',
				'dsm_section_schedule_user_logged_in' => 'logged-in',
			),
			'return_slugs'    => true,
		);
		$fields['dsm_section_schedule_devices_disable'] = array(
			'label'           => esc_html__( 'Disable on', 'dsm-supreme-modules-pro-for-divi' ),
			'type'            => 'multiple_checkboxes',
			'options'         => array(
				'phone'   => esc_html__( 'Phone', 'et_buildsm-supreme-modules-pro-for-divider' ),
				'tablet'  => esc_html__( 'Tablet', 'dsm-supreme-modules-pro-for-divi' ),
				'desktop' => esc_html__( 'Desktop', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'option_category' => 'configuration',
			'description'     => esc_html__( 'This will disable the section on selected devices', 'dsm-supreme-modules-pro-for-divi' ),
			'tab_slug'        => 'custom_css',
			'toggle_slug'     => 'visibility',
			'show_if'         => array(
				'dsm_section_schedule_visibility' => 'on',
			),
		);
		return array_merge( $fields_unprocessed, $fields );
	}
	public function output_section( $output, $render_slug, $module ) {
		if ( 'et_pb_section' !== $render_slug ) {
			return $output;
		} else {
			if ( isset( $module->props['dsm_section_schedule_visibility'] ) && 'on' === $module->props['dsm_section_schedule_visibility'] ) {
				if ( is_array( $output ) ) {
					return $output;
				}

				$dsm_section_schedule_visibility      = $module->props['dsm_section_schedule_visibility'];
				$dsm_section_schedule_show_hide       = $module->props['dsm_section_schedule_show_hide'];
				$dsm_section_schedule_after_datetime  = $module->props['dsm_section_schedule_after_datetime'];
				$dsm_section_schedule_between         = $module->props['dsm_section_schedule_between'];
				$dsm_section_schedule_end_datetime    = $module->props['dsm_section_schedule_end_datetime'];
				$dsm_section_schedule_user_logged_in  = $module->props['dsm_section_schedule_user_logged_in'];
				$dsm_section_schedule_day_week        = explode( '|', $module->props['dsm_section_schedule_day_week'] );
				$dsm_section_current_wp_date          = wp_date( 'Y-m-d H:i:s', null );
				$dsm_section_schedule_user_roles      = explode( '|', $module->props['dsm_section_schedule_user_roles'] );
				$dsm_section_schedule_day_week_on_off = $module->props['dsm_section_schedule_day_week_on_off'];
				$dsm_section_schedule_opening_time    = $module->props['dsm_section_schedule_opening_time'];
				$dsm_section_schedule_closing_time    = $module->props['dsm_section_schedule_closing_time'];

				if ( isset( $module->props['dsm_section_schedule_devices_disable'] ) && '' !== $module->props['dsm_section_schedule_devices_disable'] ) {
					$schedule_devices_array = explode( '|', $module->props['dsm_section_schedule_devices_disable'] );

					$i                   = 0;
					$current_media_query = 'max_width_767';

					foreach ( $schedule_devices_array as $value ) {
						if ( 'on' === $value ) {
							ET_Builder_Element::set_style(
								$render_slug,
								array(
									'selector'    => '%%order_class%%',
									'declaration' => 'display: none !important;',
									'media_query' => ET_Builder_Element::get_media_query( $current_media_query ),
								)
							);
						}
						$i++;
						$current_media_query = 1 === $i ? '768_980' : 'min_width_981';
					}
				}

				if ( 'logged-in' === $dsm_section_schedule_user_logged_in ) {
					$dsm_wp_user = wp_get_current_user();
					if ( ! empty( $dsm_section_schedule_user_roles[0] ) ) {
						$combine = array_combine( array_keys( $this->dsm_get_user_role() ), $dsm_section_schedule_user_roles );
						foreach ( array_keys( $combine, 'off' ) as $key ) {
							unset( $combine[ $key ] );
						}
						$dsm_allowed_user_roles = array_keys( $combine );
					}
				}

				if ( 'on' === $dsm_section_schedule_day_week_on_off ) {
					if ( ! empty( $dsm_section_schedule_day_week ) ) {
						$dsm_days     = array(
							'1' => 'monday',
							'2' => 'tuesday',
							'3' => 'wednesday',
							'4' => 'thursday',
							'5' => 'friday',
							'6' => 'saturday',
							'7' => 'sunday',
						);
						$combine_days = array_combine( array_keys( $dsm_days ), $dsm_section_schedule_day_week );

						$current_day  = wp_date( 'N', null );
						$current_time = wp_date( 'H:i', null );
						$opening_time = gmdate( 'H:i', strtotime( $dsm_section_schedule_opening_time ) );
						$closing_time = gmdate( 'H:i', strtotime( $dsm_section_schedule_closing_time ) );

						foreach ( array_keys( $combine_days, 'off' ) as $key ) {
							unset( $combine_days[ $key ] );
						}
						$dsm_scheduled_days = array_keys( $combine_days );

					}
				}

				if ( 'start' === $dsm_section_schedule_show_hide ) {
					if ( 'on' === $dsm_section_schedule_day_week_on_off ) {
						if ( in_array( $current_day, $dsm_scheduled_days ) ) {
							if ( $current_time >= $opening_time && $current_time <= $closing_time ) {
								if ( 'visitors' === $dsm_section_schedule_user_logged_in ) {
									if ( ! is_user_logged_in() ) {
										$output;
									} else {
										return;
									}
								} elseif ( 'logged-in' === $dsm_section_schedule_user_logged_in ) {
									if ( ! isset( $dsm_allowed_user_roles ) ) {
										return;
									}
									if ( is_user_logged_in() && array_intersect( $dsm_allowed_user_roles, $dsm_wp_user->roles ) ) {
										$output;
									} else {
										return;
									}
								} else {
									$output;
								}
							} else {
								return;
							}
						} else {
							return;
						}
					} else {
						if ( 'on' === $dsm_section_schedule_between ) {
							if ( $dsm_section_current_wp_date >= $dsm_section_schedule_after_datetime && $dsm_section_current_wp_date <= $dsm_section_schedule_end_datetime ) {
								if ( 'visitors' === $dsm_section_schedule_user_logged_in ) {
									if ( ! is_user_logged_in() ) {
										$output;
									} else {
										return;
									}
								} elseif ( 'logged-in' === $dsm_section_schedule_user_logged_in ) {
									if ( ! isset( $dsm_allowed_user_roles ) ) {
										return;
									}
									if ( is_user_logged_in() && array_intersect( $dsm_allowed_user_roles, $dsm_wp_user->roles ) ) {
										$output;
									} else {
										return;
									}
								} else {
									$output;
								}
							} else {
								return;
							}
						} else {
							if ( $dsm_section_schedule_after_datetime >= $dsm_section_current_wp_date ) {
								return;
							} else {
								if ( 'visitors' === $dsm_section_schedule_user_logged_in ) {
									if ( ! is_user_logged_in() ) {
										$output;
									} else {
										return;
									}
								} elseif ( 'logged-in' === $dsm_section_schedule_user_logged_in ) {
									if ( ! isset( $dsm_allowed_user_roles ) ) {
										return;
									}
									if ( is_user_logged_in() && array_intersect( $dsm_allowed_user_roles, $dsm_wp_user->roles ) ) {
										$output;
									} else {
										return;
									}
								} else {
									$output;
								}
							}
						}
					}
				} else {
					if ( 'on' === $dsm_section_schedule_day_week_on_off ) {
						if ( in_array( $current_day, $dsm_scheduled_days ) ) {
							if ( $current_time >= $opening_time && $current_time <= $closing_time ) {
								return;
							} else {
								if ( 'visitors' === $dsm_section_schedule_user_logged_in ) {
									if ( ! is_user_logged_in() ) {
										$output;
									} else {
										return;
									}
								} elseif ( 'logged-in' === $dsm_section_schedule_user_logged_in ) {
									if ( ! isset( $dsm_allowed_user_roles ) ) {
										return;
									}
									if ( is_user_logged_in() && array_intersect( $dsm_allowed_user_roles, $dsm_wp_user->roles ) ) {
										$output;
									} else {
										return;
									}
								} else {
									$output;
								}
							}
						} else {
							return;
						}
					} else {
						if ( 'on' === $dsm_section_schedule_between ) {
							if ( $dsm_section_current_wp_date >= $dsm_section_schedule_after_datetime && $dsm_section_current_wp_date <= $dsm_section_schedule_end_datetime ) {
								return;
							} else {
								if ( 'visitors' === $dsm_section_schedule_user_logged_in ) {
									if ( ! is_user_logged_in() ) {
										$output;
									} else {
										return;
									}
								} elseif ( 'logged-in' === $dsm_section_schedule_user_logged_in ) {
									if ( ! isset( $dsm_allowed_user_roles ) ) {
										return;
									}
									if ( is_user_logged_in() && array_intersect( $dsm_allowed_user_roles, $dsm_wp_user->roles ) ) {
										$output;
									} else {
										return;
									}
								} else {
									$output;
								}
							}
						} else {
							if ( $dsm_section_schedule_after_datetime <= $dsm_section_current_wp_date ) {
								return;
							} else {
								if ( 'visitors' === $dsm_section_schedule_user_logged_in ) {
									if ( ! is_user_logged_in() ) {
										$output;
									} else {
										return;
									}
								} elseif ( 'logged-in' === $dsm_section_schedule_user_logged_in ) {
									if ( ! isset( $dsm_allowed_user_roles ) ) {
										return;
									}
									if ( is_user_logged_in() && array_intersect( $dsm_allowed_user_roles, $dsm_wp_user->roles ) ) {
										$output;
									} else {
										return;
									}
								} else {
									$output;
								}
							}
						}
					}
				}
			}
		}

		return $output;
	}
	public function dsm_add_row_setting( $fields_unprocessed ) {
		$fields                                     = array();
		$fields['dsm_row_schedule_visibility']      = array(
			'label'            => esc_html__( 'Use Scheduled Element', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'option_category'  => 'configuration',
			'options'          => array(
				'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'default_on_front' => 'off',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'description'      => esc_html__( 'Here you can choose whether your Row will show/hide depending on the given date/time.', 'dsm-supreme-modules-pro-for-divi' ),
		);
		$fields['dsm_row_schedule_show_hide']       = array(
			'label'            => esc_html__( 'Show or Hide Row', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'select',
			'option_category'  => 'configuration',
			'options'          => array(
				'start' => esc_html__( 'Show', 'dsm-supreme-modules-pro-for-divi' ),
				'end'   => esc_html__( 'Hide', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'default_on_front' => 'start',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'show_if'          => array(
				'dsm_row_schedule_visibility' => 'on',
			),
		);
		$fields['dsm_row_schedule_after_datetime']  = array(
			'default'     => '',
			'label'       => esc_html__( 'Schedule a Date/Time', 'dsm-supreme-modules-pro-for-divi' ),
			'type'        => 'date_picker',
			'tab_slug'    => 'custom_css',
			'toggle_slug' => 'visibility',
			'show_if'     => array(
				'dsm_row_schedule_visibility'      => 'on',
				'dsm_row_schedule_day_week_on_off' => 'off',
			),
		);
		$fields['dsm_row_schedule_between']         = array(
			'label'            => esc_html__( 'Use Between Date/Time', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'option_category'  => 'configuration',
			'options'          => array(
				'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'default_on_front' => 'off',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'description'      => esc_html__( 'Here you can choose whether your Section will show or hide depending on the given date/time.', 'dsm-supreme-modules-pro-for-divi' ),
			'show_if'          => array(
				'dsm_row_schedule_visibility'      => 'on',
				'dsm_row_schedule_day_week_on_off' => 'off',
			),
		);
		$fields['dsm_row_schedule_end_datetime']    = array(
			'default'     => '',
			'label'       => esc_html__( 'Schedule a End Date/Time', 'dsm-supreme-modules-pro-for-divi' ),
			'type'        => 'date_picker',
			'tab_slug'    => 'custom_css',
			'toggle_slug' => 'visibility',
			'show_if'     => array(
				'dsm_row_schedule_visibility'      => 'on',
				'dsm_row_schedule_between'         => 'on',
				'dsm_row_schedule_day_week_on_off' => 'off',
			),
		);
		$fields['dsm_row_schedule_day_week_on_off'] = array(
			'label'            => esc_html__( 'Use Business Hour/Time', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'option_category'  => 'configuration',
			'options'          => array(
				'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'default_on_front' => 'off',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'description'      => esc_html__( 'Here you can choose whether your row will show or hide depending on the given date/time.', 'dsm-supreme-modules-pro-for-divi' ),
			'show_if'          => array(
				'dsm_row_schedule_visibility' => 'on',
			),
		);
		$fields['dsm_row_schedule_day_week']        = array(
			'label'           => esc_html__( 'Select Day', 'dsm-supreme-modules-pro-for-divi' ),
			'type'            => 'multiple_checkboxes',
			'option_category' => 'configuration',
			'options'         => array(
				'monday'    => esc_html__( 'Monday', 'dsm-supreme-modules-pro-for-divi' ),
				'tuesday'   => esc_html__( 'Tuesday', 'dsm-supreme-modules-pro-for-divi' ),
				'wednesday' => esc_html__( 'Wednesday', 'dsm-supreme-modules-pro-for-divi' ),
				'thursday'  => esc_html__( 'Thursday', 'dsm-supreme-modules-pro-for-divi' ),
				'friday'    => esc_html__( 'Friday', 'dsm-supreme-modules-pro-for-divi' ),
				'saturday'  => esc_html__( 'Saturday', 'dsm-supreme-modules-pro-for-divi' ),
				'sunday'    => esc_html__( 'Sunday', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'tab_slug'        => 'custom_css',
			'toggle_slug'     => 'visibility',
			'show_if'         => array(
				'dsm_row_schedule_visibility'      => 'on',
				'dsm_row_schedule_day_week_on_off' => 'on',
			),
			'return_slugs'    => true,
		);
		$fields['dsm_row_schedule_opening_time']    = array(
			'label'            => esc_html__( 'Opening Time', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'text',
			'option_category'  => 'basic_option',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'show_if'          => array(
				'dsm_row_schedule_visibility'      => 'on',
				'dsm_row_schedule_day_week_on_off' => 'on',
			),
			'default_on_front' => '08:00',
		);
		$fields['dsm_row_schedule_closing_time']    = array(
			'label'            => esc_html__( 'Closing Time', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'text',
			'option_category'  => 'basic_option',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'show_if'          => array(
				'dsm_row_schedule_visibility'      => 'on',
				'dsm_row_schedule_day_week_on_off' => 'on',
			),
			'default_on_front' => '18:00',
		);
		$fields['dsm_row_schedule_user_logged_in']  = array(
			'label'            => esc_html__( 'Apply To', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'select',
			'option_category'  => 'configuration',
			'options'          => array(
				'all'       => esc_html__( 'All Users', 'dsm-supreme-modules-pro-for-divi' ),
				'logged-in' => esc_html__( 'Logged In Users', 'dsm-supreme-modules-pro-for-divi' ),
				'visitors'  => esc_html__( 'Visitor Users', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'default_on_front' => 'all',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'show_if'          => array(
				'dsm_row_schedule_visibility' => 'on',
			),
		);
		$fields['dsm_row_schedule_user_roles']      = array(
			'label'           => esc_html__( 'Select User Roles', 'dsm-supreme-modules-pro-for-divi' ),
			'type'            => 'multiple_checkboxes',
			'option_category' => 'configuration',
			'options'         => $this->dsm_get_user_role(),
			'tab_slug'        => 'custom_css',
			'toggle_slug'     => 'visibility',
			'show_if'         => array(
				'dsm_row_schedule_visibility'     => 'on',
				'dsm_row_schedule_user_logged_in' => 'logged-in',
			),
			'return_slugs'    => true,
		);
		$fields['dsm_row_schedule_devices_disable'] = array(
			'label'           => esc_html__( 'Disable on', 'dsm-supreme-modules-pro-for-divi' ),
			'type'            => 'multiple_checkboxes',
			'options'         => array(
				'phone'   => esc_html__( 'Phone', 'et_buildsm-supreme-modules-pro-for-divider' ),
				'tablet'  => esc_html__( 'Tablet', 'dsm-supreme-modules-pro-for-divi' ),
				'desktop' => esc_html__( 'Desktop', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'option_category' => 'configuration',
			'description'     => esc_html__( 'This will disable the row on selected devices', 'dsm-supreme-modules-pro-for-divi' ),
			'tab_slug'        => 'custom_css',
			'toggle_slug'     => 'visibility',
			'show_if'         => array(
				'dsm_row_schedule_visibility' => 'on',
			),
		);
		return array_merge( $fields_unprocessed, $fields );
	}
	public function output_row( $output, $render_slug, $module ) {
		if ( 'et_pb_row' !== $render_slug ) {
			return $output;
		} else {
			if ( isset( $module->props['dsm_row_schedule_visibility'] ) && 'on' === $module->props['dsm_row_schedule_visibility'] ) {
				if ( is_array( $output ) ) {
					return $output;
				}

				$dsm_row_schedule_visibility      = $module->props['dsm_row_schedule_visibility'];
				$dsm_row_schedule_show_hide       = $module->props['dsm_row_schedule_show_hide'];
				$dsm_row_schedule_after_datetime  = $module->props['dsm_row_schedule_after_datetime'];
				$dsm_row_schedule_between         = $module->props['dsm_row_schedule_between'];
				$dsm_row_schedule_end_datetime    = $module->props['dsm_row_schedule_end_datetime'];
				$dsm_row_schedule_user_logged_in  = $module->props['dsm_row_schedule_user_logged_in'];
				$dsm_row_schedule_day_week        = explode( '|', $module->props['dsm_row_schedule_day_week'] );
				$dsm_row_current_wp_date          = wp_date( 'Y-m-d H:i:s', null );
				$dsm_row_schedule_user_roles      = explode( '|', $module->props['dsm_row_schedule_user_roles'] );
				$dsm_row_schedule_day_week_on_off = $module->props['dsm_row_schedule_day_week_on_off'];
				$dsm_row_schedule_opening_time    = $module->props['dsm_row_schedule_opening_time'];
				$dsm_row_schedule_closing_time    = $module->props['dsm_row_schedule_closing_time'];

				if ( isset( $module->props['dsm_row_schedule_devices_disable'] ) && '' !== $module->props['dsm_row_schedule_devices_disable'] ) {
					$schedule_devices_array = explode( '|', $module->props['dsm_row_schedule_devices_disable'] );

					$i                   = 0;
					$current_media_query = 'max_width_767';

					foreach ( $schedule_devices_array as $value ) {
						if ( 'on' === $value ) {
							ET_Builder_Element::set_style(
								$render_slug,
								array(
									'selector'    => '%%order_class%%',
									'declaration' => 'display: none !important;',
									'media_query' => ET_Builder_Element::get_media_query( $current_media_query ),
								)
							);
						}
						$i++;
						$current_media_query = 1 === $i ? '768_980' : 'min_width_981';
					}
				}

				if ( 'logged-in' === $dsm_row_schedule_user_logged_in ) {
					$dsm_wp_user = wp_get_current_user();
					if ( ! empty( $dsm_row_schedule_user_roles[0] ) ) {
						$combine = array_combine( array_keys( $this->dsm_get_user_role() ), $dsm_row_schedule_user_roles );
						foreach ( array_keys( $combine, 'off' ) as $key ) {
							unset( $combine[ $key ] );
						}
						$dsm_allowed_user_roles = array_keys( $combine );
					}
				}

				if ( 'on' === $dsm_row_schedule_day_week_on_off ) {
					if ( ! empty( $dsm_row_schedule_day_week ) ) {
						$dsm_days     = array(
							'1' => 'monday',
							'2' => 'tuesday',
							'3' => 'wednesday',
							'4' => 'thursday',
							'5' => 'friday',
							'6' => 'saturday',
							'7' => 'sunday',
						);
						$combine_days = array_combine( array_keys( $dsm_days ), $dsm_row_schedule_day_week );

						$current_day  = wp_date( 'N', null );
						$current_time = wp_date( 'H:i', null );
						$opening_time = gmdate( 'H:i', strtotime( $dsm_row_schedule_opening_time ) );
						$closing_time = gmdate( 'H:i', strtotime( $dsm_row_schedule_closing_time ) );

						foreach ( array_keys( $combine_days, 'off' ) as $key ) {
							unset( $combine_days[ $key ] );
						}
						$dsm_scheduled_days = array_keys( $combine_days );

					}
				}

				if ( 'start' === $dsm_row_schedule_show_hide ) {
					if ( 'on' === $dsm_row_schedule_day_week_on_off ) {
						if ( in_array( $current_day, $dsm_scheduled_days ) ) {
							if ( $current_time >= $opening_time && $current_time <= $closing_time ) {
								if ( 'visitors' === $dsm_row_schedule_user_logged_in ) {
									if ( ! is_user_logged_in() ) {
										$output;
									} else {
										return;
									}
								} elseif ( 'logged-in' === $dsm_row_schedule_user_logged_in ) {
									if ( ! isset( $dsm_allowed_user_roles ) ) {
										return;
									}
									if ( is_user_logged_in() && array_intersect( $dsm_allowed_user_roles, $dsm_wp_user->roles ) ) {
										$output;
									} else {
										return;
									}
								} else {
									$output;
								}
							} else {
								return;
							}
						} else {
							return;
						}
					} else {
						if ( 'on' === $dsm_row_schedule_between ) {
							if ( $dsm_row_current_wp_date >= $dsm_row_schedule_after_datetime && $dsm_row_current_wp_date <= $dsm_row_schedule_end_datetime ) {
								if ( 'visitors' === $dsm_row_schedule_user_logged_in ) {
									if ( ! is_user_logged_in() ) {
										$output;
									} else {
										return;
									}
								} elseif ( 'logged-in' === $dsm_row_schedule_user_logged_in ) {
									if ( ! isset( $dsm_allowed_user_roles ) ) {
										return;
									}
									if ( is_user_logged_in() && array_intersect( $dsm_allowed_user_roles, $dsm_wp_user->roles ) ) {
										$output;
									} else {
										return;
									}
								} else {
									$output;
								}
							} else {
								return;
							}
						} else {
							if ( $dsm_row_schedule_after_datetime >= $dsm_row_current_wp_date ) {
								return;
							} else {
								if ( 'visitors' === $dsm_row_schedule_user_logged_in ) {
									if ( ! is_user_logged_in() ) {
										$output;
									} else {
										return;
									}
								} elseif ( 'logged-in' === $dsm_row_schedule_user_logged_in ) {
									if ( ! isset( $dsm_allowed_user_roles ) ) {
										return;
									}
									if ( is_user_logged_in() && array_intersect( $dsm_allowed_user_roles, $dsm_wp_user->roles ) ) {
										$output;
									} else {
										return;
									}
								} else {
									$output;
								}
							}
						}
					}
				} else {
					if ( 'on' === $dsm_row_schedule_day_week_on_off ) {
						if ( in_array( $current_day, $dsm_scheduled_days ) ) {
							if ( $current_time >= $opening_time && $current_time <= $closing_time ) {
								return;
							} else {
								if ( 'visitors' === $dsm_row_schedule_user_logged_in ) {
									if ( ! is_user_logged_in() ) {
										$output;
									} else {
										return;
									}
								} elseif ( 'logged-in' === $dsm_row_schedule_user_logged_in ) {
									if ( ! isset( $dsm_allowed_user_roles ) ) {
										return;
									}
									if ( is_user_logged_in() && array_intersect( $dsm_allowed_user_roles, $dsm_wp_user->roles ) ) {
										$output;
									} else {
										return;
									}
								} else {
									$output;
								}
							}
						} else {
							return;
						}
					} else {
						if ( 'on' === $dsm_row_schedule_between ) {
							if ( $dsm_row_current_wp_date >= $dsm_row_schedule_after_datetime && $dsm_row_current_wp_date <= $dsm_row_schedule_end_datetime ) {
								return;
							} else {
								if ( 'visitors' === $dsm_row_schedule_user_logged_in ) {
									if ( ! is_user_logged_in() ) {
										$output;
									} else {
										return;
									}
								} elseif ( 'logged-in' === $dsm_row_schedule_user_logged_in ) {
									if ( ! isset( $dsm_allowed_user_roles ) ) {
										return;
									}
									if ( is_user_logged_in() && array_intersect( $dsm_allowed_user_roles, $dsm_wp_user->roles ) ) {
										$output;
									} else {
										return;
									}
								} else {
									$output;
								}
							}
						} else {
							if ( $dsm_row_schedule_after_datetime <= $dsm_row_current_wp_date ) {
								return;
							} else {
								if ( 'visitors' === $dsm_row_schedule_user_logged_in ) {
									if ( ! is_user_logged_in() ) {
										$output;
									} else {
										return;
									}
								} elseif ( 'logged-in' === $dsm_row_schedule_user_logged_in ) {
									if ( ! isset( $dsm_allowed_user_roles ) ) {
										return;
									}
									if ( is_user_logged_in() && array_intersect( $dsm_allowed_user_roles, $dsm_wp_user->roles ) ) {
										$output;
									} else {
										return;
									}
								} else {
									$output;
								}
							}
						}
					}
				}
			}
		}

		return $output;

	}
	public function dsm_add_column_setting( $fields_unprocessed ) {
		$fields                                        = array();
		$fields['dsm_column_schedule_visibility']      = array(
			'label'            => esc_html__( 'Use Scheduled Element', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'option_category'  => 'configuration',
			'options'          => array(
				'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'default_on_front' => 'off',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'description'      => esc_html__( 'Here you can choose whether your Row will show/hide depending on the given date/time.', 'dsm-supreme-modules-pro-for-divi' ),
		);
		$fields['dsm_column_schedule_show_hide']       = array(
			'label'            => esc_html__( 'Show or Hide Row', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'select',
			'option_category'  => 'configuration',
			'options'          => array(
				'start' => esc_html__( 'Show', 'dsm-supreme-modules-pro-for-divi' ),
				'end'   => esc_html__( 'Hide', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'default_on_front' => 'start',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'show_if'          => array(
				'dsm_column_schedule_visibility' => 'on',
			),
		);
		$fields['dsm_column_schedule_after_datetime']  = array(
			'default'     => '',
			'label'       => esc_html__( 'Schedule a Date/Time', 'dsm-supreme-modules-pro-for-divi' ),
			'type'        => 'date_picker',
			'tab_slug'    => 'custom_css',
			'toggle_slug' => 'visibility',
			'show_if'     => array(
				'dsm_column_schedule_visibility'      => 'on',
				'dsm_column_schedule_day_week_on_off' => 'off',
			),
		);
		$fields['dsm_column_schedule_between']         = array(
			'label'            => esc_html__( 'Use Between Date/Time', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'option_category'  => 'configuration',
			'options'          => array(
				'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'default_on_front' => 'off',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'description'      => esc_html__( 'Here you can choose whether your Section will show or hide depending on the given date/time.', 'dsm-supreme-modules-pro-for-divi' ),
			'show_if'          => array(
				'dsm_column_schedule_visibility'      => 'on',
				'dsm_column_schedule_day_week_on_off' => 'off',
			),
		);
		$fields['dsm_column_schedule_end_datetime']    = array(
			'default'     => '',
			'label'       => esc_html__( 'Schedule a End Date/Time', 'dsm-supreme-modules-pro-for-divi' ),
			'type'        => 'date_picker',
			'tab_slug'    => 'custom_css',
			'toggle_slug' => 'visibility',
			'show_if'     => array(
				'dsm_column_schedule_visibility'      => 'on',
				'dsm_column_schedule_between'         => 'on',
				'dsm_column_schedule_day_week_on_off' => 'off',
			),
		);
		$fields['dsm_column_schedule_day_week_on_off'] = array(
			'label'            => esc_html__( 'Use Business Hour/Time', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'option_category'  => 'configuration',
			'options'          => array(
				'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'default_on_front' => 'off',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'description'      => esc_html__( 'Here you can choose whether your column will show or hide depending on the given date/time.', 'dsm-supreme-modules-pro-for-divi' ),
			'show_if'          => array(
				'dsm_column_schedule_visibility' => 'on',
			),
		);
		$fields['dsm_column_schedule_day_week']        = array(
			'label'           => esc_html__( 'Select Day', 'dsm-supreme-modules-pro-for-divi' ),
			'type'            => 'multiple_checkboxes',
			'option_category' => 'configuration',
			'options'         => array(
				'monday'    => esc_html__( 'Monday', 'dsm-supreme-modules-pro-for-divi' ),
				'tuesday'   => esc_html__( 'Tuesday', 'dsm-supreme-modules-pro-for-divi' ),
				'wednesday' => esc_html__( 'Wednesday', 'dsm-supreme-modules-pro-for-divi' ),
				'thursday'  => esc_html__( 'Thursday', 'dsm-supreme-modules-pro-for-divi' ),
				'friday'    => esc_html__( 'Friday', 'dsm-supreme-modules-pro-for-divi' ),
				'saturday'  => esc_html__( 'Saturday', 'dsm-supreme-modules-pro-for-divi' ),
				'sunday'    => esc_html__( 'Sunday', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'tab_slug'        => 'custom_css',
			'toggle_slug'     => 'visibility',
			'show_if'         => array(
				'dsm_column_schedule_visibility'      => 'on',
				'dsm_column_schedule_day_week_on_off' => 'on',
			),
			'return_slugs'    => true,
		);
		$fields['dsm_column_schedule_opening_time']    = array(
			'label'            => esc_html__( 'Opening Time', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'text',
			'option_category'  => 'basic_option',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'show_if'          => array(
				'dsm_column_schedule_visibility'      => 'on',
				'dsm_column_schedule_day_week_on_off' => 'on',
			),
			'default_on_front' => '08:00',
		);
		$fields['dsm_column_schedule_closing_time']    = array(
			'label'            => esc_html__( 'Closing Time', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'text',
			'option_category'  => 'basic_option',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'show_if'          => array(
				'dsm_column_schedule_visibility'      => 'on',
				'dsm_column_schedule_day_week_on_off' => 'on',
			),
			'default_on_front' => '18:00',
		);
		$fields['dsm_column_schedule_user_logged_in']  = array(
			'label'            => esc_html__( 'Apply To', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'select',
			'option_category'  => 'configuration',
			'options'          => array(
				'all'       => esc_html__( 'All Users', 'dsm-supreme-modules-pro-for-divi' ),
				'logged-in' => esc_html__( 'Logged In Users', 'dsm-supreme-modules-pro-for-divi' ),
				'visitors'  => esc_html__( 'Visitor Users', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'default_on_front' => 'all',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'show_if'          => array(
				'dsm_column_schedule_visibility' => 'on',
			),
		);
		$fields['dsm_column_schedule_user_roles']      = array(
			'label'           => esc_html__( 'Select User Roles', 'dsm-supreme-modules-pro-for-divi' ),
			'type'            => 'multiple_checkboxes',
			'option_category' => 'configuration',
			'options'         => $this->dsm_get_user_role(),
			'tab_slug'        => 'custom_css',
			'toggle_slug'     => 'visibility',
			'show_if'         => array(
				'dsm_column_schedule_visibility'     => 'on',
				'dsm_column_schedule_user_logged_in' => 'logged-in',
			),
			'return_slugs'    => true,
		);
		$fields['dsm_column_schedule_devices_disable'] = array(
			'label'           => esc_html__( 'Disable on', 'dsm-supreme-modules-pro-for-divi' ),
			'type'            => 'multiple_checkboxes',
			'options'         => array(
				'phone'   => esc_html__( 'Phone', 'et_buildsm-supreme-modules-pro-for-divider' ),
				'tablet'  => esc_html__( 'Tablet', 'dsm-supreme-modules-pro-for-divi' ),
				'desktop' => esc_html__( 'Desktop', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'option_category' => 'configuration',
			'description'     => esc_html__( 'This will disable the column on selected devices', 'dsm-supreme-modules-pro-for-divi' ),
			'tab_slug'        => 'custom_css',
			'toggle_slug'     => 'visibility',
			'show_if'         => array(
				'dsm_column_schedule_visibility' => 'on',
			),
		);
		return array_merge( $fields_unprocessed, $fields );
	}
	public function output_column( $output, $render_slug, $module ) {
		if ( 'et_pb_column' !== $render_slug ) {
			return $output;
		} else {
			if ( isset( $module->props['dsm_column_schedule_visibility'] ) && 'on' === $module->props['dsm_column_schedule_visibility'] ) {
				if ( is_array( $output ) ) {
					return $output;
				}

				$dsm_column_schedule_visibility      = $module->props['dsm_column_schedule_visibility'];
				$dsm_column_schedule_show_hide       = $module->props['dsm_column_schedule_show_hide'];
				$dsm_column_schedule_after_datetime  = $module->props['dsm_column_schedule_after_datetime'];
				$dsm_column_schedule_between         = $module->props['dsm_column_schedule_between'];
				$dsm_column_schedule_end_datetime    = $module->props['dsm_column_schedule_end_datetime'];
				$dsm_column_schedule_user_logged_in  = $module->props['dsm_column_schedule_user_logged_in'];
				$dsm_column_schedule_day_week        = explode( '|', $module->props['dsm_column_schedule_day_week'] );
				$dsm_column_current_wp_date          = wp_date( 'Y-m-d H:i:s', null );
				$dsm_column_schedule_user_roles      = explode( '|', $module->props['dsm_column_schedule_user_roles'] );
				$dsm_column_schedule_day_week_on_off = $module->props['dsm_column_schedule_day_week_on_off'];
				$dsm_column_schedule_opening_time    = $module->props['dsm_column_schedule_opening_time'];
				$dsm_column_schedule_closing_time    = $module->props['dsm_column_schedule_closing_time'];

				if ( isset( $module->props['dsm_column_schedule_devices_disable'] ) && '' !== $module->props['dsm_column_schedule_devices_disable'] ) {
					$schedule_devices_array = explode( '|', $module->props['dsm_column_schedule_devices_disable'] );

					$i                   = 0;
					$current_media_query = 'max_width_767';

					foreach ( $schedule_devices_array as $value ) {
						if ( 'on' === $value ) {
							ET_Builder_Element::set_style(
								$render_slug,
								array(
									'selector'    => '%%order_class%%',
									'declaration' => 'display: none !important;',
									'media_query' => ET_Builder_Element::get_media_query( $current_media_query ),
								)
							);
						}
						$i++;
						$current_media_query = 1 === $i ? '768_980' : 'min_width_981';
					}
				}

				if ( 'logged-in' === $dsm_column_schedule_user_logged_in ) {
					$dsm_wp_user = wp_get_current_user();
					if ( ! empty( $dsm_column_schedule_user_roles ) ) {
						$combine = array_combine( array_keys( $this->dsm_get_user_role() ), $dsm_column_schedule_user_roles );
						foreach ( array_keys( $combine, 'off' ) as $key ) {
							unset( $combine[ $key ] );
						}
						$dsm_allowed_user_roles = array_keys( $combine );
					}
				}

				if ( 'on' === $dsm_column_schedule_day_week_on_off ) {
					if ( ! empty( $dsm_column_schedule_day_week ) ) {
						$dsm_days     = array(
							'1' => 'monday',
							'2' => 'tuesday',
							'3' => 'wednesday',
							'4' => 'thursday',
							'5' => 'friday',
							'6' => 'saturday',
							'7' => 'sunday',
						);
						$combine_days = array_combine( array_keys( $dsm_days ), $dsm_column_schedule_day_week );

						$current_day  = wp_date( 'N', null );
						$current_time = wp_date( 'H:i', null );
						$opening_time = gmdate( 'H:i', strtotime( $dsm_column_schedule_opening_time ) );
						$closing_time = gmdate( 'H:i', strtotime( $dsm_column_schedule_closing_time ) );

						foreach ( array_keys( $combine_days, 'off' ) as $key ) {
							unset( $combine_days[ $key ] );
						}
						$dsm_scheduled_days = array_keys( $combine_days );

					}
				}

				if ( 'start' === $dsm_column_schedule_show_hide ) {
					if ( 'on' === $dsm_column_schedule_day_week_on_off ) {
						if ( in_array( $current_day, $dsm_scheduled_days ) ) {
							if ( $current_time >= $opening_time && $current_time <= $closing_time ) {
								if ( 'visitors' === $dsm_column_schedule_user_logged_in ) {
									if ( ! is_user_logged_in() ) {
										$output;
									} else {
										return;
									}
								} elseif ( 'logged-in' === $dsm_column_schedule_user_logged_in ) {
									if ( is_user_logged_in() && array_intersect( $dsm_allowed_user_roles, $dsm_wp_user->roles ) ) {
										$output;
									} else {
										return;
									}
								} else {
									$output;
								}
							} else {
								return;
							}
						} else {
							return;
						}
					} else {
						if ( 'on' === $dsm_column_schedule_between ) {
							if ( $dsm_column_current_wp_date >= $dsm_column_schedule_after_datetime && $dsm_column_current_wp_date <= $dsm_column_schedule_end_datetime ) {
								if ( 'visitors' === $dsm_column_schedule_user_logged_in ) {
									if ( ! is_user_logged_in() ) {
										$output;
									} else {
										return;
									}
								} elseif ( 'logged-in' === $dsm_column_schedule_user_logged_in ) {
									if ( is_user_logged_in() && array_intersect( $dsm_allowed_user_roles, $dsm_wp_user->roles ) ) {
										$output;
									} else {
										return;
									}
								} else {
									$output;
								}
							} else {
								return;
							}
						} else {
							if ( $dsm_column_schedule_after_datetime >= $dsm_column_current_wp_date ) {
								return;
							} else {
								if ( 'visitors' === $dsm_column_schedule_user_logged_in ) {
									if ( ! is_user_logged_in() ) {
										$output;
									} else {
										return;
									}
								} elseif ( 'logged-in' === $dsm_column_schedule_user_logged_in ) {
									if ( is_user_logged_in() && array_intersect( $dsm_allowed_user_roles, $dsm_wp_user->roles ) ) {
										$output;
									} else {
										return;
									}
								} else {
									$output;
								}
							}
						}
					}
				} else {
					if ( 'on' === $dsm_column_schedule_day_week_on_off ) {
						if ( in_array( $current_day, $dsm_scheduled_days ) ) {
							if ( $current_time >= $opening_time && $current_time <= $closing_time ) {
								return;
							} else {
								if ( 'visitors' === $dsm_column_schedule_user_logged_in ) {
									if ( ! is_user_logged_in() ) {
										$output;
									} else {
										return;
									}
								} elseif ( 'logged-in' === $dsm_column_schedule_user_logged_in ) {
									if ( is_user_logged_in() && array_intersect( $dsm_allowed_user_roles, $dsm_wp_user->roles ) ) {
										$output;
									} else {
										return;
									}
								} else {
									$output;
								}
							}
						} else {
							return;
						}
					} else {
						if ( 'on' === $dsm_column_schedule_between ) {
							if ( $dsm_column_current_wp_date >= $dsm_column_schedule_after_datetime && $dsm_column_current_wp_date <= $dsm_column_schedule_end_datetime ) {
								return;
							} else {
								if ( 'visitors' === $dsm_column_schedule_user_logged_in ) {
									if ( ! is_user_logged_in() ) {
										$output;
									} else {
										return;
									}
								} elseif ( 'logged-in' === $dsm_column_schedule_user_logged_in ) {
									if ( is_user_logged_in() && array_intersect( $dsm_allowed_user_roles, $dsm_wp_user->roles ) ) {
										$output;
									} else {
										return;
									}
								} else {
									$output;
								}
							}
						} else {
							if ( $dsm_column_schedule_after_datetime <= $dsm_column_current_wp_date ) {
								return;
							} else {
								if ( 'visitors' === $dsm_column_schedule_user_logged_in ) {
									if ( ! is_user_logged_in() ) {
										$output;
									} else {
										return;
									}
								} elseif ( 'logged-in' === $dsm_column_schedule_user_logged_in ) {
									if ( is_user_logged_in() && array_intersect( $dsm_allowed_user_roles, $dsm_wp_user->roles ) ) {
										$output;
									} else {
										return;
									}
								} else {
									$output;
								}
							}
						}
					}
				}
			}
		}

		return $output;

	}
	public function dsm_add_modules_setting( $fields_unprocessed ) {
		$fields                                        = array();
		$fields['dsm_modules_schedule_visibility']     = array(
			'label'            => esc_html__( 'Use Scheduled Element', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'option_category'  => 'configuration',
			'options'          => array(
				'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'default_on_front' => 'off',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'description'      => esc_html__( 'Here you can choose whether your Module will show or hide depending on the given date/time.', 'dsm-supreme-modules-pro-for-divi' ),
		);
		$fields['dsm_modules_schedule_show_hide']      = array(
			'label'            => esc_html__( 'Show or Hide Module', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'select',
			'option_category'  => 'configuration',
			'options'          => array(
				'start' => esc_html__( 'Show', 'dsm-supreme-modules-pro-for-divi' ),
				'end'   => esc_html__( 'Hide', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'default_on_front' => 'start',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'show_if'          => array(
				'dsm_modules_schedule_visibility' => 'on',
			),
		);
		$fields['dsm_modules_schedule_after_datetime'] = array(
			'default'     => '',
			'label'       => esc_html__( 'Schedule a Date/Time', 'dsm-supreme-modules-pro-for-divi' ),
			'type'        => 'date_picker',
			'tab_slug'    => 'custom_css',
			'toggle_slug' => 'visibility',
			'show_if'     => array(
				'dsm_modules_schedule_visibility'      => 'on',
				'dsm_modules_schedule_day_week_on_off' => 'off',
			),
		);
		$fields['dsm_modules_schedule_between']        = array(
			'label'            => esc_html__( 'Use Between Date/Time', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'option_category'  => 'configuration',
			'options'          => array(
				'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'default_on_front' => 'off',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'description'      => esc_html__( 'Here you can choose whether your Section will show or hide depending on the given date/time.', 'dsm-supreme-modules-pro-for-divi' ),
			'show_if'          => array(
				'dsm_modules_schedule_visibility'      => 'on',
				'dsm_modules_schedule_day_week_on_off' => 'off',
			),
		);
		$fields['dsm_modules_schedule_end_datetime']   = array(
			'default'     => '',
			'label'       => esc_html__( 'Schedule a End Date/Time', 'dsm-supreme-modules-pro-for-divi' ),
			'type'        => 'date_picker',
			'tab_slug'    => 'custom_css',
			'toggle_slug' => 'visibility',
			'show_if'     => array(
				'dsm_modules_schedule_visibility'      => 'on',
				'dsm_modules_schedule_between'         => 'on',
				'dsm_modules_schedule_day_week_on_off' => 'off',
			),
		);
		$fields['dsm_modules_schedule_day_week_on_off'] = array(
			'label'            => esc_html__( 'Use Business Hour/Time', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'option_category'  => 'configuration',
			'options'          => array(
				'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'default_on_front' => 'off',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'description'      => esc_html__( 'Here you can choose whether your modules will show or hide depending on the given date/time.', 'dsm-supreme-modules-pro-for-divi' ),
			'show_if'          => array(
				'dsm_modules_schedule_visibility' => 'on',
			),
		);
		$fields['dsm_modules_schedule_day_week']        = array(
			'label'           => esc_html__( 'Select Day', 'dsm-supreme-modules-pro-for-divi' ),
			'type'            => 'multiple_checkboxes',
			'option_category' => 'configuration',
			'options'         => array(
				'monday'    => esc_html__( 'Monday', 'dsm-supreme-modules-pro-for-divi' ),
				'tuesday'   => esc_html__( 'Tuesday', 'dsm-supreme-modules-pro-for-divi' ),
				'wednesday' => esc_html__( 'Wednesday', 'dsm-supreme-modules-pro-for-divi' ),
				'thursday'  => esc_html__( 'Thursday', 'dsm-supreme-modules-pro-for-divi' ),
				'friday'    => esc_html__( 'Friday', 'dsm-supreme-modules-pro-for-divi' ),
				'saturday'  => esc_html__( 'Saturday', 'dsm-supreme-modules-pro-for-divi' ),
				'sunday'    => esc_html__( 'Sunday', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'tab_slug'        => 'custom_css',
			'toggle_slug'     => 'visibility',
			'show_if'         => array(
				'dsm_modules_schedule_visibility'      => 'on',
				'dsm_modules_schedule_day_week_on_off' => 'on',
			),
			'return_slugs'    => true,
		);
		$fields['dsm_modules_schedule_opening_time']    = array(
			'label'            => esc_html__( 'Opening Time', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'text',
			'option_category'  => 'basic_option',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'show_if'          => array(
				'dsm_modules_schedule_visibility'      => 'on',
				'dsm_modules_schedule_day_week_on_off' => 'on',
			),
			'default_on_front' => '08:00',
		);
		$fields['dsm_modules_schedule_closing_time']    = array(
			'label'            => esc_html__( 'Closing Time', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'text',
			'option_category'  => 'basic_option',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'show_if'          => array(
				'dsm_modules_schedule_visibility'      => 'on',
				'dsm_modules_schedule_day_week_on_off' => 'on',
			),
			'default_on_front' => '18:00',
		);
		$fields['dsm_modules_schedule_user_logged_in']  = array(
			'label'            => esc_html__( 'Apply To', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'select',
			'option_category'  => 'configuration',
			'options'          => array(
				'all'       => esc_html__( 'All Users', 'dsm-supreme-modules-pro-for-divi' ),
				'logged-in' => esc_html__( 'Logged In Users', 'dsm-supreme-modules-pro-for-divi' ),
				'visitors'  => esc_html__( 'Visitor Users', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'default_on_front' => 'all',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'show_if'          => array(
				'dsm_modules_schedule_visibility' => 'on',
			),
		);
		$fields['dsm_modules_schedule_user_roles']      = array(
			'label'           => esc_html__( 'Select User Roles', 'dsm-supreme-modules-pro-for-divi' ),
			'type'            => 'multiple_checkboxes',
			'option_category' => 'configuration',
			'options'         => $this->dsm_get_user_role(),
			'tab_slug'        => 'custom_css',
			'toggle_slug'     => 'visibility',
			'show_if'         => array(
				'dsm_modules_schedule_visibility'     => 'on',
				'dsm_modules_schedule_user_logged_in' => 'logged-in',
			),
			'return_slugs'    => true,
		);
		$fields['dsm_modules_schedule_devices_disable'] = array(
			'label'           => esc_html__( 'Disable on', 'dsm-supreme-modules-pro-for-divi' ),
			'type'            => 'multiple_checkboxes',
			'options'         => array(
				'phone'   => esc_html__( 'Phone', 'dsm-supreme-modules-pro-for-divi' ),
				'tablet'  => esc_html__( 'Tablet', 'dsm-supreme-modules-pro-for-divi' ),
				'desktop' => esc_html__( 'Desktop', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'option_category' => 'configuration',
			'description'     => esc_html__( 'This will disable the module on selected devices', 'dsm-supreme-modules-pro-for-divi' ),
			'tab_slug'        => 'custom_css',
			'toggle_slug'     => 'visibility',
			'show_if'         => array(
				'dsm_modules_schedule_visibility' => 'on',
			),
		);
		return array_merge( $fields_unprocessed, $fields );
	}
	public function output_modules( $output, $render_slug, $module ) {
		$dsm_divi_modules_all     = $this->dsm_load_divi_with_child_modules();
		$dsm_divi_modules_all     = array_combine( $dsm_divi_modules_all, $dsm_divi_modules_all );
		$dsm_divi_modules_defined = array_search( $render_slug, $dsm_divi_modules_all );

		if ( $dsm_divi_modules_defined === $render_slug ) {
			if ( isset( $module->props['dsm_modules_schedule_visibility'] ) && 'on' === $module->props['dsm_modules_schedule_visibility'] ) {
				if ( is_array( $output ) ) {
					return $output;
				}

				$dsm_modules_schedule_visibility      = $module->props['dsm_modules_schedule_visibility'];
				$dsm_modules_schedule_show_hide       = $module->props['dsm_modules_schedule_show_hide'];
				$dsm_modules_schedule_after_datetime  = $module->props['dsm_modules_schedule_after_datetime'];
				$dsm_modules_schedule_between         = $module->props['dsm_modules_schedule_between'];
				$dsm_modules_schedule_end_datetime    = $module->props['dsm_modules_schedule_end_datetime'];
				$dsm_modules_schedule_user_logged_in  = $module->props['dsm_modules_schedule_user_logged_in'];
				$dsm_modules_schedule_day_week        = explode( '|', $module->props['dsm_modules_schedule_day_week'] );
				$dsm_modules_current_wp_date          = wp_date( 'Y-m-d H:i:s', null );
				$dsm_modules_schedule_user_roles      = explode( '|', $module->props['dsm_modules_schedule_user_roles'] );
				$dsm_modules_schedule_day_week_on_off = $module->props['dsm_modules_schedule_day_week_on_off'];
				$dsm_modules_schedule_opening_time    = $module->props['dsm_modules_schedule_opening_time'];
				$dsm_modules_schedule_closing_time    = $module->props['dsm_modules_schedule_closing_time'];

				if ( isset( $module->props['dsm_modules_schedule_devices_disable'] ) && '' !== $module->props['dsm_modules_schedule_devices_disable'] ) {
					$schedule_devices_array = explode( '|', $module->props['dsm_modules_schedule_devices_disable'] );

					$i                   = 0;
					$current_media_query = 'max_width_767';

					foreach ( $schedule_devices_array as $value ) {
						if ( 'on' === $value ) {
							ET_Builder_Element::set_style(
								$render_slug,
								array(
									'selector'    => '%%order_class%%',
									'declaration' => 'display: none !important;',
									'media_query' => ET_Builder_Element::get_media_query( $current_media_query ),
								)
							);
						}
						$i++;
						$current_media_query = 1 === $i ? '768_980' : 'min_width_981';
					}
				}

				if ( 'logged-in' === $dsm_modules_schedule_user_logged_in ) {
					$dsm_wp_user = wp_get_current_user();
					if ( ! empty( $dsm_modules_schedule_user_roles[0] ) ) {
						$combine = array_combine( array_keys( $this->dsm_get_user_role() ), $dsm_modules_schedule_user_roles );
						foreach ( array_keys( $combine, 'off' ) as $key ) {
							unset( $combine[ $key ] );
						}
						$dsm_allowed_user_roles = array_keys( $combine );
					}
				}

				if ( 'on' === $dsm_modules_schedule_day_week_on_off ) {
					if ( ! empty( $dsm_modules_schedule_day_week ) ) {
						$dsm_days     = array(
							'1' => 'monday',
							'2' => 'tuesday',
							'3' => 'wednesday',
							'4' => 'thursday',
							'5' => 'friday',
							'6' => 'saturday',
							'7' => 'sunday',
						);
						$combine_days = array_combine( array_keys( $dsm_days ), $dsm_modules_schedule_day_week );

						$current_day  = wp_date( 'N', null );
						$current_time = wp_date( 'H:i', null );
						$opening_time = gmdate( 'H:i', strtotime( $dsm_modules_schedule_opening_time ) );
						$closing_time = gmdate( 'H:i', strtotime( $dsm_modules_schedule_closing_time ) );

						foreach ( array_keys( $combine_days, 'off' ) as $key ) {
							unset( $combine_days[ $key ] );
						}
						$dsm_scheduled_days = array_keys( $combine_days );

					}
				}

				if ( 'start' === $dsm_modules_schedule_show_hide ) {
					if ( 'on' === $dsm_modules_schedule_day_week_on_off ) {
						if ( in_array( $current_day, $dsm_scheduled_days ) ) {
							if ( $current_time >= $opening_time && $current_time <= $closing_time ) {
								if ( 'visitors' === $dsm_modules_schedule_user_logged_in ) {
									if ( ! is_user_logged_in() ) {
										$output;
									} else {
										return;
									}
								} elseif ( 'logged-in' === $dsm_modules_schedule_user_logged_in ) {
									if ( ! isset( $dsm_allowed_user_roles ) ) {
										return;
									}
									if ( is_user_logged_in() && array_intersect( $dsm_allowed_user_roles, $dsm_wp_user->roles ) ) {
										$output;
									} else {
										return;
									}
								} else {
									$output;
								}
							} else {
								return;
							}
						} else {
							return;
						}
					} else {
						if ( 'on' === $dsm_modules_schedule_between ) {
							if ( $dsm_modules_current_wp_date >= $dsm_modules_schedule_after_datetime && $dsm_modules_current_wp_date <= $dsm_modules_schedule_end_datetime ) {
								if ( 'visitors' === $dsm_modules_schedule_user_logged_in ) {
									if ( ! is_user_logged_in() ) {
										$output;
									} else {
										return;
									}
								} elseif ( 'logged-in' === $dsm_modules_schedule_user_logged_in ) {
									if ( ! isset( $dsm_allowed_user_roles ) ) {
										return;
									}
									if ( is_user_logged_in() && array_intersect( $dsm_allowed_user_roles, $dsm_wp_user->roles ) ) {
										$output;
									} else {
										return;
									}
								} else {
									$output;
								}
							} else {
								return;
							}
						} else {
							if ( $dsm_modules_schedule_after_datetime >= $dsm_modules_current_wp_date ) {
								return;
							} else {
								if ( 'visitors' === $dsm_modules_schedule_user_logged_in ) {
									if ( ! is_user_logged_in() ) {
										$output;
									} else {
										return;
									}
								} elseif ( 'logged-in' === $dsm_modules_schedule_user_logged_in ) {
									if ( ! isset( $dsm_allowed_user_roles ) ) {
										return;
									}
									if ( is_user_logged_in() && array_intersect( $dsm_allowed_user_roles, $dsm_wp_user->roles ) ) {
										$output;
									} else {
										return;
									}
								} else {
									$output;
								}
							}
						}
					}
				} else {
					if ( 'on' === $dsm_modules_schedule_day_week_on_off ) {
						if ( in_array( $current_day, $dsm_scheduled_days ) ) {
							if ( $current_time >= $opening_time && $current_time <= $closing_time ) {
								return;
							} else {
								if ( 'visitors' === $dsm_modules_schedule_user_logged_in ) {
									if ( ! is_user_logged_in() ) {
										$output;
									} else {
										return;
									}
								} elseif ( 'logged-in' === $dsm_modules_schedule_user_logged_in ) {
									if ( ! isset( $dsm_allowed_user_roles ) ) {
										return;
									}
									if ( is_user_logged_in() && array_intersect( $dsm_allowed_user_roles, $dsm_wp_user->roles ) ) {
										$output;
									} else {
										return;
									}
								} else {
									$output;
								}
							}
						} else {
							return;
						}
					} else {
						if ( 'on' === $dsm_modules_schedule_between ) {
							if ( $dsm_modules_current_wp_date >= $dsm_modules_schedule_after_datetime && $dsm_modules_current_wp_date <= $dsm_modules_schedule_end_datetime ) {
								return;
							} else {
								if ( 'visitors' === $dsm_modules_schedule_user_logged_in ) {
									if ( ! is_user_logged_in() ) {
										$output;
									} else {
										return;
									}
								} elseif ( 'logged-in' === $dsm_modules_schedule_user_logged_in ) {
									if ( ! isset( $dsm_allowed_user_roles ) ) {
										return;
									}
									if ( is_user_logged_in() && array_intersect( $dsm_allowed_user_roles, $dsm_wp_user->roles ) ) {
										$output;
									} else {
										return;
									}
								} else {
									$output;
								}
							}
						} else {
							if ( $dsm_modules_schedule_after_datetime <= $dsm_modules_current_wp_date ) {
								return;
							} else {
								if ( 'visitors' === $dsm_modules_schedule_user_logged_in ) {
									if ( ! is_user_logged_in() ) {
										$output;
									} else {
										return;
									}
								} elseif ( 'logged-in' === $dsm_modules_schedule_user_logged_in ) {
									if ( ! isset( $dsm_allowed_user_roles ) ) {
										return;
									}
									if ( is_user_logged_in() && array_intersect( $dsm_allowed_user_roles, $dsm_wp_user->roles ) ) {
										$output;
									} else {
										return;
									}
								} else {
									$output;
								}
							}
						}
					}
				}
			}
		}

		return $output;
	}

	/**
	 * Creates the Divi Supreme Theme Builder Header.
	 *
	 * @since 2.9.3
	 */

	public function dsm_theme_builder_header_css_classes( $classes ) {
		if ( $this->settings_api->get_option( 'dsm_theme_builder_header_fixed', 'dsm_theme_builder' ) === 'on' ) {
			$classes[] = 'dsm_fixed_header';
		}
		if ( $this->settings_api->get_option( 'dsm_theme_builder_header_auto_calc', 'dsm_theme_builder' ) === 'on' || $this->settings_api->get_option( 'dsm_theme_builder_header_auto_calc', 'dsm_theme_builder' ) === '' ) {
			$classes[] = 'dsm_fixed_header_auto';
		}
		if ( $this->settings_api->get_option( 'dsm_theme_builder_header_shrink', 'dsm_theme_builder' ) === 'on' ) {
			$classes[] = 'dsm_fixed_header_shrink';
		}
		if ( $this->settings_api->get_option( 'dsm_theme_builder_header_shrink_logo', 'dsm_theme_builder' ) !== '' ) {
			$classes[] = 'dsm_fixed_header_shrink_logo';
		}
		if ( $this->settings_api->get_option( 'dsm_theme_builder_header_scroll', 'dsm_theme_builder' ) === 'on' ) {
			$classes[] = 'dsm_fixed_header_scroll';
			if ( $this->settings_api->get_option( 'dsm_theme_builder_header_show_box_shadow_scroll', 'dsm_theme_builder' ) === 'on' ) {
				$classes[] = 'dsm_fixed_header_box_shadow_scroll';
			}
		}
		if ( isset( get_option( 'dsm_theme_builder' )['dsm_theme_builder_header_fixed_devices'] ) && '' !== get_option( 'dsm_theme_builder' )['dsm_theme_builder_header_fixed_devices'] ) {
			$disabled_on_array = get_option( 'dsm_theme_builder' )['dsm_theme_builder_header_fixed_devices'];
			foreach ( $disabled_on_array as $value ) {
				if ( 'phone' === $value ) {
					$classes[] = 'dsm_fixed_header_phone_disable';
				}
				if ( 'tablet' === $value ) {
					$classes[] = 'dsm_fixed_header_tablet_disable';
				}
			}
		}
		if ( function_exists( 'et_core_is_fb_enabled' ) && function_exists( 'et_builder_bfb_enabled' ) ) {
			if ( et_core_is_fb_enabled() || et_builder_bfb_enabled() ) {
				$classes[] = 'dsm_fixed_header_vb';
			}
		}
		/*
		if ( isset( get_option( 'dsm_theme_builder' )['dsm_theme_builder_header_shrink_devices'] ) && '' !== get_option( 'dsm_theme_builder' )['dsm_theme_builder_header_shrink_devices'] ) {
			$disabled_on_array = get_option( 'dsm_theme_builder' )['dsm_theme_builder_header_shrink_devices'];
			foreach ( $disabled_on_array as $value ) {
				if ( 'phone' === $value ) {
					$classes[] = 'dsm_fixed_header_shrink_phone_disable';
				}
				if ( 'tablet' === $value ) {
					$classes[] = 'dsm_fixed_header_shrink_tablet_disable';
				}
			}
		}*/
		return $classes;
	}

	/**
	 * Load Custom CF7
	 *
	 * @since 1.0.0
	 */
	public function dsm_et_builder_load_cf7( $actions ) {
		$actions[] = 'dsm_load_cf7_library';

		return $actions;
	}
	public function dsm_load_cf7_library() {
		if ( isset( $_POST['et_admin_load_nonce'], $_POST['et_admin_load_nonce'], $_POST['cf7_library'] ) && wp_verify_nonce( sanitize_key( $_POST['et_admin_load_nonce'] ), 'et_admin_load_nonce' ) ) {
			echo do_shortcode( '[contact-form-7 id="' . sanitize_text_field( wp_unslash( $_POST['cf7_library'] ) ) . '"]' );
			wp_die();
		} else {
			esc_html_e( 'No Contact Form 7 selected.', 'dsm-supreme-modules-pro-for-divi' );
			wp_die();
		}
	}
	public function dsm_wpcf7_add_form_tag_submit() {
		wpcf7_add_form_tag( 'submit', array( $this, 'dsm_wpcf7_submit_form_tag_handler' ) );
	}
	public function dsm_wpcf7_submit_form_tag_handler( $tag ) {
		$class = wpcf7_form_controls_class( $tag->type . ' et_pb_button' );

		$atts = array();

		$atts['class']    = $tag->get_class_option( $class );
		$atts['id']       = $tag->get_id_option();
		$atts['tabindex'] = $tag->get_option( 'tabindex', 'signed_int', true );

		$value = isset( $tag->values[0] ) ? $tag->values[0] : '';

		if ( empty( $value ) ) {
			$value = __( 'Send', 'contact-form-7' );
		}

		$atts['type']  = 'submit';
		$atts['value'] = $value;

		$atts = wpcf7_format_atts( $atts );

		$html = '<button ' . $atts . '>' . esc_attr( $value ) . '</button>';

		return $html;
	}
	public function dsm_wpcf7_add_form_tag_select() {
		wpcf7_add_form_tag(
			array( 'select', 'select*' ),
			array( $this, 'dsm_wpcf7_select_form_tag_handler' ),
			array(
				'name-attr'         => true,
				'selectable-values' => true,
			)
		);
	}
	public function dsm_wpcf7_select_form_tag_handler( $tag ) {
		if ( empty( $tag->name ) ) {
			return '';
		}

		$validation_error = wpcf7_get_validation_error( $tag->name );

		$class = wpcf7_form_controls_class( $tag->type );

		if ( $validation_error ) {
			$class .= ' wpcf7-not-valid';
		}

		$atts = array();

		$atts['class']    = $tag->get_class_option( $class . ' et_pb_contact_select input' );
		$atts['id']       = $tag->get_id_option();
		$atts['tabindex'] = $tag->get_option( 'tabindex', 'signed_int', true );

		if ( $tag->is_required() ) {
			$atts['aria-required'] = 'true';
		}

		$atts['aria-invalid'] = $validation_error ? 'true' : 'false';

		$multiple       = $tag->has_option( 'multiple' );
		$include_blank  = $tag->has_option( 'include_blank' );
		$first_as_label = $tag->has_option( 'first_as_label' );

		if ( $tag->has_option( 'size' ) ) {
			$size = $tag->get_option( 'size', 'int', true );

			if ( $size ) {
				$atts['size'] = $size;
			} elseif ( $multiple ) {
				$atts['size'] = 4;
			} else {
				$atts['size'] = 1;
			}
		}

		$values = $tag->values;
		$labels = $tag->labels;

		if ( $data = (array) $tag->get_data_option() ) {
			$values = array_merge( $values, array_values( $data ) );
			$labels = array_merge( $labels, array_values( $data ) );
		}

		$default_choice = $tag->get_default_option(
			null,
			array(
				'multiple' => $multiple,
				'shifted'  => $include_blank,
			)
		);

		if ( $include_blank || empty( $values ) ) {
			array_unshift( $labels, '---' );
			array_unshift( $values, '' );
		} elseif ( $first_as_label ) {
			$values[0] = '';
		}

		$html     = '';
		$hangover = wpcf7_get_hangover( $tag->name );

		foreach ( $values as $key => $value ) {
			if ( $hangover ) {
				$selected = in_array( $value, (array) $hangover, true );
			} else {
				$selected = in_array( $value, (array) $default_choice, true );
			}

			$item_atts = array(
				'value'    => $value,
				'selected' => $selected ? 'selected' : '',
			);

			$item_atts = wpcf7_format_atts( $item_atts );

			$label = isset( $labels[ $key ] ) ? $labels[ $key ] : $value;

			$html .= sprintf(
				'<option %1$s>%2$s</option>',
				$item_atts,
				esc_html( $label )
			);
		}

		if ( $multiple ) {
			$atts['multiple'] = 'multiple';
		}

		$atts['name'] = $tag->name . ( $multiple ? '[]' : '' );

		$atts = wpcf7_format_atts( $atts );

		$html = sprintf(
			'<span class="wpcf7-form-control-wrap dsm-contact-form-7-select %1$s"><select %2$s>%3$s</select>%4$s</span>',
			sanitize_html_class( $tag->name ),
			$atts,
			$html,
			$validation_error
		);

		return $html;
	}

	/**
	 * Load Custom CF
	 *
	 * @since 1.0.0
	 */
	public function dsm_et_builder_load_caldera_forms( $actions ) {
		$actions[] = 'dsm_load_caldera_forms';

		return $actions;
	}
	public function dsm_load_caldera_forms() {
		if ( class_exists( 'Caldera_Forms' ) ) {
			add_filter(
				'caldera_forms_render_field_file',
				function( $field_file, $field_type ) {
					if ( 'dropdown' === $field_type ) {
						return dirname( __FILE__ ) . '/modules/CalderaForms/includes/dropdown/field.php';
					}
					if ( 'button' === $field_type ) {
						return dirname( __FILE__ ) . '/modules/CalderaForms/includes/button/field.php';
					}
					if ( 'radio' === $field_type ) {
						return dirname( __FILE__ ) . '/modules/CalderaForms/includes/radio/field.php';
					}
					if ( 'checkbox' === $field_type ) {
						return dirname( __FILE__ ) . '/modules/CalderaForms/includes/checkbox/field.php';
					}
					if ( 'html' === $field_type ) {
						return dirname( __FILE__ ) . '/modules/CalderaForms/includes/html/field.php';
					}
					if ( 'advanced_file' === $field_type ) {
						return dirname( __FILE__ ) . '/modules/CalderaForms/includes/advanced_file/field.php';
					}
					return $field_file;
				},
				10,
				2
			);
			// disable CF styles

			add_filter( 'caldera_forms_get_style_includes', 'dsm_filter_caldera_forms_get_style_includes', 10, 1 );

			if (
				isset( $_POST['et_admin_load_nonce'], $_POST['et_admin_load_nonce'], $_POST['cf_library'] )
				&& wp_verify_nonce( sanitize_key( $_POST['et_admin_load_nonce'] ), 'et_admin_load_nonce' )
			) {
				echo do_shortcode( '[caldera_form id="' . sanitize_text_field( wp_unslash( $_POST['cf_library'] ) ) . '"]' );
				wp_die();
			} else {
				esc_html_e( 'No Caldera forms selected.', 'dsm-supreme-modules-pro-for-divi' );
				wp_die();
			}
		}
	}
	/**
	 * Load Divi Library
	 *
	 * @since 1.0.0
	 */
	public function dsm_load_library() {
		$args = array(
			'post_type'      => 'et_pb_layout',
			'posts_per_page' => -1,
		);

		$dsm_library_list = array( 'none' => '-- Select Library --' );

		if ( $categories = get_posts( $args ) ) {
			foreach ( $categories as $category ) {
				$dsm_library_list[ $category->ID ] = $category->post_title;
			}
		}

		return $dsm_library_list;
	}
	/**
	 * Load WordPress Role Names
	 *
	 * @since 1.0.0
	 */
	public function dsm_get_user_role() {
		global $wp_roles;
		if ( ! isset( $wp_roles ) ) {
			$roles_obj = new WP_Roles();
		}
		$editable_roles = $wp_roles->roles;
		$dsm_user_role_list = array();

		foreach ( $editable_roles as $role_name => $details ) {
			$dsm_user_role_list[ $role_name ] = translate_user_role( $details['name'] );
		}

		return $dsm_user_role_list;
	}

	/**
	 * For Divi Upload Gallery Fields To Edit
	 *
	 * @since 1.0.0
	 */
	public function dsm_attachment_fields_to_edit( $fields, $post ) {
		$fields['dsm_gallery_fields_title'] = array(
			'label' => __( 'For Divi Supreme Modules only', 'dsm-supreme-modules-pro-for-divi' ),
			'input' => 'html',
			'html'  => __( ' ', 'dsm-supreme-modules-pro-for-divi' ),
		);

		$custom_link_url_value                        = get_post_meta( $post->ID, 'dsm_upload_gallery_custom_link_url', true );
		$fields['dsm_upload_gallery_custom_link_url'] = array(
			'label' => __( 'Link URL', 'dsm-supreme-modules-pro-for-divi' ),
			'input' => 'text',
			'value' => $custom_link_url_value ? $custom_link_url_value : '',
		);
		$target_value                                 = get_post_meta( $post->ID, 'dsm_upload_gallery_link_url_target', true );
		$fields['dsm_upload_gallery_link_url_target'] = array(
			'label' => __( 'Link Target', 'dsm-supreme-modules-pro-for-divi' ),
			'input' => 'html',
			'html'  => '
				<select class="widefat" name="attachments[' . $post->ID . '][dsm_upload_gallery_link_url_target]" id="attachments[' . $post->ID . '][dsm_upload_gallery_link_url_target]">
					<option value="_self"' . ( '_self' === $target_value ? ' selected="selected"' : '' ) . '>' .
						__( 'In The Same Window', 'dsm-supreme-modules-pro-for-divi' ) .
					'</option>
					<option value="_blank"' . ( '_blank' === $target_value ? ' selected="selected"' : '' ) . '>' .
						__( 'In The New Tab', 'dsm-supreme-modules-pro-for-divi' ) .
					'</option>
				</select>',
		);

		$download_as_file                                   = get_post_meta( $post->ID, 'dsm_upload_gallery_link_as_download_file', true );
		$fields['dsm_upload_gallery_link_as_download_file'] = array(
			'label' => __( ' ', 'dsm-supreme-modules-pro-for-divi' ),
			'input' => 'html',
			'html'  => '<input type="checkbox" value="1" name="attachments[' . $post->ID . '][dsm_upload_gallery_link_as_download_file]" id="attachments[' . $post->ID . '][dsm_upload_gallery_link_as_download_file]" ' . checked( 1, get_post_meta( $post->ID, 'dsm_upload_gallery_link_as_download_file', true ), false ) . '/> Download as file',
		);
		return $fields;
	}
	/**
	 * For Divi Upload Gallery Fields To Save
	 *
	 * @since 1.0.0
	 */
	public function dsm_attachment_fields_to_save( $post, $attachment ) {
		if ( isset( $attachment['dsm_upload_gallery_custom_link_url'] ) ) {
			update_post_meta( $post['ID'], 'dsm_upload_gallery_custom_link_url', $attachment['dsm_upload_gallery_custom_link_url'] );
		}
		if ( isset( $attachment['dsm_upload_gallery_link_url_target'] ) ) {
			update_post_meta( $post['ID'], 'dsm_upload_gallery_link_url_target', $attachment['dsm_upload_gallery_link_url_target'] );
		}
		if ( isset( $attachment['dsm_upload_gallery_link_as_download_file'] ) ) {
			update_post_meta( $post['ID'], 'dsm_upload_gallery_link_as_download_file', $attachment['dsm_upload_gallery_link_as_download_file'] );
		}
		return $post;
	}

	/**
	 * For Loading Modules
	 *
	 * @since 3.2
	 */
	public function dsm_load_divi_modules() {
		$dsm_load_divi_modules = array(
			'et_pb_accordion',
			'et_pb_audio',
			'et_pb_counters',
			'et_pb_blog',
			'et_pb_blurb',
			'et_pb_circle_counter',
			'et_pb_code',
			'et_pb_button',
			'et_pb_comments',
			'et_pb_contact_form',
			'et_pb_countdown_timer',
			'et_pb_cta',
			'et_pb_divider',
			'et_pb_filterable_portfolio',
			'et_pb_fullwidth_code',
			'et_pb_fullwidth_header',
			'et_pb_fullwidth_image',
			'et_pb_fullwidth_map',
			'et_pb_fullwidth_menu',
			'et_pb_fullwidth_portfolio',
			'et_pb_fullwidth_post_slider',
			'et_pb_fullwidth_post_title',
			'et_pb_fullwidth_slider',
			'et_pb_gallery',
			'et_pb_image',
			'et_pb_login',
			'et_pb_map',
			'et_pb_number_counter',
			'et_pb_portfolio',
			'et_pb_post_slider',
			'et_pb_post_title',
			'et_pb_post_nav',
			'et_pb_pricing_tables',
			'et_pb_search',
			'et_pb_shop',
			'et_pb_sidebar',
			'et_pb_signup',
			'et_pb_slider',
			'et_pb_social_media_follow',
			'et_pb_tabs',
			'et_pb_team_member',
			'et_pb_testimonial',
			'et_pb_text',
			'et_pb_toggle',
			'et_pb_video',
			'et_pb_video_slider',
			'dsm_text_badges',
			'dsm_button',
			'dsm_contact_form_7',
			'dsm_embed_google_map',
			'dsm_embed_twitter_timeline',
			'dsm_facebook_comments',
			'dsm_facebook_feed',
			'dsm_flipbox',
			'dsm_floating_multi_images',
			'dsm_gradient_text',
			'dsm_icon_divider',
			'dsm_menu',
			'dsm_perspective_image',
			'dsm_text_divider',
			'dsm_typing_effect',
			'dsm_image_hover_reveal',
			'dsm_image_reveal',
			'dsm_glitch_text',
			'dsm_star_rating',
			'dsm_tilt_image',
			'dsm_pricelist',
			'dsm_shuffle_letters',
			'dsm_image_carousel',
			'dsm_caldera_forms',
			'dsm_business_hours',
			'dsm_icon_list',
			'dsm_dual_heading',
			'dsm_image_hotspots',
			'dsm_animated_gradient_text',
			'dsm_mask_text',
			'dsm_scroll_image',
			'dsm_card',
			'dsm_card_carousel',
			'dsm_shapes',
			'dsm_facebook_like_button',
			'dsm_facebook_embed',
			'dsm_text_rotator',
			'dsm_block_reveal_image',
			'dsm_block_reveal_text',
			'dsm_before_after_image',
			'dsm_lottie',
			'dsm_text_notation',
			'dsm_masonry_gallery',
			'dsm_breadcrumbs',
			'dsm_content_toggle',
			'dsm_blog_carousel',
			'dsm_image_accordion',
			'dsm_post_carousel',
		);
		return $dsm_load_divi_modules;
	}
	public function dsm_load_divi_child_modules() {
		$dsm_load_divi_child_modules = array(
			'dsm_floating_multi_images_child',
			'dsm_card_carousel_child',
			'dsm_icon_list_child',
		);
		return $dsm_load_divi_child_modules;
	}
	public function dsm_merge_child_modules() {
		$dsm_popup_divi_modules      = $this->dsm_load_divi_modules();
		$dsm_load_divi_child_modules = $this->dsm_load_divi_child_modules();

		$dsm_merge_child_modules = array_merge( $dsm_popup_divi_modules, $dsm_load_divi_child_modules );

		return $dsm_merge_child_modules;
	}
	public function dsm_load_default_child_modules() {
		$dsm_load_default_child_modules = array(
			'et_pb_video_slider_item',
			'et_pb_accordion_item',
			'et_pb_pricing_table',
			'et_pb_slide',
			'et_pb_counter',
			// Divi Supreme Child Modules.
			'dsm_floating_multi_images_child',
			'dsm_card_carousel_child',
			'dsm_icon_list_child',
			'dsm_image_hotspots_child',
			'dsm_business_hours_child',
			'dsm_image_accordion_child',
		);
		return $dsm_load_default_child_modules;

	}
	public function dsm_load_divi_with_child_modules() {
		$dsm_divi_child_modules         = $this->dsm_load_divi_modules();
		$dsm_load_default_child_modules = $this->dsm_load_default_child_modules();

		$dsm_load_divi_with_child_modules = array_merge( $dsm_divi_child_modules, $dsm_load_default_child_modules );
		return $dsm_load_divi_with_child_modules;
	}

}
