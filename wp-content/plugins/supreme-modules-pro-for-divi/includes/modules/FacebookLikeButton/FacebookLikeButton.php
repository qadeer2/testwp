<?php

class DSM_FacebookLikeButton extends ET_Builder_Module {
	public $slug       = 'dsm_facebook_like_button';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name      = esc_html__( 'Supreme Facebook Like Button', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path = plugin_dir_path( __FILE__ ) . 'icon.svg';

		$this->main_css_element = '%%order_class%%.dsm_facebook_like_button';
		// Toggle settings.
		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Facebook Like Button Settings', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
			'advanced' => array(
				'toggles' => array(),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'text'       => false,
			'fonts'      => false,
			'background' => array(
				'css'     => array(
					'main' => "{$this->main_css_element}",
				),
				'options' => array(
					'parallax_method' => array(
						'default' => 'off',
					),
				),
			),
			'max_width'  => array(
				'css' => array(
					'main' => '%%order_class%%',
				),
			),
			'borders'    => array(
				'default' => array(
					'css' => array(
						'main' => array(
							'border_radii'  => "{$this->main_css_element}",
							'border_styles' => "{$this->main_css_element}",
						),
					),
				),
			),
			'box_shadow' => array(
				'default' => array(
					'css' => array(
						'main' => "{$this->main_css_element}",
					),
				),
			),
			'filters'    => false,
		);
	}

	public function get_fields() {
		return array(
			'fb_app_id_notice' => array(
				'type'        => 'warning',
				'value'       => isset( get_option( 'dsm_settings_social_media' )['dsm_facebook_app_id'] ) && '' !== get_option( 'dsm_settings_social_media' )['dsm_facebook_app_id'] ? true : false,
				'display_if'  => false,
				'message'     => esc_html__(
					sprintf(
						'The Facebook APP ID is currently empty in the <a href="%s" target="_blank">Divi Supreme Plugin Page</a>. This module might not function properly without the Facebook APP ID.',
						admin_url( 'admin.php?page=divi_supreme_settings#dsm_settings_social_media' )
					),
					'dsm-supreme-modules-pro-for-divi'
				),
				'toggle_slug' => 'main_content',
			),
			'fb_app_id'        => array(
				'label'            => esc_html__( 'Facebook APP ID', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'option_category'  => 'basic_option',
				'attributes'       => 'readonly',
				'default_on_front' => isset( get_option( 'dsm_settings_social_media' )['dsm_facebook_app_id'] ) && '' !== get_option( 'dsm_settings_social_media' )['dsm_facebook_app_id'] ? get_option( 'dsm_settings_social_media' )['dsm_facebook_app_id'] : '',
				'description'      => et_get_safe_localization( sprintf( __( 'The Facebook module uses the Facebook APP ID and requires a Facebook APP ID to function. Before using all Facebook module, please make sure you have added your Facebook APP ID inside the Divi Supreme Plugin Page. You can go to <a href="%1$s">Facebook Developer</a> and click on Create New App to get one.', 'dsm-supreme-modules-pro-for-divi' ), esc_url( 'https://developers.facebook.com/apps/' ) ) ),
				'toggle_slug'      => 'main_content',
			),
			'fb_url'           => array(
				'label'            => esc_html__( 'URL', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'option_category'  => 'basic_option',
				'description'      => esc_html__( 'Enter the URL.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'      => 'main_content',
				'default_on_front' => 'https://www.facebook.com/divisupreme/',
				'dynamic_content'  => 'url',
			),
			'fb_layout'        => array(
				'label'            => esc_html__( 'Layout', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'layout',
				'options'          => array(
					'standard'     => esc_html__( 'Standard', 'dsm-supreme-modules-pro-for-divi' ),
					'button_count' => esc_html__( 'Button Count', 'dsm-supreme-modules-pro-for-divi' ),
					'button'       => esc_html__( 'Button', 'dsm-supreme-modules-pro-for-divi' ),
					'box_count'    => esc_html__( 'Box Count', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Selects one of the different layouts that are available for the plugin.', 'dsm-supreme-modules-pro-for-divi' ),
				'default_on_front' => 'standard',
			),
			'fb_color_scheme'  => array(
				'label'            => esc_html__( 'Color Scheme', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'layout',
				'options'          => array(
					'light' => esc_html__( 'Light', 'dsm-supreme-modules-pro-for-divi' ),
					'dark'  => esc_html__( 'Dark', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Use the small header instead.', 'dsm-supreme-modules-pro-for-divi' ),
				'default_on_front' => 'light',
			),
			'fb_action'        => array(
				'label'            => esc_html__( 'Action', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'layout',
				'options'          => array(
					'like'      => esc_html__( 'Like', 'dsm-supreme-modules-pro-for-divi' ),
					'recommend' => esc_html__( 'Recommend', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'The verb to display on the button. Can be either like or recommend.', 'dsm-supreme-modules-pro-for-divi' ),
				'default_on_front' => 'like',
			),
			'fb_share'         => array(
				'label'            => esc_html__( 'Show Share Button', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
					'false' => esc_html__( 'Hide', 'dsm-supreme-modules-pro-for-divi' ),
					'true'  => esc_html__( 'Show', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Specifies whether to include a share button beside the Like button.', 'dsm-supreme-modules-pro-for-divi' ),
				'default_on_front' => 'false',
			),
			'fb_size'          => array(
				'label'            => esc_html__( 'Size', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'layout',
				'options'          => array(
					'small' => esc_html__( 'Small', 'dsm-supreme-modules-pro-for-divi' ),
					'large' => esc_html__( 'Large', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'The button is offered in large and small sizes.', 'dsm-supreme-modules-pro-for-divi' ),
				'default_on_front' => 'small',
			),
			/*
			'fb_width'         => array(
				'label'            => esc_html__( 'Width', 'et_builder' ),
				'type'             => 'range',
				'option_category'  => 'layout',
				'toggle_slug'      => 'main_content',
				'validate_unit'    => true,
				'default'          => '340px',
				'default_unit'     => 'px',
				'default_on_front' => '340px',
				'allow_empty'      => true,
				'range_settings'   => array(
					'min'  => '180',
					'max'  => '500',
					'step' => '1',
				),
				'description'      => esc_html__( 'The pixel width of the Facebook Feed. Min. is 180 & Max. is 500.', 'dsm-supreme-modules-pro-for-divi' ),
			),*/
			'fb_alignment'     => array(
				'label'           => esc_html__( 'Alignment', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text_align',
				'option_category' => 'configuration',
				'options'         => et_builder_get_text_orientation_options( array( 'justified' ) ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'alignment',
				'description'     => esc_html__( 'Here you can define the alignment of Facebook Like Button', 'dsm-supreme-modules-pro-for-divi' ),
				'default'         => 'left',
			),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		$fb_app_id       = $this->props['fb_app_id'];
		$fb_url          = $this->props['fb_url'];
		$fb_layout       = $this->props['fb_layout'];
		$fb_color_scheme = $this->props['fb_color_scheme'];
		$fb_action       = $this->props['fb_action'];
		$fb_size         = $this->props['fb_size'];
		$fb_share        = $this->props['fb_share'];
		//$fb_width         = floatval( $this->props['fb_width'] );
		$fb_alignment = $this->props['fb_alignment'];

		if ( 'left' !== $fb_alignment ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%.dsm_facebook_like_button .dsm-facebook-like>span',
					'declaration' => sprintf(
						'text-align: %1$s;',
						esc_html( $fb_alignment )
					),
				)
			);
		}

		$this->add_classname(
			array(
				"et_pb_text_align_{$fb_alignment}",
			)
		);

		wp_enqueue_script( 'dsm-facebook' );

		// Render module content
		$output = sprintf(
			'<div class="fb-like dsm-facebook-like" data-href="%1$s" data-layout="%2$s" data-colorscheme="%3$s" data-action="%4$s" data-size="%5$s" data-share="%6$s" data-width="280px" data-lazy="true"></div>
			',
			esc_url( $fb_url ),
			esc_attr( $fb_layout ),
			esc_attr( $fb_color_scheme ),
			esc_attr( $fb_action ),
			esc_attr( $fb_size ),
			esc_attr( $fb_share )
		);

		return $output;
	}
}

new DSM_FacebookLikeButton();
