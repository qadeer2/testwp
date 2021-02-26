<?php

class DSM_TextRotator extends ET_Builder_Module {

	public $slug       = 'dsm_text_rotator';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name             = esc_html__( 'Supreme Text Rotator', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path        = plugin_dir_path( __FILE__ ) . 'icon.svg';
		$this->main_css_element = '%%order_class%%.dsm_text_rotator';

		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Rotator Text', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'heading_settings' => array(
						'title'    => esc_html__( 'Heading Settings', 'dsm-supreme-modules-pro-for-divi' ),
						'priority' => 5,
					),
					'text'             => array(
						'title'    => esc_html__( 'Text', 'dsm-supreme-modules-pro-for-divi' ),
						'priority' => 25,
					),
					'before_styles'    => array(
						'title'    => esc_html__( 'Before Rotator Text', 'dsm-supreme-modules-pro-for-divi' ),
						'priority' => 25,
					),
					'rotator_styles'   => array(
						'title'    => esc_html__( 'Rotator Text', 'dsm-supreme-modules-pro-for-divi' ),
						'priority' => 25,
					),
					'after_styles'     => array(
						'title'    => esc_html__( 'After Rotator Text', 'dsm-supreme-modules-pro-for-divi' ),
						'priority' => 25,
					),
				),
			),
		);
		$this->custom_css_fields      = array(
			'before'  => array(
				'label'    => esc_html__( 'Before Text', 'dsm-supreme-modules-pro-for-divi' ),
				'selector' => '.dsm-rotate-text-before',
			),
			'rotator' => array(
				'label'    => esc_html__( 'Rotator Text', 'dsm-supreme-modules-pro-for-divi' ),
				'selector' => '.dsm-rotate-text',
			),
			'after'   => array(
				'label'    => esc_html__( 'After Text', 'dsm-supreme-modules-pro-for-divi' ),
				'selector' => '.dsm-rotate-text-after',
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'          => array(
				'header'  => array(
					'label'           => esc_html__( 'Main', 'dsm-supreme-modules-pro-for-divi' ),
					'css'             => array(
						'main' => "{$this->main_css_element} .dsm-rotate-text-main",
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
				'before'  => array(
					'label'           => esc_html__( 'Before', 'dsm-supreme-modules-pro-for-divi' ),
					'css'             => array(
						'main' => "{$this->main_css_element} .dsm-rotate-text-before",
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
				'rotator' => array(
					'label'           => esc_html__( 'Rotator', 'dsm-supreme-modules-pro-for-divi' ),
					'css'             => array(
						'main' => "{$this->main_css_element} .dsm-rotate-text",
					),
					'line_height'     => array(
						'default' => '1em',
					),
					'letter_spacing'  => array(
						'default' => '0px',
					),
					'hide_text_align' => true,
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'rotator_styles',
				),
				'after'   => array(
					'label'           => esc_html__( 'After', 'dsm-supreme-modules-pro-for-divi' ),
					'css'             => array(
						'main' => "{$this->main_css_element} .dsm-rotate-text-after",
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
					'main' => "{$this->main_css_element}",
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
							'border_radii'  => "{$this->main_css_element} .dsm-rotate-text-before",
							'border_styles' => "{$this->main_css_element} .dsm-rotate-text-before",
						),
					),
					'label_prefix' => esc_html__( 'Before Text', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'before_styles',
				),
				'rotator' => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => "{$this->main_css_element} .dsm-rotate-text",
							'border_styles' => "{$this->main_css_element} .dsm-rotate-text",
						),
					),
					'label_prefix' => esc_html__( 'Rotator Text', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'rotator_styles',
				),
				'after'   => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => "{$this->main_css_element} .dsm-rotate-text-after",
							'border_styles' => "{$this->main_css_element} .dsm-rotate-text-after",
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
		$dsm_animation_in_type_list = array(
			'fadeIn'            => esc_html__( 'Fade In', 'dsm-supreme-modules-pro-for-divi' ),
			'fadeInDown'        => esc_html__( 'Fade In Down', 'dsm-supreme-modules-pro-for-divi' ),
			'fadeInLeft'        => esc_html__( 'Fade In Left', 'dsm-supreme-modules-pro-for-divi' ),
			'fadeInRight'       => esc_html__( 'Fade In Right', 'dsm-supreme-modules-pro-for-divi' ),
			'fadeInDown'        => esc_html__( 'Fade In Down', 'dsm-supreme-modules-pro-for-divi' ),
			'fadeInUp'          => esc_html__( 'Fade In Up', 'dsm-supreme-modules-pro-for-divi' ),
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
		return array(
			'text_rotator'              => array(
				'label'            => esc_html__( 'Rotator Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'sortable_list',
				'option_category'  => 'basic_option',
				'description'      => esc_html__( 'Text entered here will appear as Rotating Effect.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'      => 'main_content',
				'default'          => '[{"value":"Divi","checked":0,"dragID":-1},{"value":"Supreme","checked":0,"dragID":0},{"value":"Rotate","checked":0,"dragID":1}]',
				'computed_affects' => array(
					'__rotatorText',
				),
			),
			'__rotatorText'             => array(
				'type'                => 'computed',
				'computed_callback'   => array( 'DSM_TextRotator', 'get_rotatorText' ),
				'computed_depends_on' => array(
					'text_rotator',
					'text_rotator_animation_in',
					'text_rotator_speed',
					'text_rotator_pause_hover',
					'text_rotator_click_change',
					'heading_html_tag',
				),
			),
			'before_text'               => array(
				'label'           => esc_html__( 'Before Rotator Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'main_content',
				'dynamic_content' => 'text',
			),
			'after_text'                => array(
				'label'           => esc_html__( 'After Rotator Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'main_content',
				'dynamic_content' => 'text',
			),
			'text_rotator_animation_in' => array(
				'label'            => esc_html__( 'Rotate Animation', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'layout',
				'default_on_front' => 'fadeIn',
				'toggle_slug'      => 'main_content',
				'options'          => $dsm_animation_in_type_list,
				'computed_affects' => array(
					'__rotatorText',
				),
			),
			'text_rotator_speed'        => array(
				'label'            => esc_html__( 'Rotate Speed (in ms)', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'default'          => '3000ms',
				'default_on_front' => '3000ms',
				'default_unit'     => 'ms',
				'range_settings'   => array(
					'min'  => '800',
					'max'  => '8000',
					'step' => '1',
				),
				'toggle_slug'      => 'main_content',
				'computed_affects' => array(
					'__rotatorText',
				),
			),
			'text_rotator_pause_hover'  => array(
				'label'            => esc_html__( 'Pause On Hover', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'basic_option',
				'default_on_front' => 'off',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Here you can choose to pause the animation on hover/mouseover.', 'dsm-supreme-modules-pro-for-divi' ),
				'computed_affects' => array(
					'__rotatorText',
				),
			),
			'text_rotator_click_change' => array(
				'label'            => esc_html__( 'Change On Click', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'basic_option',
				'default_on_front' => 'off',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Here you can choose to change the word on click.', 'dsm-supreme-modules-pro-for-divi' ),
				'computed_affects' => array(
					'__rotatorText',
				),
			),
			'heading_html_tag'          => array(
				'label'            => esc_html__( 'Heading HTLML Tag', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'layout',
				'options'          => array(
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
				'default'          => 'h2',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'heading_settings',
				'computed_affects' => array(
					'__rotatorText',
				),
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
			'rotator_background_color'  => array(
				'label'          => esc_html__( 'Background Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'custom_color'   => true,
				'description'    => esc_html__( 'Here you can define a custom background color for the rotator text.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'rotator_styles',
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
			'rotator_margin'            => array(
				'label'           => esc_html__( 'Margin', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'mobile_options'  => true,
				'hover'           => 'tabs',
				'option_category' => 'layout',
				'description'     => esc_html__( 'Adjust margin to specific values, or leave blank to use the default margin.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'rotator_styles',
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
			'rotator_padding'           => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_padding',
				'mobile_options'  => true,
				'hover'           => 'tabs',
				'option_category' => 'layout',
				'description'     => esc_html__( 'Adjust padding to specific values, or leave blank to use the default padding.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'rotator_styles',
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
					'block'        => __( 'Block', 'dsm-supreme-modules-pro-for-divi' ),
					'inline'       => __( 'Inline', 'dsm-supreme-modules-pro-for-divi' ),
					'inline-flex'  => __( 'Inline Flex', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'         => 'inline-block',
				'mobile_options'  => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'before_styles',
			),
			'rotator_display_type'      => array(
				'label'           => esc_html__( 'Display', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'inline-block' => __( 'Inline Block', 'dsm-supreme-modules-pro-for-divi' ),
					'block'        => __( 'Block', 'dsm-supreme-modules-pro-for-divi' ),
					'inline'       => __( 'Inline', 'dsm-supreme-modules-pro-for-divi' ),
					'inline-flex'  => __( 'Inline Flex', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'         => 'inline-block',
				'mobile_options'  => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'rotator_styles',
			),
			'after_display_type'        => array(
				'label'           => esc_html__( 'Display', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'inline-block' => __( 'Inline Block', 'dsm-supreme-modules-pro-for-divi' ),
					'block'        => __( 'Block', 'dsm-supreme-modules-pro-for-divi' ),
					'inline'       => __( 'Inline', 'dsm-supreme-modules-pro-for-divi' ),
					'inline-flex'  => __( 'Inline Flex', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'         => 'inline-block',
				'mobile_options'  => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'after_styles',
			),
		);
	}

	public function get_transition_fields_css_props() {
		$fields = parent::get_transition_fields_css_props();

		$fields['before_background_color']  = array(
			'background-color' => '%%order_class%% .dsm-rotate-text-before',
		);
		$fields['rotator_background_color'] = array(
			'background-color' => '%%order_class%% .dsm-rotate-text',
		);
		$fields['after_background_color']   = array(
			'background-color' => '%%order_class%% .dsm-rotate-text-after',
		);
		$fields['before_padding']           = array(
			'padding' => '%%order_class%% .dsm-rotate-text-before',
		);
		$fields['rotator_padding']          = array(
			'padding' => '%%order_class%% .dsm-rotate-text',
		);
		$fields['after_padding']            = array(
			'padding' => '%%order_class%% .dsm-rotate-text-after',
		);
		$fields['before_margin']            = array(
			'margin' => '%%order_class%% .dsm-rotate-text-before',
		);
		$fields['rotator_margin']           = array(
			'margin' => '%%order_class%% .dsm-rotate-text',
		);
		$fields['after_margin']             = array(
			'margin' => '%%order_class%% .dsm-rotate-text-after',
		);

		return $fields;
	}

	public function render( $attrs, $content = null, $render_slug ) {
		$multi_view                = et_pb_multi_view_options( $this );
		$text_rotator              = $this->props['text_rotator'];
		$text_rotator_animation_in = $this->props['text_rotator_animation_in'];
		$text_rotator_speed        = $this->props['text_rotator_speed'];
		$text_rotator_pause_hover  = $this->props['text_rotator_pause_hover'];
		$text_rotator_click_change = $this->props['text_rotator_click_change'];

		$before_text                          = $this->props['before_text'];
		$after_text                           = $this->props['after_text'];
		$heading_html_tag                     = $this->props['heading_html_tag'];
		$before_background_color_hover        = $this->get_hover_value( 'before_background_color' );
		$before_background_color              = $this->props['before_background_color'];
		$before_background_color_tablet       = $this->props['before_background_color_tablet'];
		$before_background_color_phone        = $this->props['before_background_color_phone'];
		$before_background_color_last_edited  = $this->props['before_background_color_last_edited'];
		$rotator_background_color_hover       = $this->get_hover_value( 'rotator_background_color' );
		$rotator_background_color             = $this->props['rotator_background_color'];
		$rotator_background_color_tablet      = $this->props['rotator_background_color_tablet'];
		$rotator_background_color_phone       = $this->props['rotator_background_color_phone'];
		$rotator_background_color_last_edited = $this->props['rotator_background_color_last_edited'];
		$after_background_color_hover         = $this->get_hover_value( 'after_background_color' );
		$after_background_color               = $this->props['after_background_color'];
		$after_background_color_tablet        = $this->props['after_background_color_tablet'];
		$after_background_color_phone         = $this->props['after_background_color_phone'];
		$after_background_color_last_edited   = $this->props['after_background_color_last_edited'];
		$before_padding_hover                 = $this->get_hover_value( 'before_padding' );
		$before_padding                       = $this->props['before_padding'];
		$before_padding_values                = et_pb_responsive_options()->get_property_values( $this->props, 'before_padding' );
		$before_padding_size_tablet           = isset( $before_padding_values['tablet'] ) ? $before_padding_values['tablet'] : '';
		$before_padding_size_phone            = isset( $before_padding_values['phone'] ) ? $before_padding_values['phone'] : '';
		$rotator_padding_hover                = $this->get_hover_value( 'rotator_padding' );
		$rotator_padding                      = $this->props['rotator_padding'];
		$rotator_padding_values               = et_pb_responsive_options()->get_property_values( $this->props, 'rotator_padding' );
		$rotator_padding_size_tablet          = isset( $rotator_padding_values['tablet'] ) ? $rotator_padding_values['tablet'] : '';
		$rotator_padding_size_phone           = isset( $rotator_padding_values['phone'] ) ? $rotator_padding_values['phone'] : '';
		$after_padding_hover                  = $this->get_hover_value( 'after_padding' );
		$after_padding                        = $this->props['after_padding'];
		$after_padding_values                 = et_pb_responsive_options()->get_property_values( $this->props, 'after_padding' );
		$after_padding_size_tablet            = isset( $after_padding_values['tablet'] ) ? $after_padding_values['tablet'] : '';
		$after_padding_size_phone             = isset( $after_padding_values['phone'] ) ? $after_padding_values['phone'] : '';
		$before_margin_hover                  = $this->get_hover_value( 'before_margin' );
		$before_margin                        = $this->props['before_margin'];
		$before_margin_values                 = et_pb_responsive_options()->get_property_values( $this->props, 'before_margin' );
		$before_margin_size_tablet            = isset( $before_margin_values['tablet'] ) ? $before_margin_values['tablet'] : '';
		$before_margin_size_phone             = isset( $before_margin_values['phone'] ) ? $before_margin_values['phone'] : '';
		$rotator_margin_hover                 = $this->get_hover_value( 'rotator_margin' );
		$rotator_margin                       = $this->props['rotator_margin'];
		$rotator_margin_values                = et_pb_responsive_options()->get_property_values( $this->props, 'rotator_margin' );
		$rotator_margin_size_tablet           = isset( $rotator_margin_values['tablet'] ) ? $rotator_margin_values['tablet'] : '';
		$rotator_margin_size_phone            = isset( $rotator_margin_values['phone'] ) ? $rotator_margin_values['phone'] : '';
		$after_margin_hover                   = $this->get_hover_value( 'after_margin' );
		$after_margin                         = $this->props['after_margin'];
		$after_margin_values                  = et_pb_responsive_options()->get_property_values( $this->props, 'after_margin' );
		$after_margin_size_tablet             = isset( $after_margin_values['tablet'] ) ? $after_margin_values['tablet'] : '';
		$after_margin_size_phone              = isset( $after_margin_values['phone'] ) ? $after_margin_values['phone'] : '';
		$before_display_type                  = $this->props['before_display_type'];
		$before_display_type_values           = et_pb_responsive_options()->get_property_values( $this->props, 'before_display_type' );
		$before_display_type_tablet           = isset( $before_display_type_values['tablet'] ) ? $before_display_type_values['tablet'] : '';
		$before_display_type_phone            = isset( $before_display_type_values['phone'] ) ? $before_display_type_values['phone'] : '';
		$rotator_display_type                 = $this->props['rotator_display_type'];
		$rotator_display_type_values          = et_pb_responsive_options()->get_property_values( $this->props, 'rotator_display_type' );
		$rotator_display_type_tablet          = isset( $rotator_display_type_values['tablet'] ) ? $rotator_display_type_values['tablet'] : '';
		$rotator_display_type_phone           = isset( $rotator_display_type_values['phone'] ) ? $rotator_display_type_values['phone'] : '';
		$after_display_type                   = $this->props['after_display_type'];
		$after_display_type_values            = et_pb_responsive_options()->get_property_values( $this->props, 'after_display_type' );
		$after_display_type_tablet            = isset( $after_display_type_values['tablet'] ) ? $after_display_type_values['tablet'] : '';
		$after_display_type_phone             = isset( $after_display_type_values['phone'] ) ? $after_display_type_values['phone'] : '';
		$background_layout                    = $this->props['background_layout'];

		$before_text_selector  = "{$this->main_css_element} .dsm-rotate-text-before";
		$rotator_text_selector = "{$this->main_css_element} .dsm-rotate-text";
		$after_text_selector   = "{$this->main_css_element} .dsm-rotate-text-after";

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

		$rotator_text_style        = sprintf( 'background-color: %1$s;', esc_attr( $rotator_background_color ) );
		$rotator_text_tablet_style = '' !== $rotator_background_color_tablet ? sprintf( 'background-color: %1$s;', esc_attr( $rotator_background_color_tablet ) ) : '';
		$rotator_text_phone_style  = '' !== $rotator_background_color_phone ? sprintf( 'background-color: %1$s;', esc_attr( $rotator_background_color_phone ) ) : '';
		$rotator_text_style_hover  = '';

		if ( et_builder_is_hover_enabled( 'rotator_background_color', $this->props ) ) {
			$rotator_text_style_hover = sprintf( 'background-color: %1$s;', esc_attr( $rotator_background_color_hover ) );
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $this->add_hover_to_order_class( $rotator_text_selector ),
					'declaration' => $rotator_text_style_hover,
				)
			);
		}

		if ( '' !== $rotator_background_color ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $rotator_text_selector,
					'declaration' => $rotator_text_style,
				)
			);
		}

		if ( '' !== $rotator_background_color_tablet ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $rotator_text_selector,
					'declaration' => $rotator_text_tablet_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( '' !== $rotator_background_color_phone ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $rotator_text_selector,
					'declaration' => $rotator_text_phone_style,
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

		// before_display_type.
		$before_display_type_style        = sprintf( 'display: %1$s;', esc_attr( $before_display_type ) );
		$before_display_type_tablet_style = '' !== $before_display_type_tablet ? sprintf( 'display: %1$s;', esc_attr( $before_display_type_tablet ) ) : '';
		$before_display_type_phone_style  = '' !== $before_display_type_phone ? sprintf( 'display: %1$s;', esc_attr( $before_display_type_phone ) ) : '';

		if ( 'inline-block' !== $before_display_type ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $before_text_selector,
					'declaration' => $before_display_type_style,
				)
			);
		}

		if ( '' !== $before_display_type_tablet ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $before_text_selector,
					'declaration' => $before_display_type_tablet_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);

		}

		if ( '' !== $before_display_type_phone_style ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $before_text_selector,
					'declaration' => $before_display_type_phone_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		// rotator_display_type.
		$rotator_display_type_style        = sprintf( 'display: %1$s;', esc_attr( $rotator_display_type ) );
		$rotator_display_type_tablet_style = '' !== $rotator_display_type_tablet ? sprintf( 'display: %1$s;', esc_attr( $rotator_display_type_tablet ) ) : '';
		$rotator_display_type_phone_style  = '' !== $rotator_display_type_phone ? sprintf( 'display: %1$s;', esc_attr( $rotator_display_type_phone ) ) : '';

		if ( 'inline-block' !== $rotator_display_type ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $rotator_text_selector,
					'declaration' => $rotator_display_type_style,
				)
			);
		}

		if ( '' !== $rotator_display_type_tablet_style ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $rotator_text_selector,
					'declaration' => $rotator_display_type_tablet_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);

		}

		if ( '' !== $rotator_display_type_phone_style ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $rotator_text_selector,
					'declaration' => $rotator_display_type_phone_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		// after_display_type.
		$after_display_type_style        = sprintf( 'display: %1$s;', esc_attr( $after_display_type ) );
		$after_display_type_tablet_style = '' !== $after_display_type_tablet ? sprintf( 'display: %1$s;', esc_attr( $after_display_type_tablet ) ) : '';
		$after_display_type_phone_style  = '' !== $after_display_type_phone ? sprintf( 'display: %1$s;', esc_attr( $after_display_type_phone ) ) : '';

		if ( 'inline-block' !== $after_display_type ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $after_text_selector,
					'declaration' => $after_display_type_style,
				)
			);
		}

		if ( '' !== $after_display_type_tablet_style ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $after_text_selector,
					'declaration' => $after_display_type_tablet_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);

		}

		if ( '' !== $after_display_type_phone_style ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $after_text_selector,
					'declaration' => $after_display_type_phone_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		$text_rotator_search  = array( '&#91;', '&#93;' );
		$text_rotator_replace = array( '[', ']' );
		$text_rotator         = str_replace( $text_rotator_search, $text_rotator_replace, $text_rotator );
		$text_rotator         = json_decode( $text_rotator );

		$rotator_output = '';
		foreach ( $text_rotator as $index => $option ) {
			$option_value = wp_strip_all_tags( $option->value );
			$option_label = wp_strip_all_tags( $option->value );

			$rotator_output .= sprintf(
				'%1$s,',
				esc_attr( $option_value )
			);
		}

		$data_attr[] = array(
			'animation' => $text_rotator_animation_in,
			'pause'     => $text_rotator_pause_hover !== 'off' ? true : false,
			'click'     => $text_rotator_click_change !== 'off' ? true : false,
			'speed'     => $text_rotator_speed,
		);

		$before_text = $multi_view->render_element(
			array(
				'tag'     => 'span',
				'content' => '{{before_text}}',
				'attrs'   => array(
					'class' => 'dsm-rotate-text-before',
				),
			)
		);

		$after_text = $multi_view->render_element(
			array(
				'tag'     => 'span',
				'content' => '{{after_text}}',
				'attrs'   => array(
					'class' => 'dsm-rotate-text-after',
				),
			)
		);

		$this->apply_custom_margin_padding(
			$render_slug,
			'before_margin',
			'margin',
			$before_text_selector
		);

		$this->apply_custom_margin_padding(
			$render_slug,
			'rotator_margin',
			'margin',
			$rotator_text_selector
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
			'rotator_padding',
			'padding',
			$rotator_text_selector
		);

		$this->apply_custom_margin_padding(
			$render_slug,
			'after_padding',
			'padding',
			$after_text_selector
		);

		$this->add_classname(
			array(
				$this->get_text_orientation_classname(),
				"et_pb_bg_layout_{$background_layout}",
			)
		);

		wp_enqueue_script( 'dsm-text-rotator' );
		// Render module content.
		$output = sprintf(
			'<%1$s class="dsm-rotate-text-main et_pb_module_header">%4$s<span class="dsm-rotate-text" data-dsm-text-rotator=%3$s>%2$s</span>%5$s</%1$s>',
			esc_attr( $heading_html_tag ),
			substr( $rotator_output, 0, -1 ),
			wp_json_encode( $data_attr ),
			et_core_esc_previously( $before_text ),
			et_core_esc_previously( $after_text )
		);

		return $output;
	}
	/** Apply Margin and Padding */
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

new DSM_TextRotator();
