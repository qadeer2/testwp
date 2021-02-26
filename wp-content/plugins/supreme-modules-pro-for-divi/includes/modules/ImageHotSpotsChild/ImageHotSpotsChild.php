<?php

class DSM_Image_Hotspots_Child extends ET_Builder_Module {

	public $slug                     = 'dsm_image_hotspots_child';
	public $vb_support               = 'on';
	public $type                     = 'child';
	public $child_title_var          = 'content';
	public $child_title_fallback_var = 'tooltip_title';

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name                        = esc_html__( 'Hotspot Item', 'dsm-supreme-modules-pro-for-divi' );
		$this->child_title_var             = 'admin_title';
		$this->child_title_fallback_var    = 'content';
		$this->advanced_setting_title_text = esc_html__( 'Hotspot Item', 'dsm-supreme-modules-pro-for-divi' );
		$this->settings_text               = esc_html__( 'Hotspot Settings', 'dsm-supreme-modules-pro-for-divi' );
		$this->main_css_element            = '%%order_class%%';

		$this->settings_modal_toggles = array(
			'general'    => array(
				'toggles' => array(
					'hotspot_content' => esc_html__( 'Hotspot', 'dsm-supreme-modules-pro-for-divi' ),
					'main_content'    => esc_html__( 'Tooltip', 'dsm-supreme-modules-pro-for-divi' ),
					'link'            => esc_html__( 'Link', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
			'advanced'   => array(
				'toggles' => array(
					'hotspot_fonts'          => esc_html__( 'Hotspot Text', 'dsm-supreme-modules-pro-for-divi' ),
					'hotspot_settings'       => esc_html__( 'Hotspot Settings', 'dsm-supreme-modules-pro-for-divi' ),
					'icon_settings'          => esc_html__( 'Hotspot Icon', 'dsm-supreme-modules-pro-for-divi' ),
					'hotspot_image_settings' => esc_html__( 'Hotspot Image', 'dsm-supreme-modules-pro-for-divi' ),
					'tooltip_settings'       => esc_html__( 'Tooltip Settings', 'dsm-supreme-modules-pro-for-divi' ),
					'header'                 => array(
						'title'             => esc_html__( 'Tooltip Heading Text', 'dsm-supreme-modules-pro-for-divi' ),
						'priority'          => 49,
						'tabbed_subtoggles' => true,
						'sub_toggles'       => array(
							'h1' => array(
								'name' => 'H1',
								'icon' => 'text-h1',
							),
							'h2' => array(
								'name' => 'H2',
								'icon' => 'text-h2',
							),
							'h3' => array(
								'name' => 'H3',
								'icon' => 'text-h3',
							),
							'h4' => array(
								'name' => 'H4',
								'icon' => 'text-h4',
							),
							'h5' => array(
								'name' => 'H5',
								'icon' => 'text-h5',
							),
							'h6' => array(
								'name' => 'H6',
								'icon' => 'text-h6',
							),
						),
					),
					'body'                   => array(
						'title'    => esc_html__( 'Tooltip Body', 'dsm-supreme-modules-pro-for-divi' ),
						'priority' => 49,
					),
					'text'                   => array(
						'title'    => esc_html__( 'Text', 'dsm-supreme-modules-pro-for-divi' ),
						'priority' => 49,
					),
					'width'                  => array(
						'title'    => esc_html__( 'Sizing', 'dsm-supreme-modules-pro-for-divi' ),
						'priority' => 65,
					),
				),
			),
			'custom_css' => array(
				'toggles' => array(
					'attributes' => array(
						'title'    => esc_html__( 'Attributes', 'dsm-supreme-modules-pro-for-divi' ),
						'priority' => 95,
					),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'            => array(
				'text'     => array(
					'label'             => esc_html__( 'Hotspot Text', 'dsm-supreme-modules-pro-for-divi' ),
					'css'               => array(
						'main' => '%%order_class%%.dsm_image_hotspots_child .dsm_image_hotspots_wrapper .dsm_image_hotspots_text',
					),
					'font_size'         => array(
						'default' => '14px',
					),
					'line_height'       => array(
						'default' => '1',
					),
					'letter_spacing'    => array(
						'default' => '0px',
					),
					'hide_header_level' => true,
					'hide_text_align'   => true,
					'hide_text_shadow'  => false,
					'show_if'           => array(
						'hotspot_type' => 'text',
					),
					'tab_slug'          => 'advanced',
					'toggle_slug'       => 'hotspot_fonts',
				),
				'header'   => array(
					'label'       => esc_html__( 'Heading', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => "{$this->main_css_element}.dsm_image_hotspot_tooltip_wrapper.tippy-tooltip .dsm_image_tooltip_content h1",
					),
					'font_size'   => array(
						'default' => absint( et_get_option( 'body_header_size', '30' ) ) . 'px',
					),
					'toggle_slug' => 'header',
					'sub_toggle'  => 'h1',
				),
				'header_2' => array(
					'label'       => esc_html__( 'Heading 2', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => "{$this->main_css_element}.dsm_image_hotspot_tooltip_wrapper.tippy-tooltip .dsm_image_tooltip_content h2",
					),
					'font_size'   => array(
						'default' => '26px',
					),
					'line_height' => array(
						'default' => '1em',
					),
					'toggle_slug' => 'header',
					'sub_toggle'  => 'h2',
				),
				'header_3' => array(
					'label'       => esc_html__( 'Heading 3', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => "{$this->main_css_element}.dsm_image_hotspot_tooltip_wrapper.tippy-tooltip .dsm_image_tooltip_content h3",
					),
					'font_size'   => array(
						'default' => '22px',
					),
					'line_height' => array(
						'default' => '1em',
					),
					'toggle_slug' => 'header',
					'sub_toggle'  => 'h3',
				),
				'header_4' => array(
					'label'       => esc_html__( 'Heading 4', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => "{$this->main_css_element}.dsm_image_hotspot_tooltip_wrapper.tippy-tooltip .dsm_image_tooltip_content h4",
					),
					'font_size'   => array(
						'default' => '18px',
					),
					'line_height' => array(
						'default' => '1em',
					),
					'toggle_slug' => 'header',
					'sub_toggle'  => 'h4',
				),
				'header_5' => array(
					'label'       => esc_html__( 'Heading 5', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => "{$this->main_css_element}.dsm_image_hotspot_tooltip_wrapper.tippy-tooltip .dsm_image_tooltip_content h5",
					),
					'font_size'   => array(
						'default' => '16px',
					),
					'line_height' => array(
						'default' => '1em',
					),
					'toggle_slug' => 'header',
					'sub_toggle'  => 'h5',
				),
				'header_6' => array(
					'label'       => esc_html__( 'Heading 6', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => "{$this->main_css_element}.dsm_image_hotspot_tooltip_wrapper.tippy-tooltip .dsm_image_tooltip_content h6",
					),
					'font_size'   => array(
						'default' => '14px',
					),
					'line_height' => array(
						'default' => '1em',
					),
					'toggle_slug' => 'header',
					'sub_toggle'  => 'h6',
				),
				'body'     => array(
					'label'          => esc_html__( 'Tooltip Body', 'dsm-supreme-modules-pro-for-divi' ),
					'css'            => array(
						'main'        => "{$this->main_css_element}.dsm_image_hotspot_tooltip_wrapper.tippy-tooltip .dsm_image_tooltip_content",
						'line_height' => "{$this->main_css_element}.dsm_image_hotspot_tooltip_wrapper.tippy-tooltip p",
						'text_align'  => "{$this->main_css_element}.dsm_image_hotspot_tooltip_wrapper.tippy-tooltip",
						'text_shadow' => "{$this->main_css_element}.dsm_image_hotspot_tooltip_wrapper.tippy-tooltip",
					),
					'block_elements' => array(
						'tabbed_subtoggles' => true,
						'bb_icons_support'  => true,
						'css'               => array(
							'main' => "{$this->main_css_element}.dsm_image_hotspot_tooltip_wrapper.tippy-tooltip",
						),
					),
				),
			),
			'background'       => array(
				'css'     => array(
					'main' => '%%order_class%%.dsm_image_hotspots_child .dsm_image_hotspots_wrapper',
				),
				'options' => array(
					'background_color' => array(
						'default'          => et_builder_accent_color(),
						'default_on_child' => true,
					),
				),
			),
			'text'             => array(
				'use_background_layout' => true,
				'use_text_orientation'  => false,
				'css'                   => array(
					'text_shadow' => "{$this->main_css_element} .dsm_image_hotspot_tooltip_wrapper",
				),
				'options'               => array(
					'background_layout' => array(
						'default'          => 'dark',
						'default_on_front' => 'dark',
						'hover'            => 'tabs',
					),
				),
			),
			'text_shadow'      => array(
				// Don't add text-shadow fields since they already are via font-options.
				'default' => false,
			),
			'borders'          => array(
				'default' => false,
				'hotspot' => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%%.dsm_image_hotspots_child .dsm_image_hotspots_wrapper',
							'border_styles' => '%%order_class%%.dsm_image_hotspots_child .dsm_image_hotspots_wrapper',
						),
					),
					'defaults'     => array(
						'border_radii' => 'on|50px|50px|50px|50px',
					),
					'label_prefix' => esc_html__( 'Hotspot', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'hotspot_settings',
				),
				'image'   => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%%.dsm_image_hotspots_child .dsm_image_hotspot_img',
							'border_styles' => '%%order_class%%.dsm_image_hotspots_child .dsm_image_hotspot_img',
						),
					),
					'label_prefix' => esc_html__( 'Hotspot Image', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'hotspot_image_settings',
				),
				'pulse'   => array(
					'css'             => array(
						'main' => array(
							'border_radii'  => '%%order_class%%.dsm_image_hotspots_child .dsm_image_hotspot_pulse:before',
							'border_styles' => '%%order_class%%.dsm_image_hotspots_child .dsm_image_hotspot_pulse:before',
						),
					),
					'defaults'        => array(
						'border_radii' => 'on|50px|50px|50px|50px',
					),
					'label_prefix'    => esc_html__( 'Pulse Animation', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'animation',
					'depends_on'      => array( 'pulse_animation' ),
					'depends_show_if' => 'on',
				),
			),
			'box_shadow'       => array(
				'default' => false,
				'image'   => array(
					'label'             => esc_html__( 'Hotspot Image Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'option_category'   => 'layout',
					'tab_slug'          => 'advanced',
					'toggle_slug'       => 'hotspot_image_settings',
					'css'               => array(
						'main' => '%%order_class%%.dsm_image_hotspots_child .dsm_image_hotspot_img',
					),
					'default_on_fronts' => array(
						'color'    => '',
						'position' => '',
					),

				),
			),
			'margin_padding'   => array(
				'css' => array(
					'main'      => '%%order_class%%',
					'important' => 'all',
				),
			),
			'position_fields'  => false,
			'max_width'        => false,
			'height'           => false,
			'module_alignment' => false,
			'scroll_effects'   => false,
		);
	}

	public function get_fields() {
		$et_accent_color = et_builder_accent_color();
		return array(
			'admin_title'              => array(
				'label'       => esc_html__( 'Admin Label', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'text',
				'description' => esc_html__( 'This will change the label of the icon list item in the builder for easy identification.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug' => 'admin_label',
			),
			'hotspot_type'             => array(
				'label'            => esc_html__( 'Type', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'layout',
				'options'          => array(
					'icon'  => esc_html__( 'Icon', 'dsm-supreme-modules-pro-for-divi' ),
					'image' => esc_html__( 'Image', 'dsm-supreme-modules-pro-for-divi' ),
					'text'  => esc_html__( 'Text', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'hotspot_content',
				'description'      => esc_html__( 'Here you can choose whether to use an Icon or Text.', 'dsm-supreme-modules-pro-for-divi' ),
				'default_on_front' => 'icon',
				'default'          => 'icon',
				'mobile_options'   => true,
				'affects'          => array(
					'text',
					'hotspot_img',
				),
			),
			'font_icon'                => array(
				'label'            => esc_html__( 'Icon', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select_icon',
				'option_category'  => 'basic_option',
				'class'            => array( 'et-pb-font-icon' ),
				'toggle_slug'      => 'hotspot_content',
				'description'      => esc_html__( 'Choose an icon to display as your hotspot.', 'dsm-supreme-modules-pro-for-divi' ),
				'show_if'          => array(
					'hotspot_type' => 'icon',
				),
				'default_on_front' => 'L',
				'default'          => 'L',
				// 'mobile_options'      => true,
				// 'hover'               => 'tabs',
			),
			'icon_color'               => array(
				'label'          => esc_html__( 'Icon Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( 'Here you can define a custom color for your icon.', 'dsm-supreme-modules-pro-for-divi' ),
				'show_if'        => array(
					'hotspot_type' => 'icon',
				),
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'icon_settings',
				'default'        => '#ffffff',
				'hover'          => 'tabs',
				'mobile_options' => true,
			),
			'icon_font_size'           => array(
				'label'            => esc_html__( 'Icon Font Size', 'dsm-supreme-modules-pro-for-divi' ),
				'description'      => esc_html__( 'Control the size of the icon by increasing or decreasing the font size.', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'font_option',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'icon_settings',
				'default'          => '14px',
				'default_unit'     => 'px',
				'default_on_front' => '',
				'allowed_units'    => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '120',
					'step' => '1',
				),
				'mobile_options'   => true,
				'responsive'       => true,
				'hover'            => 'tabs',
				'show_if'          => array(
					'hotspot_type' => 'icon',
				),
			),
			'hotspot_img'              => array(
				'label'              => esc_html__( 'Hotspot Image', 'dsm-supreme-modules-pro-for-divi' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'upload_button_text' => esc_attr__( 'Upload an image', 'dsm-supreme-modules-pro-for-divi' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'dsm-supreme-modules-pro-for-divi' ),
				'update_text'        => esc_attr__( 'Set As Image', 'dsm-supreme-modules-pro-for-divi' ),
				'hide_metadata'      => true,
				'show_if'            => array(
					'hotspot_type' => 'image',
				),
				'description'        => esc_html__( 'Upload your desired image, or type in the URL to the image you would like to display.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'        => 'hotspot_content',
				'dynamic_content'    => 'image',
				// 'mobile_options'     => true,
				// 'hover'              => 'tabs',
			),
			'hotspot_alt'              => array(
				'label'           => esc_html__( 'Image Alternative Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'show_if'         => array(
					'hotspot_type' => 'image',
				),
				'description'     => esc_html__( 'This defines the HTML ALT text. A short description of your image can be placed here.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'hotspot_content',
				'dynamic_content' => 'text',
			),
			'hotspot_title_text'       => array(
				'label'           => esc_html__( 'Image Title Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'show_if'         => array(
					'hotspot_type' => 'image',
				),
				'description'     => esc_html__( 'This defines the HTML Title text.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'hotspot_content',
				'dynamic_content' => 'text',
			),
			'hotspot_image_max_width'  => array(
				'label'            => esc_html__( 'Hotspot Image Width', 'dsm-supreme-modules-pro-for-divi' ),
				'description'      => esc_html__( 'Adjust the width of the hotspot image.', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'layout',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'hotspot_image_settings',
				'mobile_options'   => true,
				'validate_unit'    => true,
				'depends_show_if'  => 'off',
				'allowed_units'    => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
				'default'          => '100%',
				'default_unit'     => '%',
				'default_on_front' => '',
				'allow_empty'      => true,
				'range_settings'   => array(
					'min'  => '0',
					'max'  => '100%',
					'step' => '1',
				),
				'show_if'          => array(
					'hotspot_type' => 'image',
				),
				'responsive'       => true,
			),
			'hotspot_text'             => array(
				'label'            => esc_html__( 'Hotspot Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'option_category'  => 'basic_option',
				'default_on_front' => 'Text',
				'toggle_slug'      => 'hotspot_content',
				'show_if'          => array(
					'hotspot_type' => 'text',
				),
				'dynamic_content'  => 'text',
			),
			'content'                  => array(
				'label'            => esc_html__( 'Content', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'tiny_mce',
				'option_category'  => 'basic_option',
				'description'      => esc_html__( 'Input the main text content for your tooltip here.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'      => 'main_content',
				'default_on_front' => 'Your Tooltip Goes Here',
				'dynamic_content'  => 'text',
			),
			'left_position'            => array(
				'label'            => esc_html__( 'Left Position', 'dsm-supreme-modules-pro-for-divi' ),
				'description'      => esc_html__( 'Adjust the Left position.', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'layout',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'hotspot_settings',
				'mobile_options'   => true,
				'validate_unit'    => true,
				'allowed_units'    => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
				'default'          => '40%',
				'default_unit'     => '%',
				'default_on_front' => '40%',
				'allow_empty'      => true,
				'range_settings'   => array(
					'min'  => '0',
					'max'  => '100',
					'step' => '1',
				),
				'responsive'       => true,
			),
			'top_position'             => array(
				'label'            => esc_html__( 'Top Position', 'dsm-supreme-modules-pro-for-divi' ),
				'description'      => esc_html__( 'Adjust the Top position.', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'layout',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'hotspot_settings',
				'mobile_options'   => true,
				'validate_unit'    => true,
				'allowed_units'    => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
				'default'          => '40%',
				'default_unit'     => '%',
				'default_on_front' => '40%',
				'allow_empty'      => true,
				'range_settings'   => array(
					'min'  => '0',
					'max'  => '100',
					'step' => '1',
				),
				'responsive'       => true,
			),
			'hotspot_padding'          => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'description'     => esc_html__( 'Here you can define a custom padding size for the Hotspot.', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_padding',
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'hotspot_settings',
				'default_unit'    => 'px',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '50',
					'step' => '1',
				),
				'mobile_options'  => true,
				'responsive'      => true,
			),
			'tooltip_background_color' => array(
				'default'        => 'rgba(34,34,34,0.9)',
				'label'          => esc_html__( 'Background Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( 'Here you can define a custom background color for your tooltip.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'tooltip_settings',
				'mobile_options' => true,
			),
			'tooltip_padding'          => array(
				'label'           => esc_html__( 'Tooltip Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'description'     => esc_html__( 'Here you can define a custom padding size for the tooltip.', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_padding',
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'tooltip_settings',
				'default_unit'    => 'px',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '50',
					'step' => '1',
				),
				'mobile_options'  => true,
				'responsive'      => true,
			),
			'tooltip_placement'        => array(
				'label'            => esc_html__( 'Placement', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'layout',
				'options'          => array(
					'top'    => esc_html__( 'Top', 'dsm-supreme-modules-pro-for-divi' ),
					'right'  => esc_html__( 'Right', 'dsm-supreme-modules-pro-for-divi' ),
					'bottom' => esc_html__( 'Bottom', 'dsm-supreme-modules-pro-for-divi' ),
					'left'   => esc_html__( 'Left', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'tooltip_settings',
				'description'      => esc_html__( 'Here you can choose the placement of the tooltip.', 'dsm-supreme-modules-pro-for-divi' ),
				'default_on_front' => 'top',
				'default'          => 'top',
				'mobile_options'   => false,
			),
			'tooltip_max_width'        => array(
				'label'            => esc_html__( 'Tooltip Max Width', 'dsm-supreme-modules-pro-for-divi' ),
				'description'      => esc_html__( 'Adjust the width of the tooltip.', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'layout',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'tooltip_settings',
				'mobile_options'   => true,
				'validate_unit'    => true,
				'default_on_front' => '180px',
				'default'          => '180px',
				'default_unit'     => 'px',
				'allowed_units'    => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
				'allow_empty'      => true,
				'range_settings'   => array(
					'min'  => '0',
					'max'  => '320',
					'step' => '1',
				),
				'responsive'       => true,
			),
			'pulse_animation'          => array(
				'label'            => esc_html__( 'Use Pulse Animation', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'basic_option',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'animation',
				'description'      => esc_html__( 'Here you can choose whether hotspot should have pulse animation.', 'dsm-supreme-modules-pro-for-divi' ),
				'default_on_front' => 'off',
				'affects'          => array(
					'border_radii_pulse',
					'border_styles_pulse',
					'pulse_background_color',
				),
			),
			'pulse_background_color'   => array(
				'default'         => $et_accent_color,
				'label'           => esc_html__( 'Background Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'color-alpha',
				'description'     => esc_html__( 'Here you can define a custom background color for your pulse animtion.', 'dsm-supreme-modules-pro-for-divi' ),
				'depends_show_if' => 'on',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'animation',
				'hover'           => 'tabs',
				'mobile_options'  => true,
				'depends_show_if' => 'on',
			),
		);
	}

	function get_max_width_additional_css() {
		$additional_css = 'center' === $this->get_text_orientation() ? '; margin: 0 auto;' : '';

		return $additional_css;
	}

	public function get_transition_fields_css_props() {
		$icon_selector  = '.dsm_image_hotspots %%order_class%%.dsm_image_hotspots_child .dsm_image_hotspots_icon';
		$pulse_selector = '.dsm_image_hotspots %%order_class%%.dsm_image_hotspots_child .dsm_image_hotspot_pulse:before';

		$fields = parent::get_transition_fields_css_props();

		$fields['icon_color'] = array(
			'color' => $icon_selector,
		);

		$fields['icon_font_size'] = array(
			'font-size' => $icon_selector,
		);

		$fields['pulse_background_color'] = array(
			'background-color' => $pulse_selector,
		);

		return $fields;

	}

	public function render( $attrs, $content = null, $render_slug ) {
		$multi_view        = et_pb_multi_view_options( $this );
		$hotspot_type      = $this->props['hotspot_type'];
		$hotspot_text      = $this->props['hotspot_text'];
		$font_icon         = $this->props['font_icon'];
		$icon_color        = $this->props['icon_color'];
		$icon_color_hover  = $this->get_hover_value( 'icon_color' );
		$icon_color_values = et_pb_responsive_options()->get_property_values( $this->props, 'icon_color' );
		$icon_color_tablet = isset( $icon_color_values['tablet'] ) ? $icon_color_values['tablet'] : '';
		$icon_color_phone  = isset( $icon_color_values['phone'] ) ? $icon_color_values['phone'] : '';

		$icon_font_size             = $this->props['icon_font_size'];
		$icon_font_size_hover       = $this->get_hover_value( 'icon_font_size' );
		$icon_font_size_tablet      = $this->props['icon_font_size_tablet'];
		$icon_font_size_phone       = $this->props['icon_font_size_phone'];
		$icon_font_size_last_edited = $this->props['icon_font_size_last_edited'];

		$hotspot_img        = $this->props['hotspot_img'];
		$hotspot_alt        = $this->props['hotspot_alt'];
		$hotspot_title_text = $this->props['hotspot_title_text'];

		$hotspot_image_max_width             = $this->props['hotspot_image_max_width'];
		$hotspot_image_max_width_tablet      = $this->props['hotspot_image_max_width_tablet'];
		$hotspot_image_max_width_phone       = $this->props['hotspot_image_max_width_phone'];
		$hotspot_image_max_width_last_edited = $this->props['hotspot_image_max_width_last_edited'];

		$left_position             = $this->props['left_position'];
		$left_position_tablet      = $this->props['left_position_tablet'];
		$left_position_phone       = $this->props['left_position_phone'];
		$left_position_last_edited = $this->props['left_position_last_edited'];

		$top_position             = $this->props['top_position'];
		$top_position_tablet      = $this->props['top_position_tablet'];
		$top_position_phone       = $this->props['top_position_phone'];
		$top_position_last_edited = $this->props['top_position_last_edited'];

		$hotspot_padding               = $this->props['hotspot_padding'];
		$hotspot_padding_hover         = $this->get_hover_value( 'hotspot_padding' );
		$hotspot_padding_values        = et_pb_responsive_options()->get_property_values( $this->props, 'hotspot_padding' );
		$hotspot_padding_tablet        = isset( $hotspot_padding_values['tablet'] ) ? $hotspot_padding_values['tablet'] : '';
		$hotspot_padding_phone         = isset( $hotspot_padding_values['phone'] ) ? $hotspot_padding_values['phone'] : '';
		$hotspot_padding_last_edited   = $this->props['hotspot_padding_last_edited'];
		$pulse_animation               = $this->props['pulse_animation'];
		$pulse_background_color        = $this->props['pulse_background_color'];
		$pulse_background_color_hover  = $this->get_hover_value( 'pulse_background_color' );
		$pulse_background_color_values = et_pb_responsive_options()->get_property_values( $this->props, 'pulse_background_color' );
		$pulse_background_color_tablet = isset( $pulse_background_color_values['tablet'] ) ? $pulse_background_color_values['tablet'] : '';
		$pulse_background_color_phone  = isset( $pulse_background_color_values['phone'] ) ? $pulse_background_color_values['phone'] : '';

		// $header_level                    = $this->props['header_level'];
		// $tooltip_title = $this->props['tooltip_title'];
		$tooltip_placement               = $this->props['tooltip_placement'];
		$tooltip_background_color        = $this->props['tooltip_background_color'];
		$tooltip_background_color_hover  = $this->get_hover_value( 'tooltip_background_color' );
		$tooltip_background_color_values = et_pb_responsive_options()->get_property_values( $this->props, 'tooltip_background_color' );
		$tooltip_background_color_tablet = isset( $tooltip_background_color_values['tablet'] ) ? $tooltip_background_color_values['tablet'] : '';
		$tooltip_background_color_phone  = isset( $tooltip_background_color_values['phone'] ) ? $tooltip_background_color_values['phone'] : '';

		$tooltip_padding             = $this->props['tooltip_padding'];
		$tooltip_padding_hover       = $this->get_hover_value( 'tooltip_padding' );
		$tooltip_padding_values      = et_pb_responsive_options()->get_property_values( $this->props, 'tooltip_padding' );
		$tooltip_padding_tablet      = isset( $tooltip_padding_values['tablet'] ) ? $tooltip_padding_values['tablet'] : '';
		$tooltip_padding_phone       = isset( $tooltip_padding_values['phone'] ) ? $tooltip_padding_values['phone'] : '';
		$tooltip_padding_last_edited = $this->props['tooltip_padding_last_edited'];

		$tooltip_max_width        = $this->props['tooltip_max_width'];
		$tooltip_max_width_hover  = $this->get_hover_value( 'tooltip_max_width' );
		$tooltip_max_width_values = et_pb_responsive_options()->get_property_values( $this->props, 'tooltip_max_width' );
		$tooltip_max_width_tablet = isset( $tooltip_max_width_values['tablet'] ) ? $tooltip_max_width_values['tablet'] : '';
		$tooltip_max_width_phone  = isset( $tooltip_max_width_values['phone'] ) ? $tooltip_max_width_values['phone'] : '';

		$background_layout               = $this->props['background_layout'];
		$background_layout_hover         = et_pb_hover_options()->get_value( 'background_layout', $this->props, 'light' );
		$background_layout_hover_enabled = et_pb_hover_options()->is_enabled( 'background_layout', $this->props );
		$background_layout_values        = et_pb_responsive_options()->get_property_values( $this->props, 'background_layout' );
		$background_layout_tablet        = isset( $background_layout_values['tablet'] ) ? $background_layout_values['tablet'] : '';
		$background_layout_phone         = isset( $background_layout_values['phone'] ) ? $background_layout_values['phone'] : '';

		$tooltip_max_width_last_edited = $this->props['tooltip_max_width_last_edited'];

		$video_background          = $this->video_background();
		$parallax_image_background = $this->get_parallax_image_background();

		$hotspot_selector                  = '%%order_class%%.dsm_image_hotspots_child';
		$hotspot_wrapper_selector          = '%%order_class%%.dsm_image_hotspots_child .dsm_image_hotspots_wrapper';
		$icon_selector                     = '%%order_class%%.dsm_image_hotspots_child .dsm_image_hotspots_icon, .et-db #et-boc .et-l .dsm_image_hotspots %%order_class%%.dsm_image_hotspots_child .et-pb-icon.dsm_image_hotspots_icon';
		$pulse_selector                    = '%%order_class%%.dsm_image_hotspots_child .dsm_image_hotspot_pulse:before';
		$tooltip_background_color_selector = '.tippy-popper %%order_class%%.dsm_image_hotspot_tooltip_wrapper.tippy-tooltip';
		$tooltip_selector                  = '.tippy-popper %%order_class%%.dsm_image_hotspot_tooltip_wrapper.tippy-tooltip .tippy-content';
		$tooltip_padding_selector          = '.tippy-popper %%order_class%%.dsm_image_hotspot_tooltip_wrapper.tippy-tooltip .tippy-content';
		// $tooltip_padding_selector = '.dsm_image_hotspot_tooltip_wrapper.dsm_image_hotspot_tooltip_wrapper'.str_replace(array($render_slug,'et_pb_module', ' '),"", $this->module_classname( $render_slug )) . ' .tippy-content';

		$left_position_responsive_active = et_pb_get_responsive_status( $left_position_last_edited );

		$left_position_values = array(
			'desktop' => $left_position,
			'tablet'  => $left_position_responsive_active ? $left_position_tablet : '',
			'phone'   => $left_position_responsive_active ? $left_position_phone : '',
		);

		et_pb_responsive_options()->generate_responsive_css( $left_position_values, $hotspot_selector, 'left', $render_slug );

		$top_position_responsive_active = et_pb_get_responsive_status( $top_position_last_edited );

		$top_position_values = array(
			'desktop' => $top_position,
			'tablet'  => $top_position_responsive_active ? $top_position_tablet : '',
			'phone'   => $top_position_responsive_active ? $top_position_phone : '',
		);

		et_pb_responsive_options()->generate_responsive_css( $top_position_values, $hotspot_selector, 'top', $render_slug );

		if ( 'icon' === $hotspot_type ) {
			$font_size_responsive_active = et_pb_get_responsive_status( $icon_font_size_last_edited );

			$font_size_values = array(
				'desktop' => $icon_font_size,
				'tablet'  => $font_size_responsive_active ? $icon_font_size_tablet : '',
				'phone'   => $font_size_responsive_active ? $icon_font_size_phone : '',
			);

			et_pb_responsive_options()->generate_responsive_css( $font_size_values, $icon_selector, 'font-size', $render_slug );

			if ( et_builder_is_hover_enabled( 'icon_font_size', $this->props ) ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => $this->add_hover_to_order_class( $icon_selector ),
						'declaration' => sprintf(
							'font-size: %1$s;',
							esc_html( $icon_font_size_hover )
						),
					)
				);
			}

			$icon_style        = sprintf( 'color: %1$s;', esc_attr( $icon_color ) );
			$icon_tablet_style = '' !== $icon_color_tablet ? sprintf( 'color: %1$s;', esc_attr( $icon_color_tablet ) ) : '';
			$icon_phone_style  = '' !== $icon_color_phone ? sprintf( 'color: %1$s;', esc_attr( $icon_color_phone ) ) : '';
			$icon_style_hover  = '';

			if ( et_builder_is_hover_enabled( 'icon_color', $this->props ) ) {
				$icon_style_hover = sprintf( 'color: %1$s;', esc_attr( $icon_color_hover ) );
			}

			if ( '#ffffff' !== $icon_color ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => $icon_selector,
						'declaration' => $icon_style,
					)
				);
			}

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $icon_selector,
					'declaration' => $icon_tablet_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $icon_selector,
					'declaration' => $icon_phone_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			if ( '' !== $icon_style_hover ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => $this->add_hover_to_order_class( $icon_selector ),
						'declaration' => $icon_style_hover,
					)
				);
			}
		}

		if ( 'image' === $hotspot_type ) {
			$image_pathinfo = pathinfo( $hotspot_img );
			$is_image_svg   = isset( $image_pathinfo['extension'] ) ? 'svg' === $image_pathinfo['extension'] : false;

			if ( '' !== $hotspot_image_max_width_tablet || '' !== $hotspot_image_max_width_phone || '' !== $hotspot_image_max_width || $is_image_svg ) {
				$is_size_px = false;

				// If size is given in px, we want to override parent width.
				if (
					false !== strpos( $hotspot_image_max_width, 'px' ) ||
					false !== strpos( $hotspot_image_max_width_tablet, 'px' ) ||
					false !== strpos( $hotspot_image_max_width_phone, 'px' )
				) {
					$is_size_px = true;
				}
				// SVG image overwrite. SVG image needs its value to be explicit
				/*
				if ( '' === $image_max_width && $is_image_svg ) {
					$image_max_width = '100%';
				}*/

				// Image max width selector.
				$hotspot_image_max_width_selectors       = array();
				$hotspot_image_max_width_reset_selectors = array();
				$hotspot_image_max_width_reset_values    = array();

				$hotspot_image_max_width_selector = '.dsm_image_hotspots %%order_class%%.dsm_image_hotspots_child';

				// Add image max width desktop selector if user sets different image/icon placement setting.
				if ( ! empty( $hotspot_image_max_width_selectors ) ) {
					$hotspot_image_max_width_selectors['desktop'] = $hotspot_image_max_width_selector;
				}

				$hotspot_image_max_width_property = ( $is_image_svg || $is_size_px ) ? 'width' : 'max-width';

				$hotspot_image_max_width_responsive_active = et_pb_get_responsive_status( $hotspot_image_max_width_last_edited );

				$hotspot_image_max_width_values = array(
					'desktop' => $hotspot_image_max_width,
					'tablet'  => $hotspot_image_max_width_responsive_active ? $hotspot_image_max_width_tablet : '',
					'phone'   => $hotspot_image_max_width_responsive_active ? $hotspot_image_max_width_phone : '',
				);

				$hotspot_main_image_max_width_selector = $hotspot_image_max_width_selector;

				// Overwrite image max width if there are image max width selectors for different devices.
				if ( ! empty( $hotspot_image_max_width_selectors ) ) {
					$hotspot_main_image_max_width_selector = $hotspot_image_max_width_selectors;

					if ( ! empty( $hotspot_image_max_width_selectors['tablet'] ) && empty( $hotspot_image_max_width_values['tablet'] ) ) {
						$hotspot_image_max_width_values['tablet'] = $hotspot_image_max_width_responsive_active ? esc_attr( et_pb_responsive_options()->get_any_value( $this->props, 'hotspot_image_max_width_tablet', '100%', true ) ) : esc_attr( $hotspot_image_max_width );
					}

					if ( ! empty( $hotspot_image_max_width_selectors['phone'] ) && empty( $image_max_width_values['phone'] ) ) {
						$hotspot_image_max_width_values['phone'] = $hotspot_image_max_width_responsive_active ? esc_attr( et_pb_responsive_options()->get_any_value( $this->props, 'hotspot_image_max_width_phone', '100%', true ) ) : esc_attr( $hotspot_image_max_width );
					}
				}

				et_pb_responsive_options()->generate_responsive_css( $hotspot_image_max_width_values, $hotspot_main_image_max_width_selector, $hotspot_image_max_width_property, $render_slug );

				// Reset custom image max width styles.
				if ( ! empty( $hotspot_image_max_width_selectors ) && ! empty( $hotspot_image_max_width_reset_selectors ) ) {
					et_pb_responsive_options()->generate_responsive_css( $hotspot_image_max_width_reset_values, $hotspot_image_max_width_reset_selectors, $hotspot_image_max_width_property, $render_slug, '', 'input' );
				}
			}

			if ( 'none' !== $this->props['box_shadow_style_image'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => $hotspot_wrapper_selector,
						'declaration' => sprintf(
							'overflow: %1$s;',
							esc_attr( 'visible' )
						),
					)
				);
			}
		}

		$tooltip_max_width_style        = sprintf( 'max-width: %1$s;', esc_attr( $tooltip_max_width ) );
		$tooltip_max_width_tablet_style = '' !== $tooltip_max_width_tablet ? sprintf( 'max-width: %1$s;', esc_attr( $tooltip_max_width_tablet ) ) : '';
		$tooltip_max_width_phone_style  = '' !== $tooltip_max_width_phone ? sprintf( 'max-width: %1$s;', esc_attr( $tooltip_max_width_phone ) ) : '';

		if ( '180px' !== $tooltip_max_width ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $tooltip_selector,
					'declaration' => $tooltip_max_width_style,
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => $tooltip_selector,
				'declaration' => $tooltip_max_width_tablet_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => $tooltip_selector,
				'declaration' => $tooltip_max_width_phone_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
			)
		);

		if ( 'rgba(34,34,34,0.9)' !== $tooltip_background_color ) {
			$tooltip_background_color_style        = sprintf( 'background-color: %1$s;', esc_attr( $tooltip_background_color ) );
			$tooltip_background_color_tablet_style = '' !== $tooltip_background_color_tablet ? sprintf( 'background-color: %1$s;', esc_attr( $tooltip_background_color_tablet ) ) : '';
			$tooltip_background_color_phone_style  = '' !== $tooltip_background_color_phone ? sprintf( 'background-color: %1$s;', esc_attr( $tooltip_background_color_phone ) ) : '';

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $tooltip_background_color_selector,
					'declaration' => $tooltip_background_color_style,
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $tooltip_background_color_selector,
					'declaration' => $tooltip_background_color_tablet_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $tooltip_background_color_selector,
					'declaration' => $tooltip_background_color_phone_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.tippy-popper %%order_class%%.dsm_image_hotspot_tooltip_wrapper.tippy-tooltip[data-placement^=top]>.tippy-arrow',
					'declaration' => sprintf(
						'border-top-color: %1$s;',
						esc_html( $tooltip_background_color )
					),
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.tippy-popper %%order_class%%.dsm_image_hotspot_tooltip_wrapper.tippy-tooltip[data-placement^=right]>.tippy-arrow',
					'declaration' => sprintf(
						'border-right-color: %1$s;',
						esc_html( $tooltip_background_color )
					),
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.tippy-popper %%order_class%%.dsm_image_hotspot_tooltip_wrapper.tippy-tooltip[data-placement^=bottom]>.tippy-arrow',
					'declaration' => sprintf(
						'border-bottom-color: %1$s;',
						esc_html( $tooltip_background_color )
					),
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.tippy-popper %%order_class%%.dsm_image_hotspot_tooltip_wrapper.tippy-tooltip[data-placement^=left]>.tippy-arrow',
					'declaration' => sprintf(
						'border-left-color: %1$s;',
						esc_html( $tooltip_background_color )
					),
				)
			);
		}

		if ( 'on' === $pulse_animation ) {
			$pulse_background_color_style        = sprintf( 'background-color: %1$s;', esc_attr( $pulse_background_color ) );
			$pulse_background_color_tablet_style = '' !== $pulse_background_color_tablet ? sprintf( 'background-color: %1$s;', esc_attr( $pulse_background_color_tablet ) ) : '';
			$pulse_background_color_phone_style  = '' !== $pulse_background_color_phone ? sprintf( 'background-color: %1$s;', esc_attr( $pulse_background_color_phone ) ) : '';
			$pulse_background_color_style_hover  = '';

			if ( et_builder_is_hover_enabled( 'pulse_background_color', $this->props ) ) {
				$pulse_background_color_style_hover = sprintf( 'background-color: %1$s;', esc_attr( $pulse_background_color_hover ) );
			}

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $pulse_selector,
					'declaration' => $pulse_background_color_style,
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $pulse_selector,
					'declaration' => $pulse_background_color_tablet_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $pulse_selector,
					'declaration' => $pulse_background_color_phone_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			if ( '' !== $pulse_background_color_style_hover ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => $this->add_hover_to_order_class( $pulse_selector ),
						'declaration' => $pulse_background_color_style_hover,
					)
				);
			}
		}

		$hotspot_image_html = $multi_view->render_element(
			array(
				'tag'      => 'img',
				'attrs'    => array(
					'src'   => '{{hotspot_img}}',
					'alt'   => '{{hotspot_alt}}',
					'title' => '{{hotspot_title_text}}',
					'class' => 'dsm_image_hotspot_img',
				),
				'required' => 'hotspot_img',
			)
		);

		$hotspot_text = $multi_view->render_element(
			array(
				'content' => '{{hotspot_text}}',
			)
		);

		if ( '' !== $hotspot_text ) {
			$hotspot_text = sprintf(
				'<span class="dsm_image_hotspots_text">%1$s</span>',
				et_core_esc_previously( $hotspot_text )
			);
		}

		$icon = $multi_view->render_element(
			array(
				'content' => '{{font_icon}}',
			)
		);

		if ( '' !== $icon ) {
			$icon = sprintf(
				'<span class="dsm_image_hotspots_icon et-pb-icon">%1$s</span>',
				et_core_esc_previously( $icon )
			);
		}

		$hotspot_type_output = '';

		$hotspot_type_output = sprintf(
			'%1$s%2$s%3$s',
			'icon' === $hotspot_type ? $icon : '',
			'image' === $hotspot_type ? $hotspot_image_html : '',
			'text' === $hotspot_type ? $hotspot_text : ''
		);

		$content = $multi_view->render_element(
			array(
				'tag'     => 'div',
				'content' => '{{content}}',
				'attrs'   => array(
					'class' => 'dsm_image_tooltip_content',
				),
			)
		);

		$tooltip_wrapper = sprintf(
			'<div class="dsm_image_hotspot_tooltip%2$s">%1$s</div>',
			$content,
			" et_pb_bg_layout_{$background_layout}"
		);

		$this->apply_custom_margin_padding(
			$render_slug,
			'hotspot_padding',
			'padding',
			$hotspot_wrapper_selector
		);

		$this->apply_custom_margin_padding(
			$render_slug,
			'tooltip_padding',
			'padding',
			$tooltip_padding_selector
		);

		// Module classnames
		$this->remove_classname( 'et_pb_module' );

		if ( ! empty( $background_layout_tablet ) ) {
			$this->add_classname( "et_pb_bg_layout_{$background_layout_tablet}_tablet" );
		}

		if ( ! empty( $background_layout_phone ) ) {
			$this->add_classname( "et_pb_bg_layout_{$background_layout_phone}_phone" );
		}

		$data_background_layout       = '';
		$data_background_layout_hover = '';

		if ( $background_layout_hover_enabled ) {
			$data_background_layout = sprintf(
				' data-background-layout="%1$s"',
				esc_attr( $background_layout )
			);

			$data_background_layout_hover = sprintf(
				' data-background-layout-hover="%1$s"',
				esc_attr( $background_layout_hover )
			);
		}

		// Render module content.
		$order_class = self::get_module_order_class( $render_slug );

		$output = sprintf(
			'%5$s<div class="dsm_image_hotspots_wrapper" data-tippy-arrow="true" data-tippy-placement="%3$s" data-slug="%4$s"%6$s%7$s>%1$s</div>%2$s',
			$hotspot_type_output,
			$tooltip_wrapper,
			esc_attr( $tooltip_placement ),
			esc_attr( $order_class ),
			( 'on' === $pulse_animation ? sprintf(
				'<div class="dsm_image_hotspot_pulse"></div>'
			) : '' ),
			et_core_esc_previously( $data_background_layout ),
			et_core_esc_previously( $data_background_layout_hover )
		);

		return $output;
	}
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
	/**
	 * Wrap module's rendered output with proper module wrapper. Ensuring module has consistent
	 * wrapper output which compatible with module attribute and background insertion.
	 *
	 * @since 3.1
	 *
	 * @param string $output      Module's rendered output
	 * @param string $render_slug Slug of module that is used for rendering output
	 *
	 * @return string
	 */
	protected function _render_module_wrapper( $output = '', $render_slug = '' ) {
		$wrapper_settings    = $this->get_wrapper_settings( $render_slug );
		$slug                = $render_slug;
		$outer_wrapper_attrs = $wrapper_settings['attrs'];
		$inner_wrapper_attrs = $wrapper_settings['inner_attrs'];

		/**
		 * Filters the HTML attributes for the module's outer wrapper. The dynamic portion of the
		 * filter name, '$slug', corresponds to the module's slug.
		 *
		 * @since 3.23 Add support for responsive video background.
		 * @since 3.1
		 *
		 * @param string[]           $outer_wrapper_attrs
		 * @param ET_Builder_Element $module_instance
		 */
		$outer_wrapper_attrs = apply_filters( "et_builder_module_{$slug}_outer_wrapper_attrs", $outer_wrapper_attrs, $this );

		/**
		 * Filters the HTML attributes for the module's inner wrapper. The dynamic portion of the
		 * filter name, '$slug', corresponds to the module's slug.
		 *
		 * @since 3.1
		 *
		 * @param string[]           $inner_wrapper_attrs
		 * @param ET_Builder_Element $module_instance
		 */
		$inner_wrapper_attrs = apply_filters( "et_builder_module_{$slug}_inner_wrapper_attrs", $inner_wrapper_attrs, $this );

		return sprintf(
			'<div%1$s>
				%2$s
				%3$s
				%6$s
				%7$s
				%5$s
			</div>',
			et_html_attrs( $outer_wrapper_attrs ),
			$wrapper_settings['parallax_background'],
			$wrapper_settings['video_background'],
			et_html_attrs( $inner_wrapper_attrs ),
			$output,
			et_()->array_get( $wrapper_settings, 'video_background_tablet', '' ),
			et_()->array_get( $wrapper_settings, 'video_background_phone', '' )
		);
	}
	/**
	 * Filter multi view value.
	 *
	 * @since 3.27.1
	 *
	 * @see ET_Builder_Module_Helper_MultiViewOptions::filter_value
	 *
	 * @param mixed                                     $raw_value Props raw value.
	 * @param array                                     $args {
	 *                                         Context data.
	 *
	 *     @type string $context      Context param: content, attrs, visibility, classes.
	 *     @type string $name         Module options props name.
	 *     @type string $mode         Current data mode: desktop, hover, tablet, phone.
	 *     @type string $attr_key     Attribute key for attrs context data. Example: src, class, etc.
	 *     @type string $attr_sub_key Attribute sub key that availabe when passing attrs value as array such as styes. Example: padding-top, margin-botton, etc.
	 * }
	 * @param ET_Builder_Module_Helper_MultiViewOptions $multi_view Multiview object instance.
	 *
	 * @return mixed
	 */
	public function multi_view_filter_value( $raw_value, $args, $multi_view ) {
		$name = isset( $args['name'] ) ? $args['name'] : '';
		$mode = isset( $args['mode'] ) ? $args['mode'] : '';

		if ( $raw_value && 'font_icon' === $name ) {
			$processed_value = html_entity_decode( et_pb_process_font_icon( $raw_value ) );
			if ( '%%1%%' === $raw_value ) {
				$processed_value = '"';
			}

			return $processed_value;
		}

		$fields_need_escape = array(
			'button_text',
		);

		if ( $raw_value && in_array( $name, $fields_need_escape, true ) ) {
			return $this->_esc_attr( $multi_view->get_name_by_mode( $name, $mode ) );
		}

		return $raw_value;
	}
}

new DSM_Image_Hotspots_Child();
