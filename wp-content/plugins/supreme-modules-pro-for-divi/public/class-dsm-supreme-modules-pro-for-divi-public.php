<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://divisupreme.com
 * @since      1.0.0
 *
 * @package    Dsm_Supreme_Modules_Pro_For_Divi
 * @subpackage Dsm_Supreme_Modules_Pro_For_Divi/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Dsm_Supreme_Modules_Pro_For_Divi
 * @subpackage Dsm_Supreme_Modules_Pro_For_Divi/public
 * @author     Divi Supreme <hello@divisupreme.com>
 */
class Dsm_Supreme_Modules_Pro_For_Divi_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name       The name of the plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Dsm_Supreme_Modules_Pro_For_Divi_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Dsm_Supreme_Modules_Pro_For_Divi_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		if ( function_exists( 'et_core_is_fb_enabled' ) ) {
			if ( et_core_is_fb_enabled() ) {
				wp_enqueue_style( 'dsm-et-admin', plugin_dir_url( __FILE__ ) . 'css/dsm-et-admin.css', array(), DSM_PRO_VERSION, 'all' );
			}
		}
		$easy_theme_builder = isset( get_option( 'dsm_theme_builder' )['dsm_theme_builder_header_fixed'] ) && 'off' !== get_option( 'dsm_theme_builder' )['dsm_theme_builder_header_fixed'] ? true : false;
		if ( true === $easy_theme_builder ) {
			wp_enqueue_style( 'dsm-easy-theme-builder-style', plugin_dir_url( __FILE__ ) . 'css/dsm-easy-tb.css', array(), DSM_PRO_VERSION, 'all' );
			$easy_theme_builder_image   = isset( get_option( 'dsm_theme_builder' )['dsm_theme_builder_header_shrink_image'] ) && '' !== get_option( 'dsm_theme_builder' )['dsm_theme_builder_header_shrink_image'] ? esc_attr( get_option( 'dsm_theme_builder' )['dsm_theme_builder_header_shrink_image'] ) : '';
			$easy_theme_builder_section = isset( get_option( 'dsm_theme_builder' )['dsm_theme_builder_header_section_padding'] ) && '' !== get_option( 'dsm_theme_builder' )['dsm_theme_builder_header_section_padding'] ? esc_attr( get_option( 'dsm_theme_builder' )['dsm_theme_builder_header_section_padding'] ) : '';
			$easy_theme_builder_row     = isset( get_option( 'dsm_theme_builder' )['dsm_theme_builder_header_row_padding'] ) && '' !== get_option( 'dsm_theme_builder' )['dsm_theme_builder_header_row_padding'] ? esc_attr( get_option( 'dsm_theme_builder' )['dsm_theme_builder_header_row_padding'] ) : '';
			$easy_theme_builder_menu    = isset( get_option( 'dsm_theme_builder' )['dsm_theme_builder_header_menu_padding'] ) && '' !== get_option( 'dsm_theme_builder' )['dsm_theme_builder_header_menu_padding'] ? esc_attr( get_option( 'dsm_theme_builder' )['dsm_theme_builder_header_menu_padding'] ) : '';
			$dsm_tb_header_css          = '';

			if ( '' !== $easy_theme_builder_image ) {
				$dsm_tb_header_css = '.et-db.dsm_fixed_header_shrink.dsm_fixed_header_shrink_active #et-boc header.et-l--header.et-l img { max-width: ' . floatval( $easy_theme_builder_image ) . '%; }';
			}
			if ( '' !== $easy_theme_builder_section ) {
				$dsm_tb_header_css .= '.et-db.dsm_fixed_header_shrink.dsm_fixed_header_shrink_active #et-boc header.et-l--header.et-l .et_pb_section { padding-top: ' . floatval( $easy_theme_builder_section ) . 'px; padding-bottom: ' . floatval( $easy_theme_builder_section ) . 'px; } ';
			}
			if ( '' !== $easy_theme_builder_row ) {
				$dsm_tb_header_css .= '.et-db.dsm_fixed_header_shrink.dsm_fixed_header_shrink_active #et-boc header.et-l--header.et-l .et_pb_section .et_pb_row { padding-top: ' . floatval( $easy_theme_builder_row ) . 'px !important; padding-bottom: ' . floatval( $easy_theme_builder_row ) . 'px !important; } ';
			}
			if ( '' !== $easy_theme_builder_menu ) {
				$dsm_tb_header_css .= '.et-db.dsm_fixed_header_shrink.dsm_fixed_header_shrink_active #et-boc header.et-l--header.et-l .et_pb_module.et_pb_menu { padding-top: ' . floatval( $easy_theme_builder_section ) . 'px; padding-bottom: ' . floatval( $easy_theme_builder_section ) . 'px; } ';
			}

			wp_add_inline_style( 'dsm-easy-theme-builder-style', $dsm_tb_header_css );
		}
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		// Visual Builder Enqueue.
		if ( function_exists( 'et_fb_is_enabled' ) && et_fb_is_enabled() || function_exists( 'et_builder_tb_enabled' ) && et_builder_tb_enabled() ) {
			wp_enqueue_script( 'dsm-modules-vb', plugin_dir_url( __FILE__ ) . 'js/dsm-modules-vb.js', array( 'jquery' ), DSM_PRO_VERSION, true );
		}

		$facebook_app_id = isset( get_option( 'dsm_settings_social_media' )['dsm_facebook_app_id'] ) && '' !== get_option( 'dsm_settings_social_media' )['dsm_facebook_app_id'] ? '&appId=' . esc_attr( get_option( 'dsm_settings_social_media' )['dsm_facebook_app_id'] ) : '';
		if ( isset( get_option( 'dsm_settings_social_media' )['dsm_facebook_site_lang'] ) && 'off' !== get_option( 'dsm_settings_social_media' )['dsm_facebook_site_lang'] ) {
			$facebook_lang = get_locale();
		} elseif ( isset( get_option( 'dsm_settings_social_media' )['dsm_facebook_site_lang'] ) && null === get_option( 'dsm_settings_social_media' )['dsm_facebook_site_lang'] ) {
			$facebook_lang = 'en_US';
		} else {
			$facebook_lang = 'en_US';
		}
		if ( isset( get_option( 'dsm_general' )['dsm_use_builder_responsive_viewer'] ) && 'off' !== get_option( 'dsm_general' )['dsm_use_builder_responsive_viewer'] ) {
			if ( function_exists( 'et_core_is_fb_enabled' ) && function_exists( 'et_builder_bfb_enabled' ) ) {
				if ( et_core_is_fb_enabled() || et_builder_bfb_enabled() ) {
					wp_enqueue_script( 'divi-responsive-viewer-fb', plugin_dir_url( __DIR__ ) . 'admin/js/dsm-responsive-builder.js', array( 'jquery' ), DSM_PRO_VERSION, true );
				}
			}
			if ( function_exists( 'et_builder_tb_enabled' ) ) {
				if ( et_builder_tb_enabled() ) {
					wp_dequeue_script( 'divi-responsive-viewer-fb' );
					wp_enqueue_script( 'divi-responsive-viewer-tb', plugin_dir_url( __DIR__ ) . 'admin/js/dsm-responsive-builder-tb.js', array( 'jquery' ), DSM_PRO_VERSION, true );
				}
			}
		}

		$easy_theme_builder = isset( get_option( 'dsm_theme_builder' )['dsm_theme_builder_header_fixed'] ) && 'off' !== get_option( 'dsm_theme_builder' )['dsm_theme_builder_header_fixed'] ? true : false;
		if ( true === $easy_theme_builder ) {
			$dsm_tb_header_start_threshold = isset( get_option( 'dsm_theme_builder' )['dsm_theme_builder_header_start_threshold'] ) && '' !== get_option( 'dsm_theme_builder' )['dsm_theme_builder_header_start_threshold'] ? get_option( 'dsm_theme_builder' )['dsm_theme_builder_header_start_threshold'] : '200';
			$dsm_tb_header_first_section   = isset( get_option( 'dsm_theme_builder' )['dsm_theme_builder_header_first_section_background_color'] ) && '' !== get_option( 'dsm_theme_builder' )['dsm_theme_builder_header_first_section_background_color'] ? esc_url( get_option( 'dsm_theme_builder' )['dsm_theme_builder_header_first_section_background_color'] ) : '';
			$dsm_tb_header_second_section  = isset( get_option( 'dsm_theme_builder' )['dsm_theme_builder_header_second_section_background_color'] ) && '' !== get_option( 'dsm_theme_builder' )['dsm_theme_builder_header_second_section_background_color'] ? esc_url( get_option( 'dsm_theme_builder' )['dsm_theme_builder_header_second_section_background_color'] ) : '';
			$dsm_tb_header_logo            = isset( get_option( 'dsm_theme_builder' )['dsm_theme_builder_header_shrink_logo'] ) && '' !== get_option( 'dsm_theme_builder' )['dsm_theme_builder_header_shrink_logo'] ? esc_url( get_option( 'dsm_theme_builder' )['dsm_theme_builder_header_shrink_logo'] ) : '';

			$dsm_tb_header = array(
				'threshold'               => $dsm_tb_header_start_threshold,
				'first_background_color'  => $dsm_tb_header_first_section,
				'second_background_color' => $dsm_tb_header_second_section,
				'shrink_logo'             => $dsm_tb_header_logo,
			);

			if ( function_exists( 'et_core_is_fb_enabled' ) && function_exists( 'et_builder_bfb_enabled' ) ) {
				if ( et_core_is_fb_enabled() && ! et_builder_bfb_enabled() ) {
					wp_enqueue_script( 'dsm-easy-theme-builder-vb', plugin_dir_url( __FILE__ ) . 'js/dsm-easy-tb-vb.js', array( 'jquery' ), DSM_PRO_VERSION, true );
					wp_localize_script( 'dsm-easy-theme-builder-vb', 'dsm_easy_tb_js', $dsm_tb_header );
				}
				if ( ! et_core_is_fb_enabled() && ! et_builder_bfb_enabled() ) {
					wp_enqueue_script( 'dsm-easy-theme-builder', plugin_dir_url( __FILE__ ) . 'js/dsm-easy-tb.js', array( 'jquery' ), DSM_PRO_VERSION, true );
					wp_localize_script( 'dsm-easy-theme-builder', 'dsm_easy_tb_js', $dsm_tb_header );
				}
			}
		}
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Dsm_Supreme_Modules_Pro_For_Divi_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Dsm_Supreme_Modules_Pro_For_Divi_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_register_script( 'dsm-typed', plugin_dir_url( __FILE__ ) . 'js/typed.min.js', array(), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-twitter-embed', 'https://platform.twitter.com/widgets.js', array(), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-splitting', plugin_dir_url( __FILE__ ) . 'js/splitting.js', array(), DSM_PRO_VERSION, false );
		wp_register_script( 'dsm-gsap', plugin_dir_url( __FILE__ ) . 'js/gsap.min.js', array(), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-tilt', plugin_dir_url( __FILE__ ) . 'js/vanilla-tilt.min.js', array(), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-baffle', plugin_dir_url( __FILE__ ) . 'js/baffle.min.js', array(), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-swiper', plugin_dir_url( __FILE__ ) . 'js/swiper-bundle.min.js', array(), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-js-cookie', plugin_dir_url( __FILE__ ) . 'js/js.cookie.js', array(), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-glio', plugin_dir_url( __FILE__ ) . 'js/glio.min.js', array(), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-readmore', plugin_dir_url( __FILE__ ) . 'js/readmore.js', array(), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-popper', plugin_dir_url( __FILE__ ) . 'js/popper.min.js', array(), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-tippy', plugin_dir_url( __FILE__ ) . 'js/tippy-bundle.iife.min.js', array( 'dsm-popper' ), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-replace-me', plugin_dir_url( __FILE__ ) . 'js/replaceme.min.js', array(), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-revealFx', plugin_dir_url( __FILE__ ) . 'js/revealFX.js', array( 'dsm-gsap' ), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-twentytwenty', plugin_dir_url( __FILE__ ) . 'js/dsm-before-after-image-slider.js', array( 'jquery' ), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-lottie', plugin_dir_url( __FILE__ ) . 'js/lottie.min.js', array(), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-notation', plugin_dir_url( __FILE__ ) . 'js/rough-notation.iife.js', array(), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-facebook', 'https://connect.facebook.net/' . $facebook_lang . '/sdk.js#xfbml=1&version=v8.0' . $facebook_app_id, array(), null, true );
		wp_register_script( 'dsm-magnific-popup-image', plugin_dir_url( __FILE__ ) . 'js/dsm-magnific-popup-image.js', array(), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-magnific-popup-video', plugin_dir_url( __FILE__ ) . 'js/dsm-magnific-popup-video.js', array(), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-imagesloaded', plugin_dir_url( __FILE__ ) . 'js/imagesloaded.pkgd.min.js', array( 'jquery' ), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-masonry', plugin_dir_url( __FILE__ ) . 'js/masonry.pkgd.min.js', array( 'dsm-imagesloaded' ), DSM_PRO_VERSION, true );
		// Modules.
		wp_register_script( 'dsm-image-hotspots', plugin_dir_url( __DIR__ ) . 'includes/modules/ImageHotSpots/frontend.min.js', array( 'dsm-tippy' ), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-icon-list', plugin_dir_url( __DIR__ ) . 'includes/modules/IconListChild/frontend.min.js', array( 'dsm-tippy' ), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-typing-effect', plugin_dir_url( __DIR__ ) . 'includes/modules/TypingEffect/frontend.min.js', array( 'dsm-typed' ), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-text-rotator', plugin_dir_url( __DIR__ ) . 'includes/modules/TextRotator/frontend.min.js', array( 'dsm-replace-me' ), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-shuffle-letters', plugin_dir_url( __DIR__ ) . 'includes/modules/ShuffleLetters/frontend.min.js', array( 'dsm-baffle' ), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-before-after-image', plugin_dir_url( __DIR__ ) . 'includes/modules/BeforeAfterImage/frontend.min.js', array( 'dsm-twentytwenty' ), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-lottie-module', plugin_dir_url( __DIR__ ) . 'includes/modules/Lottie/frontend.min.js', array( 'dsm-lottie' ), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-block-reveal-text', plugin_dir_url( __DIR__ ) . 'includes/modules/BlockRevealText/frontend.min.js', array( 'dsm-revealFx' ), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-block-reveal-image', plugin_dir_url( __DIR__ ) . 'includes/modules/BlockRevealImage/frontend.min.js', array( 'dsm-revealFx' ), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-card-carousel', plugin_dir_url( __DIR__ ) . 'includes/modules/CardCarousel/frontend.min.js', array( 'dsm-swiper' ), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-image-carousel', plugin_dir_url( __DIR__ ) . 'includes/modules/ImageCarousel/frontend.min.js', array( 'dsm-swiper' ), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-tilt-image', plugin_dir_url( __DIR__ ) . 'includes/modules/TiltImage/frontend.min.js', array( 'dsm-tilt' ), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-image-text-reveal', plugin_dir_url( __DIR__ ) . 'includes/modules/ImageReveal/frontend.min.js', array( 'dsm-splitting' ), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-image-hover-reveal', plugin_dir_url( __DIR__ ) . 'includes/modules/ImageHoverReveal/frontend.min.js', array( 'dsm-splitting' ), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-contact-form-7', plugin_dir_url( __DIR__ ) . 'includes/modules/ContactForm7/frontend.min.js', array(), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-caldera-forms', plugin_dir_url( __DIR__ ) . 'includes/modules/CalderaForms/frontend.min.js', array(), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-text-notation', plugin_dir_url( __DIR__ ) . 'includes/modules/TextNotation/frontend.min.js', array( 'dsm-notation' ), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-flipbox-click', plugin_dir_url( __DIR__ ) . 'includes/modules/FlipBoxPerk/frontend.min.js', array(), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-masonry-gallery', plugin_dir_url( __DIR__ ) . 'includes/modules/MasonryGallery/frontend.min.js', array( 'dsm-masonry' ), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-content-toggle', plugin_dir_url( __DIR__ ) . 'includes/modules/ContentToggle/frontend.min.js', array( 'jquery' ), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-blog-carousel', plugin_dir_url( __DIR__ ) . 'includes/modules/BlogCarousel/frontend.min.js', array( 'dsm-swiper' ), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-image-accordion', plugin_dir_url( __DIR__ ) . 'includes/modules/ImageAccordion/frontend.min.js', array( 'jquery' ), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-post-carousel', plugin_dir_url( __DIR__ ) . 'includes/modules/PostCarousel/frontend.min.js', array( 'dsm-swiper' ), DSM_PRO_VERSION, true );
		// Extensions.
		wp_register_script( 'dsm-readme', plugin_dir_url( __DIR__ ) . 'includes/extensions/ReadMore/frontend.min.js', array( 'dsm-readmore' ), DSM_PRO_VERSION, true );
		wp_register_script( 'dsm-popup', plugin_dir_url( __DIR__ ) . 'includes/extensions/Popup/frontend.min.js', array( 'jquery' ), DSM_PRO_VERSION, true );
		// Load in Visual Builder.
		if ( function_exists( 'et_core_is_fb_enabled' ) ) {
			if ( et_core_is_fb_enabled() ) {
				wp_enqueue_script( 'dsm-masonry' );
			}
		}
	}

}
