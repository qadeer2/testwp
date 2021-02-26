<?php

class DSM_AnimatedGradientText extends ET_Builder_Module {

	public $slug       = 'dsm_animated_gradient_text';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name             = esc_html__( 'Supreme Animated Gradient Text', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path        = plugin_dir_path( __FILE__ ) . 'icon.svg';
		$this->main_css_element = '%%order_class%% .dsm-animated-gradient-text';
		// Toggle settings
		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Content', 'dsm-supreme-modules-pro-for-divi' ),
					'settings'     => esc_html__( 'Animated Gradient Settings', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'heading_settings' => array(
						'title'    => esc_html__( 'Heading Settings', 'dsm-supreme-modules-pro-for-divi' ),
						'priority' => 50,
					),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'          => array(
				'header' => array(
					'label'             => esc_html__( 'Animated Gradient', 'dsm-supreme-modules-pro-for-divi' ),
					'css'               => array(
						'main' => '%%order_class%% .dsm-animated-gradient-text',
					),
					'font_size'         => array(
						'default' => '26px',
					),
					'line_height'       => array(
						'default' => '1em',
					),
					'letter_spacing'    => array(
						'default' => '0px',
					),
					'hide_header_level' => true,
					'hide_text_color'   => true,
				),
			),
			'text'           => array(
				'use_text_orientation'  => false,
				'use_background_layout' => false,
				'css'                   => array(
					'text_shadow' => '%%order_class%%',
				),
				'options'               => array(
					'background_layout' => array(
						'default' => 'light',
					),
				),
			),
			'background'     => array(
				'css' => array(
					'main' => '%%order_class%%',
				),
			),
			'borders'        => array(
				'default' => array(
					'css' => array(
						'main' => array(
							'border_radii'  => '%%order_class%%',
							'border_styles' => '%%order_class%%',
						),
					),
				),
			),
			'text_shadow'    => array(
				// Don't add text-shadow fields since they already are via font-options
				'default' => false,
			),
			'margin_padding' => array(
				'draggable_padding' => false,
				'css'               => array(
					'padding'   => '%%order_class%%',
					'margin'    => '%%order_class%%',
					'important' => array( 'custom_margin' ),
				),
			),
			'box_shadow'     => array(
				'default' => array(
					'css' => array(
						'main' => '%%order_class%%',
					),
				),
			),
		);
	}

	public function get_fields() {
		return array(
			'animated_gradient_text'      => array(
				'label'            => esc_html__( 'Animated Gradient Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'option_category'  => 'basic_option',
				'toggle_slug'      => 'main_content',
				'default_on_front' => 'Animated Gradient Text',
				'dynamic_content'  => 'text',
			),
			'animated_gradient_direction' => array(
				'label'            => esc_html__( 'Gradient Direction', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'default'          => '-45deg',
				'default_on_front' => '-45deg',
				'default_unit'     => 'deg',
				'validate_unit'    => true,
				'allowed_units'    => 'deg',
				'range_settings'   => array(
					'min'  => '0',
					'max'  => '360',
					'step' => '1',
				),
				'toggle_slug'      => 'settings',
			),
			'animated_gradient_speed'     => array(
				'label'            => esc_html__( 'Animation Speed (s)', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'default'          => '8',
				'default_on_front' => '8',
				'validate_unit'    => true,
				'unitless'         => true,
				'range_settings'   => array(
					'min'  => '0',
					'max'  => '80',
					'step' => '1',
				),
				'toggle_slug'      => 'settings',
			),
			'heading_html_tag'            => array(
				'label'           => esc_html__( 'Heading HTLML Tag', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'h1'   => __( 'H1', 'dsm-supreme-modules-pro-for-divi' ),
					'h2'   => __( 'H2', 'dsm-supreme-modules-pro-for-divi' ),
					'h3'   => __( 'H3', 'dsm-supreme-modules-pro-for-divi' ),
					'h4'   => __( 'H4', 'dsm-supreme-modules-pro-for-divi' ),
					'h5'   => __( 'H5', 'dsm-supreme-modules-pro-for-divi' ),
					'h6'   => __( 'H6', 'dsm-supreme-modules-pro-for-divi' ),
					'div'  => __( 'div', 'dsm-supreme-modules-pro-for-divi' ),
					'span' => __( 'span', 'dsm-supreme-modules-pro-for-divi' ),
					'p'    => __( 'p', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'         => 'h2',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'heading_settings',
			),
			'gradient_one_color'          => array(
				'label'          => esc_html__( '#1 Gradient Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'custom_color'   => true,
				'description'    => esc_html__( 'Here you can define a custom color for the #1 Gradient Color.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'header',
				'default'        => '#cc2b5e',
				'mobile_options' => true,
			),
			'gradient_two_color'          => array(
				'label'          => esc_html__( '#2 Gradient Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'custom_color'   => true,
				'description'    => esc_html__( 'Here you can define a custom color for the #2 Gradient Color.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'header',
				'default'        => '#753a88',
				'mobile_options' => true,
			),
			'gradient_three_color'        => array(
				'label'          => esc_html__( '#3 Gradient Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'custom_color'   => true,
				'description'    => esc_html__( 'Here you can define a custom color for the #3 Gradient Color.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'header',
				'default'        => '#ec008c',
				'mobile_options' => true,
			),
			'gradient_four_color'         => array(
				'label'          => esc_html__( '#4 Gradient Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'custom_color'   => true,
				'description'    => esc_html__( 'Here you can define a custom color for the #4 Gradient Color.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'header',
				'default'        => '#6dd5ed',
				'mobile_options' => true,
			),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		$animated_gradient_text      = $this->props['animated_gradient_text'];
		$animated_gradient_direction = $this->props['animated_gradient_direction'];
		$animated_gradient_speed     = $this->props['animated_gradient_speed'] . 's';
		$heading_html_tag            = $this->props['heading_html_tag'];
		$gradient_one_color          = $this->props['gradient_one_color'];
		$gradient_one_color_values   = et_pb_responsive_options()->get_property_values( $this->props, 'gradient_one_color' );
		$gradient_one_color_tablet   = isset( $gradient_one_color_values['tablet'] ) ? $gradient_one_color_values['tablet'] : '';
		$gradient_one_color_phone    = isset( $gradient_one_color_values['phone'] ) ? $gradient_one_color_values['phone'] : '';
		$gradient_two_color          = $this->props['gradient_two_color'];
		$gradient_two_color_values   = et_pb_responsive_options()->get_property_values( $this->props, 'gradient_two_color' );
		$gradient_two_color_tablet   = isset( $gradient_two_color_values['tablet'] ) ? $gradient_two_color_values['tablet'] : '';
		$gradient_two_color_phone    = isset( $gradient_two_color_values['phone'] ) ? $gradient_two_color_values['phone'] : '';
		$gradient_three_color        = $this->props['gradient_three_color'];
		$gradient_three_color_values = et_pb_responsive_options()->get_property_values( $this->props, 'gradient_three_color' );
		$gradient_three_color_tablet = isset( $gradient_three_color_values['tablet'] ) ? $gradient_three_color_values['tablet'] : '';
		$gradient_three_color_phone  = isset( $gradient_three_color_values['phone'] ) ? $gradient_three_color_values['phone'] : '';
		$gradient_four_color         = $this->props['gradient_four_color'];
		$gradient_four_color_values  = et_pb_responsive_options()->get_property_values( $this->props, 'gradient_four_color' );
		$gradient_four_color_tablet  = isset( $gradient_four_color_values['tablet'] ) ? $gradient_four_color_values['tablet'] : '';
		$gradient_four_color_phone   = isset( $gradient_four_color_values['phone'] ) ? $gradient_four_color_values['phone'] : '';

		$text_selector = '%%order_class%% .dsm-animated-gradient-text';

		$gradient_one_color_style        = esc_attr( $gradient_one_color );
		$gradient_one_color_tablet_style = '' !== $gradient_one_color_tablet ? esc_attr( $gradient_one_color_tablet ) : $gradient_one_color_style;
		$gradient_one_color_phone_style  = '' !== $gradient_one_color_phone ? esc_attr( $gradient_one_color_phone ) : $gradient_one_color_style;

		$gradient_two_color_style        = esc_attr( $gradient_two_color );
		$gradient_two_color_tablet_style = '' !== $gradient_two_color_tablet ? esc_attr( $gradient_two_color_tablet ) : $gradient_two_color_style;
		$gradient_two_color_phone_style  = '' !== $gradient_two_color_phone ? esc_attr( $gradient_two_color_phone ) : $gradient_two_color_style;

		$gradient_three_color_style        = esc_attr( $gradient_three_color );
		$gradient_three_color_tablet_style = '' !== $gradient_three_color_tablet ? esc_attr( $gradient_three_color_tablet ) : $gradient_three_color_style;
		$gradient_three_color_phone_style  = '' !== $gradient_three_color_phone ? esc_attr( $gradient_three_color_phone ) : $gradient_three_color_style;

		$gradient_four_color_style        = esc_attr( $gradient_four_color );
		$gradient_four_color_tablet_style = '' !== $gradient_four_color_tablet ? esc_attr( $gradient_four_color_tablet ) : $gradient_four_color_style;
		$gradient_four_color_phone_style  = '' !== $gradient_four_color_phone ? esc_attr( $gradient_four_color_phone ) : $gradient_four_color_style;

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => $text_selector,
				'declaration' => sprintf(
					'background: linear-gradient(%1$s,%3$s,%4$s,%5$s,%6$s); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-size: 300%%; animation: dsm-animated-gradient-flow %2$s ease-in-out infinite; -webkit-animation: dsm-animated-gradient-flow %2$s ease-in-out infinite;',
					esc_attr( $animated_gradient_direction ),
					esc_attr( $animated_gradient_speed ),
					$gradient_one_color_style,
					$gradient_two_color_style,
					$gradient_three_color_style,
					$gradient_four_color_style
				),
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => $text_selector,
				'declaration' => sprintf(
					'background: linear-gradient(%1$s,%3$s,%4$s,%5$s,%6$s); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-size: 300%%; animation: dsm-animated-gradient-flow %2$s ease-in-out infinite; -webkit-animation: dsm-animated-gradient-flow %2$s ease-in-out infinite;',
					esc_attr( $animated_gradient_direction ),
					esc_attr( $animated_gradient_speed ),
					$gradient_one_color_tablet_style,
					$gradient_two_color_tablet_style,
					$gradient_three_color_tablet_style,
					$gradient_four_color_tablet_style
				),
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => $text_selector,
				'declaration' => sprintf(
					'background: linear-gradient(%1$s,%3$s,%4$s,%5$s,%6$s); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-size: 300%%; animation: dsm-animated-gradient-flow %2$s ease-in-out infinite; -webkit-animation: dsm-animated-gradient-flow %2$s ease-in-out infinite;',
					esc_attr( $animated_gradient_direction ),
					esc_attr( $animated_gradient_speed ),
					$gradient_one_color_phone_style,
					$gradient_two_color_phone_style,
					$gradient_three_color_phone_style,
					$gradient_four_color_phone_style
				),
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
			)
		);

		if ( '' !== $animated_gradient_text ) {
			$animated_gradient_text = sprintf(
				'<%1$s class="dsm-animated-gradient-text et_pb_module_header">%2$s</%1$s>',
				esc_attr( $heading_html_tag ),
				esc_html( $animated_gradient_text )
			);
		}

		// Render module content
		$output = sprintf(
			'%1$s',
			$animated_gradient_text
		);

		return $output;
	}
}

new DSM_AnimatedGradientText();
