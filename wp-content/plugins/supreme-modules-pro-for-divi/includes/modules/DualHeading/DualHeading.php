<?php

class DSM_Dual_Heading extends ET_Builder_Module {

	public $slug       = 'dsm_dual_heading';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name             = esc_html__( 'Supreme Dual Heading', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path        = plugin_dir_path( __FILE__ ) . 'icon.svg';
		$this->main_css_element = '%%order_class%%.dsm_dual_heading';

		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Dual Heading Text', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'heading_settings' => array(
						'title'    => esc_html__( 'Heading Settings', 'dsm-supreme-modules-pro-for-divi' ),
						'priority' => 5,
					),
					'text'             => array(
						'title'    => esc_html__( 'Main Text', 'dsm-supreme-modules-pro-for-divi' ),
						'priority' => 25,
					),
					'before_styles'    => array(
						'title'    => esc_html__( 'Before Text', 'dsm-supreme-modules-pro-for-divi' ),
						'priority' => 25,
					),
					'middle_styles'    => array(
						'title'    => esc_html__( 'Middle Text', 'dsm-supreme-modules-pro-for-divi' ),
						'priority' => 25,
					),
					'after_styles'     => array(
						'title'    => esc_html__( 'After Text', 'dsm-supreme-modules-pro-for-divi' ),
						'priority' => 25,
					),
				),
			),
		);
		$this->custom_css_fields      = array(
			'before' => array(
				'label'    => esc_html__( 'Before Text', 'dsm-supreme-modules-pro-for-divi' ),
				'selector' => '.dsm-dual-heading-before',
			),
			'middle' => array(
				'label'    => esc_html__( 'Middle Text', 'dsm-supreme-modules-pro-for-divi' ),
				'selector' => '.dsm-dual-heading-middle',
			),
			'after'  => array(
				'label'    => esc_html__( 'After Text', 'dsm-supreme-modules-pro-for-divi' ),
				'selector' => '.dsm-dual-heading-after',
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'          => array(
				'header' => array(
					'label'           => esc_html__( 'Main', 'dsm-supreme-modules-pro-for-divi' ),
					'css'             => array(
						'main' => "{$this->main_css_element} .dsm-dual-heading-main",
					),
					'font_size'       => array(
						'default' => '26px',
					),
					'line_height'     => array(
						'default' => '1em',
					),
					'letter_spacing'  => array(
						'default' => '0px',
					),
					'hide_text_align' => true,
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'text',
				),
				'before' => array(
					'label'           => esc_html__( 'Before', 'dsm-supreme-modules-pro-for-divi' ),
					'css'             => array(
						'main' => "{$this->main_css_element} .dsm-dual-heading-before",
					),
					'line_height'     => array(
						'default' => '1em',
					),
					'letter_spacing'  => array(
						'default' => '0px',
					),
					'hide_text_align' => true,
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'before_styles',
				),
				'middle' => array(
					'label'           => esc_html__( 'Middle', 'dsm-supreme-modules-pro-for-divi' ),
					'css'             => array(
						'main' => "{$this->main_css_element} .dsm-dual-heading-middle",
					),
					'text_color'      => array(
						'default' => et_builder_accent_color(),
					),
					'line_height'     => array(
						'default' => '1em',
					),
					'letter_spacing'  => array(
						'default' => '0px',
					),
					'hide_text_align' => true,
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'middle_styles',
				),
				'after'  => array(
					'label'           => esc_html__( 'After', 'dsm-supreme-modules-pro-for-divi' ),
					'css'             => array(
						'main' => "{$this->main_css_element} .dsm-dual-heading-after",
					),
					'line_height'     => array(
						'default' => '1em',
					),
					'letter_spacing'  => array(
						'default' => '0px',
					),
					'hide_text_align' => true,
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'after_styles',
				),
			),
			'text'           => array(
				'use_text_orientation'  => true,
				'use_background_layout' => true,
				'css'                   => array(
					'text_shadow' => "{$this->main_css_element}",
				),
				'options'               => array(
					'background_layout' => array(
						'default' => 'light',
					),
				),
			),
			'background'     => array(
				'css'     => array(
					'main' => '%%order_class%%',
				),
				'options' => array(
					'parallax_method' => array(
						'default' => 'off',
					),
				),
			),
			'margin_padding' => array(
				'css' => array(
					'main'      => "{$this->main_css_element}",
					'important' => 'all',
				),
			),
			'borders'        => array(
				'default' => array(
					'css' => array(
						'main' => array(
							'border_radii'  => "{$this->main_css_element}",
							'border_styles' => "{$this->main_css_element}",
						),
					),
				),
				'before'  => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => "{$this->main_css_element} .dsm-dual-heading-before",
							'border_styles' => "{$this->main_css_element} .dsm-dual-heading-before",
						),
					),
					'label_prefix' => esc_html__( 'Before Text', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'before_styles',
				),
				'middle'  => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => "{$this->main_css_element} .dsm-dual-heading-middle",
							'border_styles' => "{$this->main_css_element} .dsm-dual-heading-middle",
						),
					),
					'label_prefix' => esc_html__( 'Middle Text', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'middle_styles',
				),
				'after'   => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => "{$this->main_css_element} .dsm-dual-heading-after",
							'border_styles' => "{$this->main_css_element} .dsm-dual-heading-after",
						),
					),
					'label_prefix' => esc_html__( 'After Text', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'after_styles',
				),
			),
			'box_shadow'     => array(
				'default' => array(
					'css' => array(
						'main' => "{$this->main_css_element}",
					),
				),
			),
		);
	}

	public function get_fields() {
		$et_accent_color = et_builder_accent_color();
		return array(
			'before_text'             => array(
				'label'            => esc_html__( 'Before Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'option_category'  => 'basic_option',
				'toggle_slug'      => 'main_content',
				'default_on_front' => 'Dual ',
				'dynamic_content'  => 'text',
			),
			'middle_text'             => array(
				'label'            => esc_html__( 'Middle Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'option_category'  => 'basic_option',
				'toggle_slug'      => 'main_content',
				'default_on_front' => 'Heading',
				'dynamic_content'  => 'text',
			),
			'after_text'              => array(
				'label'           => esc_html__( 'After Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'main_content',
				'dynamic_content' => 'text',
			),
			'heading_html_tag'        => array(
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
			'before_background_color' => array(
				'label'          => esc_html__( 'Background Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'custom_color'   => true,
				'description'    => esc_html__( 'Here you can define a custom background color for the before text.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'before_styles',
				'hover'          => 'tabs',
				'mobile_options' => true,
			),
			'middle_background_color' => array(
				'label'          => esc_html__( 'Background Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'custom_color'   => true,
				'description'    => esc_html__( 'Here you can define a custom background color for the middle text.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'middle_styles',
				'hover'          => 'tabs',
				'mobile_options' => true,
			),
			'after_background_color'  => array(
				'label'          => esc_html__( 'Background Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'custom_color'   => true,
				'description'    => esc_html__( 'Here you can define a custom background color for the after text.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'after_styles',
				'hover'          => 'tabs',
				'mobile_options' => true,
			),
			'before_margin'           => array(
				'label'           => esc_html__( 'Margin', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'mobile_options'  => true,
				'hover'           => 'tabs',
				'option_category' => 'layout',
				'description'     => esc_html__( 'Adjust margin to specific values, or leave blank to use the default margin.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'before_styles',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
			),
			'middle_margin'           => array(
				'label'           => esc_html__( 'Margin', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'mobile_options'  => true,
				'hover'           => 'tabs',
				'option_category' => 'layout',
				'description'     => esc_html__( 'Adjust margin to specific values, or leave blank to use the default margin.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'middle_styles',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
			),
			'after_margin'            => array(
				'label'           => esc_html__( 'Margin', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'mobile_options'  => true,
				'hover'           => 'tabs',
				'option_category' => 'layout',
				'description'     => esc_html__( 'Adjust margin to specific values, or leave blank to use the default margin.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'after_styles',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
			),
			'before_padding'          => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_padding',
				'mobile_options'  => true,
				'hover'           => 'tabs',
				'option_category' => 'layout',
				'description'     => esc_html__( 'Adjust padding to specific values, or leave blank to use the default padding.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'before_styles',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
			),
			'middle_padding'          => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_padding',
				'mobile_options'  => true,
				'hover'           => 'tabs',
				'option_category' => 'layout',
				'description'     => esc_html__( 'Adjust padding to specific values, or leave blank to use the default padding.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'middle_styles',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
			),
			'after_padding'           => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_padding',
				'mobile_options'  => true,
				'hover'           => 'tabs',
				'option_category' => 'layout',
				'description'     => esc_html__( 'Adjust padding to specific values, or leave blank to use the default padding.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'after_styles',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
			),
			'before_display_type'     => array(
				'label'           => esc_html__( 'Display', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'inline-block' => __( 'Inline Block', 'dsm-supreme-modules-pro-for-divi' ),
					'block'        => __( 'Block', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'         => 'inline-block',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'before_styles',
			),
			'middle_display_type'     => array(
				'label'           => esc_html__( 'Display', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'inline-block' => __( 'Inline Block', 'dsm-supreme-modules-pro-for-divi' ),
					'block'        => __( 'Block', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'         => 'inline-block',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'middle_styles',
			),
			'after_display_type'      => array(
				'label'           => esc_html__( 'Display', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'inline-block' => __( 'Inline Block', 'dsm-supreme-modules-pro-for-divi' ),
					'block'        => __( 'Block', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'         => 'inline-block',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'after_styles',
			),
		);
	}

	public function get_transition_fields_css_props() {
		$fields = parent::get_transition_fields_css_props();

		$fields['before_background_color'] = array(
			'background-color' => '%%order_class%% .dsm-dual-heading-before',
		);
		$fields['middle_background_color'] = array(
			'background-color' => '%%order_class%% .dsm-dual-heading-middle',
		);
		$fields['after_background_color']  = array(
			'background-color' => '%%order_class%% .dsm-dual-heading-after',
		);
		$fields['before_padding']          = array(
			'padding' => '%%order_class%% .dsm-dual-heading-before',
		);
		$fields['middle_padding']          = array(
			'padding' => '%%order_class%% .dsm-dual-heading-middle',
		);
		$fields['after_padding']           = array(
			'padding' => '%%order_class%% .dsm-dual-heading-after',
		);
		$fields['before_margin']           = array(
			'margin' => '%%order_class%% .dsm-dual-heading-before',
		);
		$fields['middle_margin']           = array(
			'margin' => '%%order_class%% .dsm-dual-heading-middle',
		);
		$fields['after_margin']            = array(
			'margin' => '%%order_class%% .dsm-dual-heading-after',
		);

		return $fields;
	}

	public function render( $attrs, $content = null, $render_slug ) {
		$before_text                         = $this->props['before_text'];
		$middle_text                         = $this->props['middle_text'];
		$after_text                          = $this->props['after_text'];
		$heading_html_tag                    = $this->props['heading_html_tag'];
		$before_background_color_hover       = $this->get_hover_value( 'before_background_color' );
		$before_background_color             = $this->props['before_background_color'];
		$before_background_color_tablet      = $this->props['before_background_color_tablet'];
		$before_background_color_phone       = $this->props['before_background_color_phone'];
		$before_background_color_last_edited = $this->props['before_background_color_last_edited'];
		$middle_background_color_hover       = $this->get_hover_value( 'middle_background_color' );
		$middle_background_color             = $this->props['middle_background_color'];
		$middle_background_color_tablet      = $this->props['middle_background_color_tablet'];
		$middle_background_color_phone       = $this->props['middle_background_color_phone'];
		$middle_background_color_last_edited = $this->props['middle_background_color_last_edited'];
		$after_background_color_hover        = $this->get_hover_value( 'after_background_color' );
		$after_background_color              = $this->props['after_background_color'];
		$after_background_color_tablet       = $this->props['after_background_color_tablet'];
		$after_background_color_phone        = $this->props['after_background_color_phone'];
		$after_background_color_last_edited  = $this->props['after_background_color_last_edited'];
		$before_padding_hover                = $this->get_hover_value( 'before_padding' );
		$before_padding                      = $this->props['before_padding'];
		$before_padding_values               = et_pb_responsive_options()->get_property_values( $this->props, 'before_padding' );
		$before_padding_size_tablet          = isset( $before_padding_values['tablet'] ) ? $before_padding_values['tablet'] : '';
		$before_padding_size_phone           = isset( $before_padding_values['phone'] ) ? $before_padding_values['phone'] : '';
		$middle_padding_hover                = $this->get_hover_value( 'middle_padding' );
		$middle_padding                      = $this->props['middle_padding'];
		$middle_padding_values               = et_pb_responsive_options()->get_property_values( $this->props, 'middle_padding' );
		$middle_padding_size_tablet          = isset( $middle_padding_values['tablet'] ) ? $middle_padding_values['tablet'] : '';
		$middle_padding_size_phone           = isset( $middle_padding_values['phone'] ) ? $middle_padding_values['phone'] : '';
		$after_padding_hover                 = $this->get_hover_value( 'after_padding' );
		$after_padding                       = $this->props['after_padding'];
		$after_padding_values                = et_pb_responsive_options()->get_property_values( $this->props, 'after_padding' );
		$after_padding_size_tablet           = isset( $after_padding_values['tablet'] ) ? $after_padding_values['tablet'] : '';
		$after_padding_size_phone            = isset( $after_padding_values['phone'] ) ? $after_padding_values['phone'] : '';
		$before_margin_hover                 = $this->get_hover_value( 'before_margin' );
		$before_margin                       = $this->props['before_margin'];
		$before_margin_values                = et_pb_responsive_options()->get_property_values( $this->props, 'before_margin' );
		$before_margin_size_tablet           = isset( $before_margin_values['tablet'] ) ? $before_margin_values['tablet'] : '';
		$before_margin_size_phone            = isset( $before_margin_values['phone'] ) ? $before_margin_values['phone'] : '';
		$middle_margin_hover                 = $this->get_hover_value( 'middle_margin' );
		$middle_margin                       = $this->props['middle_margin'];
		$middle_margin_values                = et_pb_responsive_options()->get_property_values( $this->props, 'middle_margin' );
		$middle_margin_size_tablet           = isset( $middle_margin_values['tablet'] ) ? $middle_margin_values['tablet'] : '';
		$middle_margin_size_phone            = isset( $middle_margin_values['phone'] ) ? $middle_margin_values['phone'] : '';
		$after_margin_hover                  = $this->get_hover_value( 'after_margin' );
		$after_margin                        = $this->props['after_margin'];
		$after_margin_values                 = et_pb_responsive_options()->get_property_values( $this->props, 'after_margin' );
		$after_margin_size_tablet            = isset( $after_margin_values['tablet'] ) ? $after_margin_values['tablet'] : '';
		$after_margin_size_phone             = isset( $after_margin_values['phone'] ) ? $after_margin_values['phone'] : '';
		$before_display_type                 = $this->props['before_display_type'];
		$middle_display_type                 = $this->props['middle_display_type'];
		$after_display_type                  = $this->props['after_display_type'];
		$background_layout                   = $this->props['background_layout'];

		$before_text_selector = '%%order_class%% .dsm-dual-heading-before';
		$middle_text_selector = '%%order_class%% .dsm-dual-heading-middle';
		$after_text_selector  = '%%order_class%% .dsm-dual-heading-after';

		$before_text_style        = sprintf( 'background-color: %1$s;', esc_attr( $before_background_color ) );
		$before_text_tablet_style = '' !== $before_background_color_tablet ? sprintf( 'background-color: %1$s;', esc_attr( $before_background_color_tablet ) ) : '';
		$before_text_phone_style  = '' !== $before_background_color_phone ? sprintf( 'background-color: %1$s;', esc_attr( $before_background_color_phone ) ) : '';
		$before_text_style_hover  = '';

		if ( et_builder_is_hover_enabled( 'before_background_color', $this->props ) ) {
			$before_text_style_hover = sprintf( 'background-color: %1$s;', esc_attr( $before_background_color_hover ) );
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $this->add_hover_to_order_class( $before_text_selector ),
					'declaration' => $before_text_style_hover,
				)
			);
		}

		if ( '' !== $before_background_color ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $before_text_selector,
					'declaration' => $before_text_style,
				)
			);
		}

		if ( '' !== $before_background_color_tablet ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $before_text_selector,
					'declaration' => $before_text_tablet_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( '' !== $before_background_color_phone ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $before_text_selector,
					'declaration' => $before_text_phone_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		$middle_text_style        = sprintf( 'background-color: %1$s;', esc_attr( $middle_background_color ) );
		$middle_text_tablet_style = '' !== $middle_background_color_tablet ? sprintf( 'background-color: %1$s;', esc_attr( $middle_background_color_tablet ) ) : '';
		$middle_text_phone_style  = '' !== $middle_background_color_phone ? sprintf( 'background-color: %1$s;', esc_attr( $middle_background_color_phone ) ) : '';
		$middle_text_style_hover  = '';

		if ( et_builder_is_hover_enabled( 'middle_background_color', $this->props ) ) {
			$middle_text_style_hover = sprintf( 'background-color: %1$s;', esc_attr( $middle_background_color_hover ) );
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $this->add_hover_to_order_class( $middle_text_selector ),
					'declaration' => $middle_text_style_hover,
				)
			);
		}

		if ( '' !== $middle_background_color ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $middle_text_selector,
					'declaration' => $middle_text_style,
				)
			);
		}

		if ( '' !== $middle_background_color_tablet ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $middle_text_selector,
					'declaration' => $middle_text_tablet_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( '' !== $middle_background_color_phone ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $middle_text_selector,
					'declaration' => $middle_text_phone_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		$after_text_style        = sprintf( 'background-color: %1$s;', esc_attr( $after_background_color ) );
		$after_text_tablet_style = '' !== $after_background_color_tablet ? sprintf( 'background-color: %1$s;', esc_attr( $after_background_color_tablet ) ) : '';
		$after_text_phone_style  = '' !== $after_background_color_phone ? sprintf( 'background-color: %1$s;', esc_attr( $after_background_color_phone ) ) : '';
		$after_text_style_hover  = '';

		if ( et_builder_is_hover_enabled( 'after_background_color', $this->props ) ) {
			$after_text_style_hover = sprintf( 'background-color: %1$s;', esc_attr( $after_background_color_hover ) );
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $this->add_hover_to_order_class( $after_text_selector ),
					'declaration' => $after_text_style_hover,
				)
			);
		}

		if ( '' !== $after_background_color ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $after_text_selector,
					'declaration' => $after_text_style,
				)
			);
		}

		if ( '' !== $after_background_color_tablet ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $after_text_selector,
					'declaration' => $after_text_tablet_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( '' !== $after_background_color_phone ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $after_text_selector,
					'declaration' => $after_text_phone_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( 'inline-block' !== $before_display_type ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $before_text_selector,
					'declaration' => sprintf(
						'display: %1$s;',
						esc_attr( $before_display_type )
					),
				)
			);
		}

		if ( 'inline-block' !== $middle_display_type ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $middle_text_selector,
					'declaration' => sprintf(
						'display: %1$s;',
						esc_attr( $middle_display_type )
					),
				)
			);
		}

		if ( 'inline-block' !== $after_display_type ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $after_text_selector,
					'declaration' => sprintf(
						'display: %1$s;',
						esc_attr( $after_display_type )
					),
				)
			);
		}

		$this->apply_custom_margin_padding(
			$render_slug,
			'before_margin',
			'margin',
			$before_text_selector
		);

		$this->apply_custom_margin_padding(
			$render_slug,
			'middle_margin',
			'margin',
			$middle_text_selector
		);

		$this->apply_custom_margin_padding(
			$render_slug,
			'after_margin',
			'margin',
			$after_text_selector
		);

		$this->apply_custom_margin_padding(
			$render_slug,
			'before_padding',
			'padding',
			$before_text_selector
		);

		$this->apply_custom_margin_padding(
			$render_slug,
			'middle_padding',
			'padding',
			$middle_text_selector
		);

		$this->apply_custom_margin_padding(
			$render_slug,
			'after_padding',
			'padding',
			$after_text_selector
		);

		if ( '' !== $before_text ) {
			$before_text = sprintf(
				'<span class="dsm-dual-heading-before">%1$s</span>',
				$before_text
			);
		}

		if ( '' !== $middle_text ) {
			$middle_text = sprintf(
				'<span class="dsm-dual-heading-middle">%1$s</span>',
				$middle_text
			);
		}

		if ( '' !== $after_text ) {
			$after_text = sprintf(
				'<span class="dsm-dual-heading-after">%1$s</span>',
				$after_text
			);
		}

		$this->add_classname(
			array(
				$this->get_text_orientation_classname(),
				"et_pb_bg_layout_{$background_layout}",
			)
		);

		// Render module content
		$output = sprintf(
			'<%1$s class="dsm-dual-heading-main et_pb_module_header">%3$s%2$s%4$s</%1$s>',
			esc_attr( $heading_html_tag ),
			$middle_text,
			$before_text,
			$after_text
		);

		return $output;
	}

	/**
	 * Apply Margin and Padding
	 */
	public function apply_custom_margin_padding( $function_name, $slug, $type, $class, $important = false ) {
		$slug_value                   = $this->props[ $slug ];
		$slug_value_tablet            = $this->props[ $slug . '_tablet' ];
		$slug_value_phone             = $this->props[ $slug . '_phone' ];
		$slug_value_last_edited       = $this->props[ $slug . '_last_edited' ];
		$slug_value_responsive_active = et_pb_get_responsive_status( $slug_value_last_edited );

		if ( isset( $slug_value ) && ! empty( $slug_value ) ) {
			ET_Builder_Element::set_style(
				$function_name,
				array(
					'selector'    => $class,
					'declaration' => et_builder_get_element_style_css( $slug_value, $type, $important ),
				)
			);
		}

		if ( isset( $slug_value_tablet ) && ! empty( $slug_value_tablet ) && $slug_value_responsive_active ) {
			ET_Builder_Element::set_style(
				$function_name,
				array(
					'selector'    => $class,
					'declaration' => et_builder_get_element_style_css( $slug_value_tablet, $type, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( isset( $slug_value_phone ) && ! empty( $slug_value_phone ) && $slug_value_responsive_active ) {
			ET_Builder_Element::set_style(
				$function_name,
				array(
					'selector'    => $class,
					'declaration' => et_builder_get_element_style_css( $slug_value_phone, $type, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}
		if ( et_builder_is_hover_enabled( $slug, $this->props ) ) {
			if ( isset( $this->props[ $slug . '__hover' ] ) ) {
				$hover = $this->props[ $slug . '__hover' ];
				ET_Builder_Element::set_style(
					$function_name,
					array(
						'selector'    => $this->add_hover_to_order_class( $class ),
						'declaration' => et_builder_get_element_style_css( $hover, $type, $important ),
					)
				);
			}
		}
	}
}

new DSM_Dual_Heading();
