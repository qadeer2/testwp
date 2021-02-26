<?php

class DSM_TextNotation extends ET_Builder_Module {

	public $slug       = 'dsm_text_notation';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name             = esc_html__( 'Supreme Text Notation', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path        = plugin_dir_path( __FILE__ ) . 'icon.svg';
		$this->main_css_element = '%%order_class%%.dsm_text_notation';

		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'main_content'      => esc_html__( 'Text', 'dsm-supreme-modules-pro-for-divi' ),
					'notation_settings' => esc_html__( 'Notation Settings', 'dsm-supreme-modules-pro-for-divi' ),
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
					'notation_styles'  => array(
						'title'    => esc_html__( 'Notation Text', 'dsm-supreme-modules-pro-for-divi' ),
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
			'before'   => array(
				'label'    => esc_html__( 'Before Text', 'dsm-supreme-modules-pro-for-divi' ),
				'selector' => '.dsm-text-notation-before',
			),
			'notation' => array(
				'label'    => esc_html__( 'Notation Text', 'dsm-supreme-modules-pro-for-divi' ),
				'selector' => '.dsm-text-notation-middle',
			),
			'after'    => array(
				'label'    => esc_html__( 'After Text', 'dsm-supreme-modules-pro-for-divi' ),
				'selector' => '.dsm-text-notation-after',
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'          => array(
				'header'   => array(
					'label'           => esc_html__( 'Main', 'dsm-supreme-modules-pro-for-divi' ),
					'css'             => array(
						'main' => "{$this->main_css_element} .dsm-text-notation-main",
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
				'before'   => array(
					'label'           => esc_html__( 'Before', 'dsm-supreme-modules-pro-for-divi' ),
					'css'             => array(
						'main' => "{$this->main_css_element} .dsm-text-notation-before",
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
				'notation' => array(
					'label'           => esc_html__( 'Notation', 'dsm-supreme-modules-pro-for-divi' ),
					'css'             => array(
						'main' => "{$this->main_css_element} .dsm-text-notation-middle",
					),
					'line_height'     => array(
						'default' => '1em',
					),
					'letter_spacing'  => array(
						'default' => '0px',
					),
					'hide_text_align' => true,
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'notation_styles',
				),
				'after'    => array(
					'label'           => esc_html__( 'After', 'dsm-supreme-modules-pro-for-divi' ),
					'css'             => array(
						'main' => "{$this->main_css_element} .dsm-text-notation-after",
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
				'default'  => array(
					'css' => array(
						'main' => array(
							'border_radii'  => "{$this->main_css_element}",
							'border_styles' => "{$this->main_css_element}",
						),
					),
				),
				'before'   => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => "{$this->main_css_element} .dsm-text-notation-before",
							'border_styles' => "{$this->main_css_element} .dsm-text-notation-before",
						),
					),
					'label_prefix' => esc_html__( 'Before Text', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'before_styles',
				),
				'notation' => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => "{$this->main_css_element} .dsm-text-notation-middle",
							'border_styles' => "{$this->main_css_element} .dsm-text-notation-middle",
						),
					),
					'label_prefix' => esc_html__( 'Notation Text', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'notation_styles',
				),
				'after'    => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => "{$this->main_css_element} .dsm-text-notation-after",
							'border_styles' => "{$this->main_css_element} .dsm-text-notation-after",
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
			'before_text'               => array(
				'label'           => esc_html__( 'Before Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'main_content',
				'dynamic_content' => 'text',
			),
			'notation_text'             => array(
				'label'            => esc_html__( 'Notation Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'option_category'  => 'basic_option',
				'toggle_slug'      => 'main_content',
				'default_on_front' => 'Text Notation',
				'dynamic_content'  => 'text',
			),
			'after_text'                => array(
				'label'           => esc_html__( 'After Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'main_content',
				'dynamic_content' => 'text',
			),
			'notation_type'             => array(
				'label'           => esc_html__( 'Type', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'underline'      => __( 'Underline', 'dsm-supreme-modules-pro-for-divi' ),
					'box'            => __( 'Box', 'dsm-supreme-modules-pro-for-divi' ),
					'circle'         => __( 'Circle', 'dsm-supreme-modules-pro-for-divi' ),
					'highlight'      => __( 'Highlight', 'dsm-supreme-modules-pro-for-divi' ),
					'strike-through' => __( 'Strike Through', 'dsm-supreme-modules-pro-for-divi' ),
					'crossed-off'    => __( 'Crossed Off', 'dsm-supreme-modules-pro-for-divi' ),
					'bracket'        => __( 'Bracket', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'         => 'underline',
				'toggle_slug'     => 'notation_settings',
			),
			'notation_bracket_style'    => array(
				'label'           => esc_html__( 'Bracket Styles', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'left|right' => __( 'Left to Right', 'dsm-supreme-modules-pro-for-divi' ),
					'right|left' => __( 'Right to Left', 'dsm-supreme-modules-pro-for-divi' ),
					'top|bottom' => __( 'Top to Bottom', 'dsm-supreme-modules-pro-for-divi' ),
					'bottom|top' => __( 'Bottom to Top', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'         => 'left|right',
				'toggle_slug'     => 'notation_settings',
				'show_if'         => array(
					'notation_type' => 'bracket',
				),
			),
			'notation_color'            => array(
				'label'          => esc_html__( 'Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'custom_color'   => true,
				'description'    => esc_html__( 'Here you can define a custom color for the notation animation.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'    => 'notation_settings',
				'default'        => et_builder_accent_color(),
				'hover'          => 'tabs',
				'mobile_options' => false,
			),
			'notation_width'            => array(
				'label'            => esc_html__( 'Stroke Width', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'default'          => '1',
				'default_on_front' => '1',
				'default_unit'     => '',
				'validate_unit'    => false,
				'mobile_options'   => false,
				'unitless'         => true,
				'responsive'       => false,
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '29',
					'step' => '1',
				),
				'toggle_slug'      => 'notation_settings',
				'description'      => esc_html__( 'Width of the annotation strokes.', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'notation_iterations'       => array(
				'label'            => esc_html__( 'Iterations', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'default'          => '2',
				'default_on_front' => '2',
				'default_unit'     => '',
				'validate_unit'    => true,
				'mobile_options'   => false,
				'unitless'         => true,
				'responsive'       => false,
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '5',
					'step' => '1',
				),
				'toggle_slug'      => 'notation_settings',
				'description'      => esc_html__( 'By default annotations are drawn in two iterations, e.g. when underlining, drawing from left to right and then back from right to left. Setting this property can let you configure the number of iterations.', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'notation_viewport'         => array(
				'label'            => esc_html__( 'Animate in Viewport', 'dsm-supreme-modules-pro-for-divi' ),
				'description'      => esc_html__( 'Animation when the div comes in viewport.', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'layout',
				'toggle_slug'      => 'notation_settings',
				'default'          => '80%',
				'default_on_front' => '80%',
				'unitless'         => false,
				'allow_empty'      => false,
				'range_settings'   => array(
					'min'  => '0',
					'max'  => '100',
					'step' => '1',
				),
				'responsive'       => false,
				'mobile_options'   => false,
			),
			'notation_delay'            => array(
				'label'            => esc_html__( 'Delay', 'dsm-supreme-modules-pro-for-divi' ),
				'description'      => esc_html__( 'Adjust delay for the notation animation.', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'layout',
				'toggle_slug'      => 'notation_settings',
				'default'          => '0ms',
				'default_on_front' => '0ms',
				'allow_empty'      => false,
				'range_settings'   => array(
					'min'  => '0',
					'max'  => '5000',
					'step' => '50',
				),
				'allowed_units'    => array( 'ms' ),
				'responsive'       => false,
				'mobile_options'   => false,
			),
			/*
			'notation_padding'        => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_padding',
				'mobile_options'  => true,
				//'hover'           => 'tabs',
				'default'         => '5px|5px|5px|5px',
				'default_unit'    => '',
				'unitless'        => true,
				'option_category' => 'layout',
				'allowed_units'   => array( 'px' ),
				'toggle_slug'     => 'notation_settings',
				'description'     => esc_html__( 'Adjust padding to specific values, or leave blank to use the default padding.', 'dsm-supreme-modules-pro-for-divi' ),
			),*/
			'heading_html_tag'          => array(
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
				'default'         => 'h1',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'heading_settings',
			),
			'before_background_color'   => array(
				'label'          => esc_html__( 'Background Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'custom_color'   => true,
				'description'    => esc_html__( 'Here you can define a custom background color for the before text.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'before_styles',
				'hover'          => 'tabs',
				'mobile_options' => true,
			),
			'notation_background_color' => array(
				'label'          => esc_html__( 'Background Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'custom_color'   => true,
				'description'    => esc_html__( 'Here you can define a custom background color for the notation text.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'notation_styles',
				'hover'          => 'tabs',
				'mobile_options' => true,
			),
			'after_background_color'    => array(
				'label'          => esc_html__( 'Background Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'custom_color'   => true,
				'description'    => esc_html__( 'Here you can define a custom background color for the after text.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'after_styles',
				'hover'          => 'tabs',
				'mobile_options' => true,
			),
			'before_margin'             => array(
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
			'notation_margin'           => array(
				'label'           => esc_html__( 'Margin', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'mobile_options'  => true,
				'hover'           => 'tabs',
				'option_category' => 'layout',
				'description'     => esc_html__( 'Adjust margin to specific values, or leave blank to use the default margin.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'notation_styles',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
			),
			'after_margin'              => array(
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
			'before_padding'            => array(
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
			'notation_padding'          => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_padding',
				'mobile_options'  => true,
				'hover'           => 'tabs',
				'option_category' => 'layout',
				'description'     => esc_html__( 'Adjust padding to specific values, or leave blank to use the default padding.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'notation_styles',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
			),
			'after_padding'             => array(
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
			'before_display_type'       => array(
				'label'           => esc_html__( 'Display', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'inline-block' => __( 'Inline Block', 'dsm-supreme-modules-pro-for-divi' ),
					'inline'       => __( 'Inline', 'dsm-supreme-modules-pro-for-divi' ),
					'block'        => __( 'Block', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'         => 'inline-block',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'before_styles',
			),
			'notation_display_type'     => array(
				'label'           => esc_html__( 'Display', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'inline-block' => __( 'Inline Block', 'dsm-supreme-modules-pro-for-divi' ),
					'inline'       => __( 'Inline', 'dsm-supreme-modules-pro-for-divi' ),
					'block'        => __( 'Block', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'         => 'inline-block',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'notation_styles',
			),
			'after_display_type'        => array(
				'label'           => esc_html__( 'Display', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'inline-block' => __( 'Inline Block', 'dsm-supreme-modules-pro-for-divi' ),
					'inline'       => __( 'Inline', 'dsm-supreme-modules-pro-for-divi' ),
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

		$fields['before_background_color']   = array(
			'background-color' => '%%order_class%% .dsm-text-notation-before',
		);
		$fields['notation_background_color'] = array(
			'background-color' => '%%order_class%% .dsm-text-notation-middle',
		);
		$fields['after_background_color']    = array(
			'background-color' => '%%order_class%% .dsm-text-notation-after',
		);
		$fields['before_padding']            = array(
			'padding' => '%%order_class%% .dsm-text-notation-before',
		);
		$fields['notation_padding']          = array(
			'padding' => '%%order_class%% .dsm-text-notation-middle',
		);
		$fields['after_padding']             = array(
			'padding' => '%%order_class%% .dsm-text-notation-after',
		);
		$fields['before_margin']             = array(
			'margin' => '%%order_class%% .dsm-text-notation-before',
		);
		$fields['notation_margin']           = array(
			'margin' => '%%order_class%% .dsm-text-notation-middle',
		);
		$fields['after_margin']              = array(
			'margin' => '%%order_class%% .dsm-text-notation-after',
		);

		return $fields;
	}

	public function render( $attrs, $content = null, $render_slug ) {
		$multi_view                            = et_pb_multi_view_options( $this );
		$before_text                           = $this->props['before_text'];
		$notation_text                         = $this->props['notation_text'];
		$after_text                            = $this->props['after_text'];
		$notation_type                         = $this->props['notation_type'];
		$notation_bracket_style                = $this->props['notation_bracket_style'];
		$notation_color                        = $this->props['notation_color'];
		$notation_width                        = $this->props['notation_width'];
		$notation_iterations                   = $this->props['notation_iterations'];
		$notation_padding                      = $this->props['notation_padding'];
		$notation_viewport                     = $this->props['notation_viewport'];
		$notation_delay                        = $this->props['notation_delay'];
		$heading_html_tag                      = $this->props['heading_html_tag'];
		$before_background_color_hover         = $this->get_hover_value( 'before_background_color' );
		$before_background_color               = $this->props['before_background_color'];
		$before_background_color_tablet        = $this->props['before_background_color_tablet'];
		$before_background_color_phone         = $this->props['before_background_color_phone'];
		$before_background_color_last_edited   = $this->props['before_background_color_last_edited'];
		$notation_background_color_hover       = $this->get_hover_value( 'notation_background_color' );
		$notation_background_color             = $this->props['notation_background_color'];
		$notation_background_color_tablet      = $this->props['notation_background_color_tablet'];
		$notation_background_color_phone       = $this->props['notation_background_color_phone'];
		$notation_background_color_last_edited = $this->props['notation_background_color_last_edited'];
		$after_background_color_hover          = $this->get_hover_value( 'after_background_color' );
		$after_background_color                = $this->props['after_background_color'];
		$after_background_color_tablet         = $this->props['after_background_color_tablet'];
		$after_background_color_phone          = $this->props['after_background_color_phone'];
		$after_background_color_last_edited    = $this->props['after_background_color_last_edited'];
		$before_padding_hover                  = $this->get_hover_value( 'before_padding' );
		$before_padding                        = $this->props['before_padding'];
		$before_padding_values                 = et_pb_responsive_options()->get_property_values( $this->props, 'before_padding' );
		$before_padding_size_tablet            = isset( $before_padding_values['tablet'] ) ? $before_padding_values['tablet'] : '';
		$before_padding_size_phone             = isset( $before_padding_values['phone'] ) ? $before_padding_values['phone'] : '';
		$notation_padding_hover                = $this->get_hover_value( 'notation_padding' );
		$notation_padding                      = $this->props['notation_padding'];
		$notation_padding_values               = et_pb_responsive_options()->get_property_values( $this->props, 'notation_padding' );
		$notation_padding_size_tablet          = isset( $notation_padding_values['tablet'] ) ? $notation_padding_values['tablet'] : '';
		$notation_padding_size_phone           = isset( $notation_padding_values['phone'] ) ? $notation_padding_values['phone'] : '';
		$after_padding_hover                   = $this->get_hover_value( 'after_padding' );
		$after_padding                         = $this->props['after_padding'];
		$after_padding_values                  = et_pb_responsive_options()->get_property_values( $this->props, 'after_padding' );
		$after_padding_size_tablet             = isset( $after_padding_values['tablet'] ) ? $after_padding_values['tablet'] : '';
		$after_padding_size_phone              = isset( $after_padding_values['phone'] ) ? $after_padding_values['phone'] : '';
		$before_margin_hover                   = $this->get_hover_value( 'before_margin' );
		$before_margin                         = $this->props['before_margin'];
		$before_margin_values                  = et_pb_responsive_options()->get_property_values( $this->props, 'before_margin' );
		$before_margin_size_tablet             = isset( $before_margin_values['tablet'] ) ? $before_margin_values['tablet'] : '';
		$before_margin_size_phone              = isset( $before_margin_values['phone'] ) ? $before_margin_values['phone'] : '';
		$notation_margin_hover                 = $this->get_hover_value( 'notation_margin' );
		$notation_margin                       = $this->props['notation_margin'];
		$notation_margin_values                = et_pb_responsive_options()->get_property_values( $this->props, 'notation_margin' );
		$notation_margin_size_tablet           = isset( $notation_margin_values['tablet'] ) ? $notation_margin_values['tablet'] : '';
		$notation_margin_size_phone            = isset( $notation_margin_values['phone'] ) ? $notation_margin_values['phone'] : '';
		$after_margin_hover                    = $this->get_hover_value( 'after_margin' );
		$after_margin                          = $this->props['after_margin'];
		$after_margin_values                   = et_pb_responsive_options()->get_property_values( $this->props, 'after_margin' );
		$after_margin_size_tablet              = isset( $after_margin_values['tablet'] ) ? $after_margin_values['tablet'] : '';
		$after_margin_size_phone               = isset( $after_margin_values['phone'] ) ? $after_margin_values['phone'] : '';
		$before_display_type                   = $this->props['before_display_type'];
		$notation_display_type                 = $this->props['notation_display_type'];
		$after_display_type                    = $this->props['after_display_type'];
		$background_layout                     = $this->props['background_layout'];
		/*
		var_dump($notation_bracket_style);
		$value_map              = array( 'top', 'right', 'bottom', 'left' );
		$tags = $this->process_multiple_checkboxes_field_value( $value_map, $this->props['notation_bracket_style'] );
		//$mystring = implode(', ',$tags);
		var_dump($tags);
		$notation_bracket_style              = $tags;
		*/

		$before_text_selector   = '%%order_class%% .dsm-text-notation-before';
		$notation_text_selector = '%%order_class%% .dsm-text-notation-middle';
		$after_text_selector    = '%%order_class%% .dsm-text-notation-after';

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

		$notation_text_style        = sprintf( 'background-color: %1$s;', esc_attr( $notation_background_color ) );
		$notation_text_tablet_style = '' !== $notation_background_color_tablet ? sprintf( 'background-color: %1$s;', esc_attr( $notation_background_color_tablet ) ) : '';
		$notation_text_phone_style  = '' !== $notation_background_color_phone ? sprintf( 'background-color: %1$s;', esc_attr( $notation_background_color_phone ) ) : '';
		$notation_text_style_hover  = '';

		if ( et_builder_is_hover_enabled( 'notation_background_color', $this->props ) ) {
			$notation_text_style_hover = sprintf( 'background-color: %1$s;', esc_attr( $notation_background_color_hover ) );
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $this->add_hover_to_order_class( $notation_text_selector ),
					'declaration' => $notation_text_style_hover,
				)
			);
		}

		if ( '' !== $notation_background_color ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $notation_text_selector,
					'declaration' => $notation_text_style,
				)
			);
		}

		if ( '' !== $notation_background_color_tablet ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $notation_text_selector,
					'declaration' => $notation_text_tablet_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( '' !== $notation_background_color_phone ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $notation_text_selector,
					'declaration' => $notation_text_phone_style,
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

		if ( 'inline-block' !== $notation_display_type ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $notation_text_selector,
					'declaration' => sprintf(
						'display: %1$s;',
						esc_attr( $notation_display_type )
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
			'notation_margin',
			'margin',
			$notation_text_selector
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
			'notation_padding',
			'padding',
			$notation_text_selector
		);

		$this->apply_custom_margin_padding(
			$render_slug,
			'after_padding',
			'padding',
			$after_text_selector
		);

		$data_attr[] = array(
			'type'         => $notation_type,
			'color'        => $notation_color,
			'stroke-width' => $notation_width,
			'iterations'   => $notation_iterations,
			'brackets'     => $notation_bracket_style,
			'viewport'     => $notation_viewport,
			'delay'        => $notation_delay,
		);

		$notation_text = $multi_view->render_element(
			array(
				'tag'     => 'span',
				'content' => '{{notation_text}}',
				'attrs'   => array(
					'class'         => 'dsm-text-notation-middle',
					'data-notation' => wp_json_encode( $data_attr ),
				),
			)
		);

		$before_text = $multi_view->render_element(
			array(
				'tag'     => 'span',
				'content' => '{{before_text}}',
				'attrs'   => array(
					'class' => 'dsm-text-notation-before',
				),
			)
		);

		$after_text = $multi_view->render_element(
			array(
				'tag'     => 'span',
				'content' => '{{after_text}}',
				'attrs'   => array(
					'class' => 'dsm-text-notation-after',
				),
			)
		);

		$this->add_classname(
			array(
				$this->get_text_orientation_classname(),
				"et_pb_bg_layout_{$background_layout}",
			)
		);

		wp_enqueue_script( 'dsm-text-notation' );
		// Render module content.
		$output = sprintf(
			'<%1$s class="dsm-text-notation-main et_pb_module_header">%3$s%2$s%4$s</%1$s>',
			esc_attr( $heading_html_tag ),
			et_core_esc_previously( $notation_text ),
			et_core_esc_previously( $before_text ),
			et_core_esc_previously( $after_text )
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

new DSM_TextNotation();
