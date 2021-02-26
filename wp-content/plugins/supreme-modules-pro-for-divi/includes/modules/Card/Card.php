<?php

class DSM_Card extends ET_Builder_Module {

	public $slug       = 'dsm_card';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name             = esc_html__( 'Supreme Card', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path        = plugin_dir_path( __FILE__ ) . 'icon.svg';
		$this->main_css_element = '%%order_class%%.dsm_card';

		$this->settings_modal_toggles = array(
			'general'    => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Text', 'dsm-supreme-modules-pro-for-divi' ),
					'link'         => esc_html__( 'Link', 'dsm-supreme-modules-pro-for-divi' ),
					'image'        => esc_html__( 'Image & Badge', 'dsm-supreme-modules-pro-for-divi' ),
					'icon'         => esc_html__( 'Icon', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
			'advanced'   => array(
				'toggles' => array(
					'layout_alignment' => esc_html__( 'Layout & Alignment', 'dsm-supreme-modules-pro-for-divi' ),
					'image_settings'   => esc_html__( 'Image', 'dsm-supreme-modules-pro-for-divi' ),
					'icon_settings'    => esc_html__( 'Icon', 'dsm-supreme-modules-pro-for-divi' ),
					'badge_settings'   => esc_html__( 'Badge', 'dsm-supreme-modules-pro-for-divi' ),
					'text'             => array(
						'title'    => esc_html__( 'Text', 'dsm-supreme-modules-pro-for-divi' ),
						'priority' => 49,
					),
					'width'            => array(
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
			'fonts'      => array(
				'badge'   => array(
					'label'          => esc_html__( 'Badge', 'dsm-supreme-modules-pro-for-divi' ),
					'css'            => array(
						'main' => '%%order_class%% .dsm_card_badge_text',
					),
					'font_size'      => array(
						'default' => '12px',
					),
					'line_height'    => array(
						'default' => '1em',
					),
					'letter_spacing' => array(
						'default' => '0px',
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'badge_settings',
				),
				'header'  => array(
					'label'          => esc_html__( 'Title', 'dsm-supreme-modules-pro-for-divi' ),
					'css'            => array(
						'main' => "{$this->main_css_element} h4, {$this->main_css_element} h4 a, {$this->main_css_element} h1.et_pb_module_header, {$this->main_css_element} h1.et_pb_module_header a, {$this->main_css_element} h2.et_pb_module_header, {$this->main_css_element} h2.et_pb_module_header a, {$this->main_css_element} h3.et_pb_module_header, {$this->main_css_element} h3.et_pb_module_header a, {$this->main_css_element} h5.et_pb_module_header, {$this->main_css_element} h5.et_pb_module_header a, {$this->main_css_element} h6.et_pb_module_header, {$this->main_css_element} h6.et_pb_module_header a",
					),
					'font_size'      => array(
						'default' => '26px',
					),
					'line_height'    => array(
						'default' => '1em',
					),
					'letter_spacing' => array(
						'default' => '0px',
					),
					'header_level'   => array(
						'default' => 'h4',
					),
				),
				'body'    => array(
					'label'          => esc_html__( 'Body', 'et_builder' ),
					'css'            => array(
						'main'        => "{$this->main_css_element} .dsm_card_description",
						'line_height' => "{$this->main_css_element} .dsm_card_description p",
						'text_align'  => "{$this->main_css_element} .dsm_card_description",
						'text_shadow' => "{$this->main_css_element} .dsm_card_description",
					),
					'block_elements' => array(
						'tabbed_subtoggles' => true,
						'bb_icons_support'  => true,
						'css'               => array(
							'main' => "{$this->main_css_element} .dsm_card_description",
						),
					),
					'font_size'      => array(
						'default' => '14px',
					),
					'line_height'    => array(
						'default' => '1.7em',
					),
				),
				'subhead' => array(
					'label'          => esc_html__( 'Subhead', 'dsm-supreme-modules-pro-for-divi' ),
					'css'            => array(
						'main' => '%%order_class%% .dsm_card_subtitle',
					),
					'line_height'    => array(
						'default' => '1em',
					),
					'letter_spacing' => array(
						'default' => '0px',
					),
				),
			),
			'text'       => array(
				'use_background_layout' => true,
				'css'                   => array(
					'text_shadow' => '%%order_class%% .dsm_card_wrapper',
				),
				'options'               => array(
					'background_layout' => array(
						'default_on_front' => 'light',
					),
					'text_orientation'  => array(
						'default_on_front' => 'left',
					),
				),
			),
			'borders'    => array(
				'default' => array(),
				'image'   => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dsm_card_image_wrapper',
							'border_styles' => '%%order_class%% .dsm_card_image_wrapper',
						),
					),
					'label_prefix' => esc_html__( 'Image', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'image_settings',
				),
				'badge'   => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => "{$this->main_css_element} .dsm_card_badge_text",
							'border_styles' => "{$this->main_css_element} .dsm_card_badge_text",
						),
					),
					'defaults'     => array(
						'border_radii' => 'on|50px|50px|50px|50px',
					),
					'label_prefix' => esc_html__( 'Badge', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'badge_settings',
				),
			),
			'box_shadow' => array(
				'default' => array(
					'css' => array(
						'main' => "{$this->main_css_element}",
					),
				),
				'image'   => array(
					'label'             => esc_html__( 'Image Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'option_category'   => 'layout',
					'tab_slug'          => 'advanced',
					'toggle_slug'       => 'image_settings',
					'css'               => array(
						'main' => "{$this->main_css_element} .dsm_card_image_wrapper",
					),
					'default_on_fronts' => array(
						'color'    => '',
						'position' => '',
					),
				),
				'badge'   => array(
					'label'           => esc_html__( 'Badge Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'option_category' => 'layout',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'badge_settings',
					'css'             => array(
						'main' => "{$this->main_css_element} .dsm_card_badge_text",
					),
				),
			),
			'button'     => array(
				'button' => array(
					'label'         => esc_html__( 'Button', 'dsm-supreme-modules-pro-for-divi' ),
					'css'           => array(
						'main'        => "{$this->main_css_element} .et_pb_button",
						'plugin_main' => "{$this->main_css_element} .et_pb_button",
						'alignment'   => "{$this->main_css_element} .et_pb_button_wrapper",
					),
					'use_alignment' => true,
					'box_shadow'    => array(
						'css' => array(
							'main' => "{$this->main_css_element} .et_pb_button",
						),
					),
				),
			),
			'filters'    => array(
				'css' => array(
					'main' => array(
						"{$this->main_css_element}",
					),
				),
				/*
				'child_filters_target' => array(
					'tab_slug' => 'advanced',
					'toggle_slug' => 'image_settings',
					'css'                 => array(
						'main'  => "{$this->main_css_element} .dsm_card_image_wrapper",
						'hover' => "{$this->main_css_element}:hover .dsm_card_image_wrapper",
					),
				),*/
			),
		);
	}

	public function get_fields() {
		$et_accent_color = et_builder_accent_color();

		return array(
			'button_id'                    => array(
				'label'           => esc_html__( 'Button ID', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'description'     => esc_html__( "Assign a unique CSS ID to Button which can be used to assign custom CSS styles from within your child theme or from within Divi's custom CSS inputs.", 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'classes',
				'option_class'    => 'et_pb_custom_css_regular',
			),
			'button_css'                   => array(
				'label'           => esc_html__( 'Button CSS Class', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'description'     => esc_html__( "Assign any number of CSS Classes to the button, separated by spaces, which can be used to assign custom CSS styles from within your child theme or from within Divi's custom CSS inputs.", 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'classes',
				'option_class'    => 'et_pb_custom_css_regular',
			),
			'title'                        => array(
				'label'           => esc_html__( 'Title', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Text entered here will appear as title.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'main_content',
				'dynamic_content' => 'text',
			),
			'subtitle'                     => array(
				'label'           => esc_html__( 'Sub Title', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Text entered here will appear as subtitle.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'main_content',
				'dynamic_content' => 'text',
			),
			'layout'                       => array(
				'label'           => esc_html__( 'Layout', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'stacked' => __( 'Stacked', 'dsm-supreme-modules-pro-for-divi' ),
					'inline'  => __( 'Inline', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'         => 'stacked',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'layout_alignment',
				// 'mobile_options'  => true,
				// 'responsive'      => true,
			),
			'layout_inline_image_width'    => array(
				'label'            => esc_html__( 'Width', 'dsm-supreme-modules-pro-for-divi' ),
				'description'      => esc_html__( 'Adjust width of the Image Wrapper.', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'layout',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'layout_alignment',
				'mobile_options'   => true,
				'validate_unit'    => true,
				'allowed_units'    => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
				'default'          => '50%',
				'default_unit'     => '%',
				'default_on_front' => '50%',
				'allow_empty'      => false,
				'range_settings'   => array(
					'min'  => '0',
					'max'  => '70',
					'step' => '1',
				),
				'responsive'       => true,
				'show_if'          => array(
					'layout' => 'inline',
				),
			),
			'layout_inline_order'          => array(
				'label'            => esc_html__( 'Order Alignment', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'layout',
				'options'          => array(
					'left'  => __( 'Left', 'dsm-supreme-modules-pro-for-divi' ),
					'right' => __( 'Right', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'left',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'layout_alignment',
				'show_if'          => array(
					'layout' => 'inline',
				),
			),
			'content_horizontal_alignment' => array(
				'label'           => esc_html__( 'Horizontal Content Alignment', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'flex-start' => __( 'Top', 'dsm-supreme-modules-pro-for-divi' ),
					'center'     => __( 'Center', 'dsm-supreme-modules-pro-for-divi' ),
					'flex-end'   => __( 'Bottom', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'         => 'center',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'layout_alignment',
			),
			'content_equal_height'         => array(
				'label'            => esc_html__( 'Use Equal Height', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'basic_option',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'layout_alignment',
				'description'      => esc_html__( 'If you use the row equalize height option, then enable this to see equal height for this module.', 'dsm-supreme-modules-pro-for-divi' ),
				'default_on_front' => 'off',
				'show_if'          => array(
					'image_as_background' => 'on',
					'layout'              => 'stacked',
				),
			),
			'image'                        => array(
				'label'              => esc_html__( 'Image', 'dsm-supreme-modules-pro-for-divi' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'upload_button_text' => esc_attr__( 'Upload an image', 'dsm-supreme-modules-pro-for-divi' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'dsm-supreme-modules-pro-for-divi' ),
				'update_text'        => esc_attr__( 'Set As Image', 'dsm-supreme-modules-pro-for-divi' ),
				'description'        => esc_html__( 'Upload an image to display at the top of your Cards.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'        => 'image',
				'dynamic_content'    => 'image',
			),
			'image_as_background'          => array(
				'label'            => esc_html__( 'Use Image as Background', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'basic_option',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'image',
				'description'      => esc_html__( 'Here you can choose to have a custom height for your image wrapper.', 'dsm-supreme-modules-pro-for-divi' ),
				'default_on_front' => 'on',
			),
			'image_background_height'      => array(
				'label'            => esc_html__( 'Image Height', 'dsm-supreme-modules-pro-for-divi' ),
				'description'      => esc_html__( 'Adjust the height of the image.', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'layout',
				'toggle_slug'      => 'image',
				'mobile_options'   => true,
				'validate_unit'    => true,
				'allowed_units'    => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
				'default'          => '240px',
				'default_unit'     => 'px',
				'default_on_front' => '240px',
				'allow_empty'      => true,
				'range_settings'   => array(
					'min'  => '0',
					'max'  => '800',
					'step' => '1',
				),
				'responsive'       => true,
				'show_if'          => array(
					'image_as_background' => 'on',
				),
			),
			'image_background_size'        => array(
				'label'           => esc_html__( 'Background Image Size', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'cover'   => __( 'Cover', 'dsm-supreme-modules-pro-for-divi' ),
					'contain' => __( 'Fit', 'dsm-supreme-modules-pro-for-divi' ),
					'initial' => __( 'Actual Size', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'         => 'cover',
				'toggle_slug'     => 'image',
				'show_if'         => array(
					'image_as_background' => 'on',
				),
			),
			'image_background_position'    => array(
				'label'           => esc_html__( 'Background Image Position', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'top_left'     => __( 'Top Left', 'dsm-supreme-modules-pro-for-divi' ),
					'top'          => __( 'Top', 'dsm-supreme-modules-pro-for-divi' ),
					'top_right'    => __( 'Top Right', 'dsm-supreme-modules-pro-for-divi' ),
					'center_left'  => __( 'Center Left', 'dsm-supreme-modules-pro-for-divi' ),
					'center'       => __( 'Center', 'dsm-supreme-modules-pro-for-divi' ),
					'center_right' => __( 'Center Right', 'dsm-supreme-modules-pro-for-divi' ),
					'bottom_left'  => __( 'Bottom Left', 'dsm-supreme-modules-pro-for-divi' ),
					'bottom'       => __( 'Bottom', 'dsm-supreme-modules-pro-for-divi' ),
					'bottom_right' => __( 'Bottom Right', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'         => 'center',
				'toggle_slug'     => 'image',
				'show_if'         => array(
					'image_as_background' => 'on',
				),
			),
			'image_background_repeat'      => array(
				'label'           => esc_html__( 'Background Image Repeat', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'no-repeat' => __( 'No Repeat', 'dsm-supreme-modules-pro-for-divi' ),
					'repeat'    => __( 'Repeat', 'dsm-supreme-modules-pro-for-divi' ),
					'repeat-x'  => __( 'Repeat X (horizontal)', 'dsm-supreme-modules-pro-for-divi' ),
					'repeat-y'  => __( 'Repeat Y (vertical)', 'dsm-supreme-modules-pro-for-divi' ),
					'space'     => __( 'Space', 'dsm-supreme-modules-pro-for-divi' ),
					'round'     => __( 'Round', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'         => 'no-repeat',
				'toggle_slug'     => 'image',
				'show_if'         => array(
					'image_as_background' => 'on',
				),
			),
			'image_background_animation'   => array(
				'label'           => esc_html__( 'Background Image Animation', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'none'              => __( 'None', 'dsm-supreme-modules-pro-for-divi' ),
					'zoom_in'           => __( 'Zoom In', 'dsm-supreme-modules-pro-for-divi' ),
					'zoom_out'          => __( 'Zoom Out', 'dsm-supreme-modules-pro-for-divi' ),
					'zoom_in_n_rotate'  => __( 'Zoom In & Rotate', 'dsm-supreme-modules-pro-for-divi' ),
					'zoom_out_n_rotate' => __( 'Zoom Out & Rotate', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'         => 'none',
				'toggle_slug'     => 'image',
				'show_if'         => array(
					'image_as_background' => 'on',
				),
			),
			// Use Icon.
			'use_content_icon'             => array(
				'label'            => esc_html__( 'Use Icon', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'basic_option',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'icon',
				'default_on_front' => 'off',
				'default'          => 'off',
				'affects'          => array(
					'font_icon',
					'use_icon_font_size',
					'use_circle',
					'icon_color',
				),
				'description'      => esc_html__( 'Here you can choose whether icon set below should be used.', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'font_icon'                    => array(
				'label'           => esc_html__( 'Icon', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select_icon',
				'option_category' => 'basic_option',
				'class'           => array( 'et-pb-font-icon' ),
				'toggle_slug'     => 'icon',
				'description'     => esc_html__( 'Choose an icon to display with your blurb.', 'dsm-supreme-modules-pro-for-divi' ),
				'depends_show_if' => 'on',
			),
			'icon_color'                   => array(
				'default'         => $et_accent_color,
				'label'           => esc_html__( 'Icon Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'color-alpha',
				'description'     => esc_html__( 'Here you can define a custom color for your icon.', 'dsm-supreme-modules-pro-for-divi' ),
				'depends_show_if' => 'on',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'icon_settings',
			),
			'use_circle'                   => array(
				'label'            => esc_html__( 'Circle Icon', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'affects'          => array(
					'use_circle_border',
					'circle_color',
				),
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'icon_settings',
				'description'      => esc_html__( 'Here you can choose whether icon set above should display within a circle.', 'dsm-supreme-modules-pro-for-divi' ),
				'depends_show_if'  => 'on',
				'default_on_front' => 'off',
			),
			'circle_color'                 => array(
				'default'         => $et_accent_color,
				'label'           => esc_html__( 'Circle Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'color-alpha',
				'description'     => esc_html__( 'Here you can define a custom color for the icon circle.', 'dsm-supreme-modules-pro-for-divi' ),
				'depends_show_if' => 'on',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'icon_settings',
			),
			'use_circle_border'            => array(
				'label'            => esc_html__( 'Show Circle Border', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'layout',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'affects'          => array(
					'circle_border_color',
				),
				'description'      => esc_html__( 'Here you can choose whether if the icon circle border should display.', 'dsm-supreme-modules-pro-for-divi' ),
				'depends_show_if'  => 'on',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'icon_settings',
				'default_on_front' => 'off',
			),
			'circle_border_color'          => array(
				'default'         => $et_accent_color,
				'label'           => esc_html__( 'Circle Border Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'color-alpha',
				'description'     => esc_html__( 'Here you can define a custom color for the icon circle border.', 'dsm-supreme-modules-pro-for-divi' ),
				'depends_show_if' => 'on',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'icon_settings',
			),
			'use_icon_font_size'           => array(
				'label'            => esc_html__( 'Use Icon Font Size', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'font_option',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'affects'          => array(
					'icon_content_font_size',
				),
				'depends_show_if'  => 'on',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'icon_settings',
				'default_on_front' => 'off',
			),
			'icon_content_font_size'       => array(
				'label'            => esc_html__( 'Icon Font Size', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'font_option',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'icon_settings',
				'default'          => '96px',
				'default_unit'     => 'px',
				'default_on_front' => '',
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '120',
					'step' => '1',
				),
				'mobile_options'   => true,
				'depends_show_if'  => 'on',
				'responsive'       => true,
			),
			'image_alignment'              => array(
				'label'            => esc_html__( 'Image Alignment', 'dsm-supreme-modules-pro-for-divi' ),
				'description'      => esc_html__( 'Align image to the left, right or center.', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'align',
				'option_category'  => 'layout',
				'options'          => et_builder_get_text_orientation_options( array( 'justified' ) ),
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'image_settings',
				'default'          => 'left',
				'default_on_front' => 'left',
				'mobile_options'   => true,
				'show_if'          => array(
					'image_as_background' => 'off',
				),
			),
			'use_overlay'                  => array(
				'label'            => esc_html__( 'Image Overlay', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'layout',
				'options'          => array(
					'off' => esc_html__( 'Off', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'On', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'off',
				'affects'          => array(
					'border_radii_overlay',
					'border_styles_overlay',
					'overlay_color',
					'use_icon',
					'overlay_on_hover',
				),
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'image_settings',
				'description'      => esc_html__( 'If enabled, an overlay color and icon will be displayed when a visitors hovers over the image', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'overlay_color'                => array(
				'label'           => esc_html__( 'Overlay Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'color-alpha',
				'custom_color'    => true,
				'depends_show_if' => 'on',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'image_settings',
				'description'     => esc_html__( 'Here you can define a custom color for the overlay', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'use_icon'                     => array(
				'label'            => esc_html__( 'Use Icon', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'layout',
				'options'          => array(
					'off' => esc_html__( 'Off', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'On', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'on',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'image_settings',
				'affects'          => array(
					'overlay_icon_color',
					'hover_icon',
					'icon_font_size',
				),
				'description'      => esc_html__( 'If enabled, icon will only show up.', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'icon_font_size'               => array(
				'label'            => esc_html__( 'Icon Font Size', 'dsm-supreme-modules-pro-for-divi' ),
				'description'      => esc_html__( 'Control the size of the icon by increasing or decreasing the font size.', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'font_option',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'image_settings',
				'default'          => '32px',
				'default_unit'     => 'px',
				'default_on_front' => '',
				'allowed_units'    => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '120',
					'step' => '1',
				),
				'mobile_options'   => true,
				'depends_show_if'  => 'on',
				'responsive'       => true,
				'hover'            => 'tabs',
			),
			'overlay_icon_color'           => array(
				'label'           => esc_html__( 'Overlay Icon Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'color-alpha',
				'custom_color'    => true,
				'depends_show_if' => 'on',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'image_settings',
				'description'     => esc_html__( 'Here you can define a custom color for the overlay icon', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'hover_icon'                   => array(
				'label'           => esc_html__( 'Icon Picker', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select_icon',
				'option_category' => 'configuration',
				'class'           => array( 'et-pb-font-icon' ),
				'depends_show_if' => 'on',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'image_settings',
				'default'         => 'P',
				'description'     => esc_html__( 'Here you can define a custom icon for the overlay', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'overlay_on_hover'             => array(
				'label'            => esc_html__( 'Show Overlay On Hover', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'layout',
				'options'          => array(
					'off' => esc_html__( 'Off', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'On', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'on',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'image_settings',
				'description'      => esc_html__( 'If enabled, overlay will only show on hover.', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'badge_text'                   => array(
				'label'           => esc_html__( 'Badge Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Text entered here will appear as Badge.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'image',
				'dynamic_content' => 'text',
			),
			'badge_position'               => array(
				'label'           => esc_html__( 'Position', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'top_left'      => esc_html__( 'Top Left', 'dsm-supreme-modules-pro-for-divi' ),
					'top_center'    => esc_html__( 'Top Center', 'dsm-supreme-modules-pro-for-divi' ),
					'top_right'     => esc_html__( 'Top Right', 'dsm-supreme-modules-pro-for-divi' ),
					'center_left'   => esc_html__( 'Center Left', 'dsm-supreme-modules-pro-for-divi' ),
					'center'        => esc_html__( 'Center', 'dsm-supreme-modules-pro-for-divi' ),
					'center_right'  => esc_html__( 'Center Right', 'dsm-supreme-modules-pro-for-divi' ),
					'bottom_left'   => esc_html__( 'Bottom Left', 'dsm-supreme-modules-pro-for-divi' ),
					'bottom_center' => esc_html__( 'Bottom Center', 'dsm-supreme-modules-pro-for-divi' ),
					'bottom_right'  => esc_html__( 'Bottom Right', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'badge_settings',
				'description'     => esc_html__( 'Here you can choose position of the badge.', 'dsm-supreme-modules-pro-for-divi' ),
				'default'         => 'top_right',
				'show_if_not'     => array(
					'badge_custom_position' => 'on',
				),
			),
			'badge_custom_position'        => array(
				'label'            => esc_html__( 'Use Custom Position', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'basic_option',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'badge_settings',
				'description'      => esc_html__( 'Here you can choose to have a custom position for your badge.', 'dsm-supreme-modules-pro-for-divi' ),
				'default_on_front' => 'off',
			),
			'badge_left_position'          => array(
				'label'            => esc_html__( 'Left Position', 'dsm-supreme-modules-pro-for-divi' ),
				'description'      => esc_html__( 'Adjust the Left position.', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'layout',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'badge_settings',
				'mobile_options'   => true,
				'validate_unit'    => true,
				'allowed_units'    => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
				'default'          => '1rem',
				'default_unit'     => 'rem',
				'default_on_front' => '1rem',
				'allow_empty'      => true,
				'range_settings'   => array(
					'min'  => '0',
					'max'  => '30',
					'step' => '0.1',
				),
				'responsive'       => true,
				'show_if'          => array(
					'badge_custom_position' => 'on',
				),
			),
			'badge_top_position'           => array(
				'label'            => esc_html__( 'Top Position', 'dsm-supreme-modules-pro-for-divi' ),
				'description'      => esc_html__( 'Adjust the Top position.', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'layout',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'badge_settings',
				'mobile_options'   => true,
				'validate_unit'    => true,
				'allowed_units'    => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
				'default'          => '1rem',
				'default_unit'     => 'rem',
				'default_on_front' => '1rem',
				'allow_empty'      => true,
				'range_settings'   => array(
					'min'  => '0',
					'max'  => '30',
					'step' => '0.1',
				),
				'responsive'       => true,
				'show_if'          => array(
					'badge_custom_position' => 'on',
				),
			),
			'badge_background_color'       => array(
				'default'        => '#ffffff',
				'label'          => esc_html__( 'Background Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( 'Here you can define a custom background color for your badge.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'badge_settings',
				'hover'          => 'tabs',
				'mobile_options' => true,
			),
			'badge_padding'                => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'description'     => esc_html__( 'Here you can define a custom padding size for the Badge.', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_padding',
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'badge_settings',
				'default_unit'    => 'px',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '80',
					'step' => '1',
				),
				'default'         => '7px|15px|7px|15px',
				'mobile_options'  => true,
				'responsive'      => true,
				'hover'           => 'tabs',
			),
			'badge_url'                    => array(
				'label'           => esc_html__( 'Badge Link URL', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'depends_show_if' => 'off',
				'description'     => esc_html__( 'If you would like your badge to be a link, input your destination URL here. No link will be created if this field is left blank.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'link_options',
				'dynamic_content' => 'url',
			),
			'badge_url_new_window'         => array(
				'label'            => esc_html__( 'Badge Link Target', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'In The Same Window', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'In The New Tab', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'off',
				'depends_show_if'  => 'off',
				'toggle_slug'      => 'link_options',
				'description'      => esc_html__( 'Here you can choose whether or not your link opens in a new window', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'alt'                          => array(
				'label'           => esc_html__( 'Image Alt Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Define the HTML ALT text for your image here.', 'dsm-supreme-modules-pro-for-divi' ),
				'depends_show_if' => 'off',
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'attributes',
			),
			'content'                      => array(
				'label'           => esc_html__( 'Content', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'main_content',
				'dynamic_content' => 'text',
			),
			'content_padding'              => array(
				'label'           => esc_html__( 'Content Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'description'     => esc_html__( 'Here you can define a custom padding size for the Content Wrapper.', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_padding',
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'margin_padding',
				'default_unit'    => 'px',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '80',
					'step' => '1',
				),
				'default'         => '20px|20px|20px|20px',
				'mobile_options'  => true,
				'responsive'      => true,
				'hover'           => 'tabs',
			),
			'button_text'                  => array(
				'label'           => esc_html__( 'Button Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input your desired button text, or leave blank for no button.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'button',
				'dynamic_content' => 'text',
			),
			'button_url'                   => array(
				'label'           => esc_html__( 'Button URL', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input URL for your button.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'button',
				'dynamic_content' => 'url',
			),
			'button_url_new_window'        => array(
				'default'          => 'off',
				'default_on_front' => true,
				'label'            => esc_html__( 'Url Opens', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'In The Same Window', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'In The New Tab', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'button',
				'description'      => esc_html__( 'Choose whether your link opens in a new window or not', 'dsm-supreme-modules-pro-for-divi' ),
			),
		);
	}

	public function get_transition_fields_css_props() {
		$badge_selector   = '%%order_class%% .dsm_card_badge_text';
		$content_selector = '%%order_class%% .dsm_card_wrapper';

		$fields = parent::get_transition_fields_css_props();

		$fields['icon_color'] = array(
			'color' => '%%order_class%% .dsm_card_icon .et-pb-icon',
		);

		$fields['circle_color'] = array(
			'background-color' => '%%order_class%% .dsm_card_icon .et-pb-icon',
		);

		$fields['circle_border_color'] = array(
			'border-color' => '%%order_class%% .dsm_card_icon .et-pb-icon',
		);

		$fields['icon_font_size'] = array(
			'font-size' => '%%order_class%% .dsm_card_icon .et-pb-icon',
		);

		$fields['badge_background_color'] = array(
			'background-color' => $badge_selector,
		);

		$fields['badge_padding'] = array(
			'padding' => $badge_selector,
		);

		$fields['content_padding'] = array(
			'padding' => $content_selector,
		);

		$fields['icon_font_size'] = array(
			'font-size' => '%%order_class%% .et_overlay:before',
		);

		return $fields;

	}

	public function render( $attrs, $content = null, $render_slug ) {
		$multi_view            = et_pb_multi_view_options( $this );
		$title                 = $this->props['title'];
		$subtitle              = $this->props['subtitle'];
		$button_text           = $this->props['button_text'];
		$badge_url             = $this->props['badge_url'];
		$badge_url_new_window  = $this->props['badge_url_new_window'];
		$badge_text            = $this->props['badge_text'];
		$badge_position        = $this->props['badge_position'];
		$badge_custom_position = $this->props['badge_custom_position'];
		$image                 = $this->props['image'];
		$alt                   = $this->props['alt'];
		$layout                = $this->props['layout'];
		// $layout_values                         = et_pb_responsive_options()->get_property_values( $this->props, 'layout' );
		// $layout_tablet                         = isset( $layout_values['tablet'] ) ? $layout_values['tablet'] : '';
		// $layout_phone                          = isset( $layout_values['phone'] ) ? $layout_values['phone'] : '';
		$layout_inline_image_width             = $this->props['layout_inline_image_width'];
		$layout_inline_image_width_tablet      = $this->props['layout_inline_image_width_tablet'];
		$layout_inline_image_width_phone       = $this->props['layout_inline_image_width_phone'];
		$layout_inline_image_width_last_edited = $this->props['layout_inline_image_width_last_edited'];
		$layout_inline_order                   = $this->props['layout_inline_order'];
		$content_equal_height                  = $this->props['content_equal_height'];
		$content_horizontal_alignment          = $this->props['content_horizontal_alignment'];

		$image_as_background                 = $this->props['image_as_background'];
		$image_background_height             = $this->props['image_background_height'];
		$image_background_height_tablet      = $this->props['image_background_height_tablet'];
		$image_background_height_phone       = $this->props['image_background_height_phone'];
		$image_background_height_last_edited = $this->props['image_background_height_last_edited'];
		$image_background_size               = $this->props['image_background_size'];
		$image_background_position           = $this->props['image_background_position'];
		$image_background_repeat             = $this->props['image_background_repeat'];
		$image_background_animation          = $this->props['image_background_animation'];

		$button_url            = $this->props['button_url'];
		$button_url_new_window = $this->props['button_url_new_window'];
		$button_custom         = $this->props['custom_button'];
		$button_rel            = $this->props['button_rel'];
		$custom_icon_values    = et_pb_responsive_options()->get_property_values( $this->props, 'button_icon' );
		$custom_icon           = isset( $custom_icon_values['desktop'] ) ? $custom_icon_values['desktop'] : '';
		$custom_icon_tablet    = isset( $custom_icon_values['tablet'] ) ? $custom_icon_values['tablet'] : '';
		$custom_icon_phone     = isset( $custom_icon_values['phone'] ) ? $custom_icon_values['phone'] : '';

		$font_icon                          = $this->props['font_icon'];
		$use_content_icon                   = $this->props['use_content_icon'];
		$use_circle                         = $this->props['use_circle'];
		$use_circle_border                  = $this->props['use_circle_border'];
		$icon_color                         = $this->props['icon_color'];
		$circle_color                       = $this->props['circle_color'];
		$circle_border_color                = $this->props['circle_border_color'];
		$use_icon_font_size                 = $this->props['use_icon_font_size'];
		$icon_content_font_size             = $this->props['icon_content_font_size'];
		$icon_content_font_size_tablet      = $this->props['icon_content_font_size_tablet'];
		$icon_content_font_size_phone       = $this->props['icon_content_font_size_phone'];
		$icon_content_font_size_last_edited = $this->props['icon_content_font_size_last_edited'];

		$badge_left_position             = $this->props['badge_left_position'];
		$badge_left_position_tablet      = $this->props['badge_left_position_tablet'];
		$badge_left_position_phone       = $this->props['badge_left_position_phone'];
		$badge_left_position_last_edited = $this->props['badge_left_position_last_edited'];

		$badge_top_position             = $this->props['badge_top_position'];
		$badge_top_position_tablet      = $this->props['badge_top_position_tablet'];
		$badge_top_position_phone       = $this->props['badge_top_position_phone'];
		$badge_top_position_last_edited = $this->props['badge_top_position_last_edited'];

		$badge_background_color        = $this->props['badge_background_color'];
		$badge_background_color_hover  = $this->get_hover_value( 'badge_background_color' );
		$badge_background_color_values = et_pb_responsive_options()->get_property_values( $this->props, 'badge_background_color' );
		$badge_background_color_tablet = isset( $badge_background_color_values['tablet'] ) ? $badge_background_color_values['tablet'] : '';
		$badge_background_color_phone  = isset( $badge_background_color_values['phone'] ) ? $badge_background_color_values['phone'] : '';

		$badge_padding             = $this->props['badge_padding'];
		$badge_padding_hover       = $this->get_hover_value( 'badge_padding' );
		$badge_padding_values      = et_pb_responsive_options()->get_property_values( $this->props, 'badge_padding' );
		$badge_padding_tablet      = isset( $badge_padding_values['tablet'] ) ? $badge_padding_values['tablet'] : '';
		$badge_padding_phone       = isset( $badge_padding_values['phone'] ) ? $badge_padding_values['phone'] : '';
		$badge_padding_last_edited = $this->props['badge_padding_last_edited'];

		$content_padding             = $this->props['content_padding'];
		$content_padding_hover       = $this->get_hover_value( 'content_padding' );
		$content_padding_values      = et_pb_responsive_options()->get_property_values( $this->props, 'content_padding' );
		$content_padding_tablet      = isset( $content_padding_values['tablet'] ) ? $content_padding_values['tablet'] : '';
		$content_padding_phone       = isset( $content_padding_values['phone'] ) ? $content_padding_values['phone'] : '';
		$content_padding_last_edited = $this->props['content_padding_last_edited'];

		$overlay_icon_color         = $this->props['overlay_icon_color'];
		$overlay_color              = $this->props['overlay_color'];
		$use_icon                   = $this->props['use_icon'];
		$icon_font_size             = $this->props['icon_font_size'];
		$icon_font_size_hover       = $this->get_hover_value( 'icon_font_size' );
		$icon_font_size_tablet      = $this->props['icon_font_size_tablet'];
		$icon_font_size_phone       = $this->props['icon_font_size_phone'];
		$icon_font_size_last_edited = $this->props['icon_font_size_last_edited'];
		$hover_icon                 = $this->props['hover_icon'];
		$use_overlay                = $this->props['use_overlay'];
		$overlay_on_hover           = $this->props['overlay_on_hover'];

		$background_layout = $this->props['background_layout'];
		$text_orientation  = $this->props['text_orientation'];

		$header_level                 = $this->props['header_level'];
		$hover_transition_duration    = $this->props['hover_transition_duration'];
		$hover_transition_speed_curve = $this->props['hover_transition_speed_curve'];

		$button_id  = $this->props['button_id'];
		$button_css = $this->props['button_css'];

		$image_selector            = '%%order_class%% .dsm_card_image_wrapper';
		$image_inline_selector     = '%%order_class%%.dsm_card_layout_inline .dsm_card_image_wrapper';
		$image_background_selector = '%%order_class%% .dsm_card_image_background';
		$badge_selector            = '%%order_class%% .dsm_card_badge_text';
		$content_wrapper_selector  = '%%order_class%% .dsm_card_wrapper';

		$image_pathinfo = pathinfo( $image );
		$is_image_svg   = isset( $image_pathinfo['extension'] ) ? 'svg' === $image_pathinfo['extension'] : false;
		// overlay can be applied only if image has link or if lightbox enabled.
		$is_overlay_applied = 'on' === $use_overlay ? 'on' : 'off';

		if ( 'on' === $is_overlay_applied ) {
			if ( '' !== $overlay_icon_color && 'off' !== $use_icon ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .et_overlay:before',
						'declaration' => sprintf(
							'color: %1$s;',
							esc_html( $overlay_icon_color )
						),
					)
				);
			}

			$font_size_responsive_active = et_pb_get_responsive_status( $icon_font_size_last_edited );

			$font_size_values = array(
				'desktop' => $icon_font_size,
				'tablet'  => $font_size_responsive_active ? $icon_font_size_tablet : '',
				'phone'   => $font_size_responsive_active ? $icon_font_size_phone : '',
			);

			et_pb_responsive_options()->generate_responsive_css( $font_size_values, '%%order_class%% .et_overlay:before', 'font-size', $render_slug );

			if ( et_builder_is_hover_enabled( 'icon_font_size', $this->props ) ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => $this->add_hover_to_order_class( '%%order_class%% .et_overlay:before' ),
						'declaration' => sprintf(
							'font-size: %1$s;',
							esc_html( $icon_font_size_hover )
						),
					)
				);
			}

			if ( '' !== $overlay_color ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .et_overlay',
						'declaration' => sprintf(
							'background-color: %1$s;',
							esc_html( $overlay_color )
						),
					)
				);
			}

			$data_icon = '' !== $hover_icon
				? sprintf(
					' data-icon="%1$s"',
					esc_attr( et_pb_process_font_icon( $hover_icon ) )
				)
				: '';

			$overlay_output = sprintf(
				'<span class="et_overlay%1$s"%2$s></span>',
				( '' !== $hover_icon && 'off' !== $use_icon ? ' et_pb_inline_icon' : ' dsm-card-icon-empty' ),
				$data_icon
			);
		}

		if ( 'on' === $image_as_background ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $image_background_selector,
					'declaration' => sprintf(
						'background-repeat: %2$s; background-position: %3$s; background-size: %4$s; background-image: url(%1$s); transition: transform %5$s %6$s;',
						esc_attr( $image ),
						esc_attr( $image_background_repeat ),
						str_replace( '_', ' ', esc_attr( $image_background_position ) ),
						esc_attr( $image_background_size ),
						esc_attr( $hover_transition_duration ),
						esc_attr( $hover_transition_speed_curve )
					),
				)
			);

			$image_background_height_responsive_active = et_pb_get_responsive_status( $image_background_height_last_edited );

			$image_background_height_values = array(
				'desktop' => $image_background_height,
				'tablet'  => $image_background_height_responsive_active ? $image_background_height_tablet : '',
				'phone'   => $image_background_height_responsive_active ? $image_background_height_phone : '',
			);

			et_pb_responsive_options()->generate_responsive_css( $image_background_height_values, $image_selector, 'height', $render_slug );

			if ( 'on' === $content_equal_height ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => $content_wrapper_selector,
						'declaration' => sprintf(
							'height: calc(100%% - %1$s);',
							esc_attr( $image_background_height )
						),
					)
				);
				if ( $image_background_height_responsive_active ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => $content_wrapper_selector,
							'declaration' => sprintf(
								'height: calc(100%% - %1$s);',
								esc_attr( $image_background_height_tablet )
							),
							'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
						)
					);

					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => $content_wrapper_selector,
							'declaration' => sprintf(
								'height: calc(100%% - %1$s);',
								esc_attr( $image_background_height_phone )
							),
							'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
						)
					);
				}
			}

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $content_wrapper_selector,
					'declaration' => sprintf(
						'justify-content: %1$s;',
						esc_attr( $content_horizontal_alignment )
					),
				)
			);

		} else {
			$image_alignment             = $this->props['image_alignment'];
			$image_alignment_values      = et_pb_responsive_options()->get_property_values( $this->props, 'image_alignment' );
			$image_alignment_last_edited = $this->props['image_alignment_last_edited'];

			$image_alignment_selector = '%%order_class%% .dsm_card_image_wrapper';

			if ( et_pb_get_responsive_status( $image_alignment_last_edited ) && '' !== implode( '', $image_alignment_values ) ) {
				// Icon and less than wrapper width image alignment style.
				et_pb_responsive_options()->generate_responsive_css(
					$image_alignment_values,
					$image_alignment_selector,
					'text-align',
					$render_slug,
					'',
					'align'
				);
			} else {
				$el_style = array(
					'selector'    => $image_alignment_selector,
					'declaration' => sprintf(
						'text-align: %1$s;',
						esc_html( $image_alignment )
					),
				);
				ET_Builder_Element::set_style( $render_slug, $el_style );
			}
		}

		if ( '' !== $badge_text ) {
			$badge_background_style        = sprintf( 'background-color: %1$s;', esc_attr( $badge_background_color ) );
			$badge_background_tablet_style = '' !== $badge_background_color_tablet ? sprintf( 'background-color: %1$s;', esc_attr( $badge_background_color_tablet ) ) : '';
			$badge_background_phone_style  = '' !== $badge_background_color_phone ? sprintf( 'background-color: %1$s;', esc_attr( $badge_background_color_phone ) ) : '';
			$badge_background_style_hover  = '';

			if ( et_builder_is_hover_enabled( 'badge_background_color', $this->props ) ) {
				$badge_background_style_hover = sprintf( 'background-color: %1$s;', esc_attr( $badge_background_color_hover ) );
			}

			if ( '#ffffff' !== $badge_background_color ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => $badge_selector,
						'declaration' => $badge_background_style,
					)
				);
			}

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $badge_selector,
					'declaration' => $badge_background_tablet_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $badge_selector,
					'declaration' => $badge_background_phone_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			if ( '' !== $badge_background_style_hover ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => $this->add_hover_to_order_class( $badge_selector ),
						'declaration' => $badge_background_style_hover,
					)
				);
			}
		}

		if ( 'on' === $badge_custom_position ) {
			$badge_left_position_responsive_active = et_pb_get_responsive_status( $badge_left_position_last_edited );

			$badge_left_position_values = array(
				'desktop' => $badge_left_position,
				'tablet'  => $badge_left_position_responsive_active ? $badge_left_position_tablet : '',
				'phone'   => $badge_left_position_responsive_active ? $badge_left_position_phone : '',
			);

			et_pb_responsive_options()->generate_responsive_css( $badge_left_position_values, $badge_selector, 'left', $render_slug );

			$badge_top_position_responsive_active = et_pb_get_responsive_status( $badge_top_position_last_edited );

			$badge_top_position_values = array(
				'desktop' => $badge_top_position,
				'tablet'  => $badge_top_position_responsive_active ? $badge_top_position_tablet : '',
				'phone'   => $badge_top_position_responsive_active ? $badge_top_position_phone : '',
			);

			et_pb_responsive_options()->generate_responsive_css( $badge_top_position_values, $badge_selector, 'top', $render_slug );
		}

		if ( 'inline' === $layout ) {
			$layout_inline_image_width_style        = sprintf( 'flex: 0 0 %1$s;', esc_attr( $layout_inline_image_width ) );
			$layout_inline_image_width_tablet_style = '' !== $layout_inline_image_width_tablet ? sprintf( 'flex: 0 0 %1$s;', esc_attr( $layout_inline_image_width_tablet ) ) : '';
			$layout_inline_image_width_phone_style  = '' !== $layout_inline_image_width_phone ? sprintf( 'flex: 0 0 %1$s;', esc_attr( $layout_inline_image_width_phone ) ) : '';

			$layout_order                       = 'left' === $layout_inline_order ? '0' : '1';
			$layout_inline_order_style          = sprintf( 'order: %1$s;', esc_attr( $layout_order ) );
			$content_horizontal_alignment_style = sprintf( 'align-items: %1$s;', esc_attr( $content_horizontal_alignment ) );

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $image_inline_selector,
					'declaration' => $layout_inline_image_width_style,
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $image_inline_selector,
					'declaration' => $layout_inline_image_width_tablet_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $image_inline_selector,
					'declaration' => $layout_inline_image_width_phone_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			if ( 'left' !== $layout_inline_order ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => $image_selector,
						'declaration' => $layout_inline_order_style,
					)
				);
			}

			if ( 'center' !== $content_horizontal_alignment ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%%, %%order_class%% .et_pb_module_inner',
						'declaration' => $content_horizontal_alignment_style,
					)
				);
			}
		}

		$image = $multi_view->render_element(
			array(
				'tag'      => 'img',
				'attrs'    => array(
					'src' => '{{image}}',
					// 'class' => implode( ' ', $image_classes ),
					'alt' => $alt,
				),
				'required' => 'image',
			)
		);

		$badge_tag            = '' !== $badge_url ? 'a' : 'div';
		$badge_attrs          = array();
		$badge_attrs['class'] = 'dsm_card_badge_text';
		if ( 'a' === $badge_tag ) {
			$badge_attrs['href'] = $badge_url;

			if ( 'on' === $badge_url_new_window ) {
				$badge_attrs['target'] = '_blank';
			}
		}

		$badge_text = $multi_view->render_element(
			array(
				'tag'     => $badge_tag,
				'content' => '{{badge_text}}',
				'attrs'   => $badge_attrs,
			)
		);

		// Images: Add CSS Filters and Mix Blend Mode rules (if set).
		$generate_css_image_filters = '';
		if ( $image && array_key_exists( 'image_settings', $this->advanced_fields ) && array_key_exists( 'css', $this->advanced_fields['image_settings'] ) ) {
			$generate_css_image_filters = $this->generate_css_filters(
				$render_slug,
				'child_',
				self::$data_utils->array_get( $this->advanced_fields['image_settings']['css'], 'main', '%%order_class%%' )
			);
		}

		$image = $image ? sprintf(
			'<figure class="dsm_card_image_wrapper%2$s%5$s">%1$s%6$s%4$s</figure>%3$s',
			'on' !== $image_as_background ? $image : '<div class="dsm_card_image_background"></div>',
			esc_attr( $generate_css_image_filters ),
			( 'on' === $badge_custom_position ? $badge_text : '' ),
			( 'off' === $badge_custom_position ? $badge_text : '' ),
			'on' === $badge_custom_position ? '' : " dsm_card_badge_{$badge_position}",
			'on' === $is_overlay_applied ? $overlay_output : ''
		) : '';

		if ( 'on' === $use_content_icon ) {
			$icon_style = sprintf( 'color: %1$s;', esc_attr( $icon_color ) );

			if ( 'on' === $use_circle ) {
				$icon_style .= sprintf( ' background-color: %1$s;', esc_attr( $circle_color ) );

				if ( 'on' === $use_circle_border ) {
					$icon_style .= sprintf( ' border-color: %1$s;', esc_attr( $circle_border_color ) );
				}
			}

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_card_icon .et-pb-icon',
					'declaration' => $icon_style,
				)
			);

			if ( 'off' !== $use_icon_font_size ) {
				$font_size_responsive_active = et_pb_get_responsive_status( $icon_content_font_size_last_edited );

				$font_size_values = array(
					'desktop' => $icon_content_font_size,
					'tablet'  => $font_size_responsive_active ? $icon_content_font_size_tablet : '',
					'phone'   => $font_size_responsive_active ? $icon_content_font_size_phone : '',
				);

				et_pb_responsive_options()->generate_responsive_css( $font_size_values, '%%order_class%% .dsm_card_icon .et-pb-icon', 'font-size', $render_slug );
			}
		}

		$content_wrapper = '';
		if ( $multi_view->has_value( 'font_icon' ) || $multi_view->has_value( 'title' ) || $multi_view->has_value( 'subtitle' ) || $multi_view->has_value( 'content' ) || $multi_view->has_value( 'button_text' ) ) {

			$title = $multi_view->render_element(
				array(
					'tag'     => et_pb_process_header_level( $this->props['header_level'], 'h4' ),
					'content' => '{{title}}',
					'attrs'   => array(
						'class' => 'dsm_card_title et_pb_module_header',
					),
				)
			);

			$subtitle = $multi_view->render_element(
				array(
					'tag'     => 'div',
					'content' => '{{subtitle}}',
					'attrs'   => array(
						'class' => 'dsm_card_subtitle',
					),
				)
			);

			$content = $multi_view->render_element(
				array(
					'tag'     => 'div',
					'content' => '{{content}}',
					'attrs'   => array(
						'class' => 'dsm_card_description',
					),
				)
			);

			$icon_classes[] = 'et-pb-icon';

			if ( 'on' === $use_circle ) {
				$icon_classes[] = 'et-pb-icon-circle';
			}

			if ( 'on' === $use_circle && 'on' === $use_circle_border ) {
				$icon_classes[] = 'et-pb-icon-circle-border';
			}

			$icon = $multi_view->render_element(
				array(
					'tag'     => 'span',
					'content' => '{{font_icon}}',
					'attrs'   => array(
						'class' => implode( ' ', $icon_classes ),
					),
				)
			);

			if ( '' !== $icon ) {
				$icon = sprintf(
					'<div class="dsm_card_icon">
						<span class="dsm_card_icon_wrap">
							%1$s
						</span>
					</div>',
					et_core_esc_previously( $icon )
				);
			}

			$button = $this->render_button(
				array(
					'button_id'           => isset( $button_id ) && '' !== $button_id ? esc_attr( $button_id ) : '',
					'button_classname'    => array( 'et_pb_more_button', isset( $button_css ) && '' !== $button_css ? esc_attr( $button_css ) : '' ),
					'button_custom'       => $button_custom,
					'button_rel'          => $button_rel,
					'button_text'         => $button_text,
					'button_text_escaped' => true,
					'button_url'          => $button_url,
					'custom_icon'         => $custom_icon,
					'custom_icon_tablet'  => $custom_icon_tablet,
					'custom_icon_phone'   => $custom_icon_phone,
					'url_new_window'      => $button_url_new_window,
					'display_button'      => ( /*'' !== $button_url &&*/ $multi_view->has_value( 'button_text' ) ),
					'multi_view_data'     => $multi_view->render_attrs(
						array(
							'content'    => '{{button_text}}',
							'visibility' => array(
								'button_text' => '__not_empty',
							),
						)
					),
				)
			);

			$content_wrapper = sprintf(
				'<div class="dsm_card_wrapper%6$s">
					%5$s
					%1$s
					%2$s
					%3$s
					%4$s
				</div>',
				$title,
				$subtitle,
				$content,
				$button,
				'off' !== $use_content_icon ? $icon : '',
				$this->get_text_orientation_classname()
			);
		}

		if ( '7px|15px|7px|15px' !== $badge_padding ) {
			$this->apply_custom_margin_padding(
				$render_slug,
				'badge_padding',
				'padding',
				$badge_selector
			);
		}

		$this->apply_custom_margin_padding(
			$render_slug,
			'content_padding',
			'padding',
			$content_wrapper_selector
		);

		$video_background          = $this->video_background();
		$parallax_image_background = $this->get_parallax_image_background();

		$this->add_classname(
			array(
				"et_pb_bg_layout_{$background_layout}",
				'none' !== $image_background_animation ? "dsm_card_image_animation dsm_card_image_animation_${image_background_animation}" : '',
				"dsm_card_layout_{$layout}",
				'on' === $is_overlay_applied ? 'et_pb_has_overlay' : '',
				'on' === $is_overlay_applied && 'off' === $overlay_on_hover ? 'dsm-card-overlay-off' : '',
			)
		);

		// Render module content.
		$output = sprintf(
			'%4$s
			%3$s
			%1$s
			%2$s
			',
			$image,
			$content_wrapper,
			$video_background,
			$parallax_image_background
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
			return $this->_esc_attr( $multi_view->get_name_by_mode( $name, $mode ), 'none', $raw_value );
		}

		return $raw_value;
	}
}

new DSM_Card();
