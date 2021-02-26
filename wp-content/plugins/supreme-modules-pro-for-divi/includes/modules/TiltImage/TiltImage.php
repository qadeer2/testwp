<?php

class DSM_Tilt_Image extends ET_Builder_Module {

	public $slug       = 'dsm_tilt_image';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name             = esc_html__( 'Supreme Tilt Image', 'dsm-supreme-modules-pro-for-divi' );
		$this->plural           = esc_html__( 'Supreme Tilt Images', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path        = plugin_dir_path( __FILE__ ) . 'icon.svg';
		$this->main_css_element = '%%order_class%%.dsm_tilt_image';

		$this->settings_modal_toggles = array(
			'general'    => array(
				'toggles' => array(
					'main_content'  => esc_html__( 'Image', 'dsm-supreme-modules-pro-for-divi' ),
					'image'         => esc_html__( 'Image', 'dsm-supreme-modules-pro-for-divi' ),
					'tilt_settings' => esc_html__( 'Tilt Settings', 'dsm-supreme-modules-pro-for-divi' ),
					'overlay_text'  => esc_html__( 'Overlay', 'dsm-supreme-modules-pro-for-divi' ),
					'link'          => esc_html__( 'Link', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
			'advanced'   => array(
				'toggles' => array(
					'overlay'             => esc_html__( 'Overlay', 'dsm-supreme-modules-pro-for-divi' ),
					'alignment'           => esc_html__( 'Alignment', 'dsm-supreme-modules-pro-for-divi' ),
					'overlay_text_design' => esc_html__( 'Overlay Text', 'dsm-supreme-modules-pro-for-divi' ),
					'width'               => array(
						'title'    => esc_html__( 'Sizing', 'dsm-supreme-modules-pro-for-divi' ),
						'priority' => 65,
					),
				),
			),
			'custom_css' => array(
				'toggles' => array(
					'animation'  => array(
						'title'    => esc_html__( 'Animation', 'dsm-supreme-modules-pro-for-divi' ),
						'priority' => 90,
					),
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
			'fonts'          => array(
				'header'  => array(
					'label'           => esc_html__( 'Overlay Title', 'dsm-supreme-modules-pro-for-divi' ),
					'css'             => array(
						'main' => '%%order_class%% h1.dsm_tilt_overlay_title, %%order_class%% h2.dsm_tilt_overlay_title, %%order_class%% h3.dsm_tilt_overlay_title, %%order_class%% h4.dsm_tilt_overlay_title, %%order_class%% h5.dsm_tilt_overlay_title, %%order_class%% h6.dsm_tilt_overlay_title',
					),
					'font_size'       => array(
						'default' => '22px',
					),
					'line_height'     => array(
						'default' => '1em',
					),
					'letter_spacing'  => array(
						'default' => '0px',
					),
					'header_level'    => array(
						'default' => 'h3',
					),
					'hide_text_align' => true,
					'toggle_slug'     => 'overlay_text_design',
				),
				'content' => array(
					'label'           => esc_html__( 'Overlay Content', 'dsm-supreme-modules-pro-for-divi' ),
					'css'             => array(
						'main'        => "{$this->main_css_element} .dsm_tilt_overlay_content",
						'line_height' => "{$this->main_css_element} .dsm_tilt_overlay_content p",
						'text_shadow' => "{$this->main_css_element} .dsm_tilt_overlay_content",
					),
					'font_size'       => array(
						'default' => '14px',
					),
					'line_height'     => array(
						'default' => '1em',
					),
					'letter_spacing'  => array(
						'default' => '0px',
					),
					'hide_text_align' => true,
					'toggle_slug'     => 'overlay_text_design',
				),
			),
			'margin_padding' => array(
				'css' => array(
					'important' => array( 'custom_margin' ),
				),
			),
			'borders'        => array(
				'default' => array(
					'css' => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .et_pb_image_wrap img, %%order_class%% .dsm_image_overlay',
							'border_styles' => '%%order_class%% .et_pb_image_wrap img, %%order_class%% .dsm_image_overlay',
						),
					),
				),
			),
			'box_shadow'     => array(
				'default' => array(
					'css' => array(
						'main'    => '%%order_class%% .et_pb_image_wrap img',
						'overlay' => 'inset',
					),
				),
			),
			'max_width'      => array(
				'options' => array(
					'max_width' => array(
						'depends_show_if' => 'off',
					),
				),
			),
			'text'           => array(
				'use_background_layout' => true,
				'use_text_orientation'  => true,
				'css'                   => array(
					'text_shadow' => '%%order_class%% .dsm_tilt_overlay_wrapper',
				),
				'options'               => array(
					'background_layout' => array(
						'default_on_front' => 'dark',
					),
					'text_orientation'  => array(
						'default_on_front' => 'center',
					),
				),
				'toggle_slug'           => 'overlay_text_design',
			),
			'button'         => false,
			'link_options'   => false,
		);
	}

	public function get_fields() {
		return array(
			'src'                             => array(
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'upload_button_text' => esc_attr__( 'Upload an image', 'dsm-supreme-modules-pro-for-divi' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'dsm-supreme-modules-pro-for-divi' ),
				'update_text'        => esc_attr__( 'Set As Image', 'dsm-supreme-modules-pro-for-divi' ),
				'hide_metadata'      => true,
				'affects'            => array(
					'alt',
					'title_text',
				),
				'description'        => esc_html__( 'Upload your desired image, or type in the URL to the image you would like to display.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'        => 'image',
				'dynamic_content'    => 'image',
			),
			'alt'                             => array(
				'label'           => esc_html__( 'Image Alternative Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'depends_show_if' => 'on',
				'depends_on'      => array(
					'src',
				),
				'description'     => esc_html__( 'This defines the HTML ALT text. A short description of your image can be placed here.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'attributes',
				'dynamic_content' => 'text',
			),
			'title_text'                      => array(
				'label'           => esc_html__( 'Image Title Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'depends_show_if' => 'on',
				'depends_on'      => array(
					'src',
				),
				'description'     => esc_html__( 'This defines the HTML Title text.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'attributes',
				'dynamic_content' => 'text',
			),
			'show_in_lightbox'                => array(
				'label'            => esc_html__( 'Open in Lightbox', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'off',
				'default'          => 'off',
				'affects'          => array(
					'url',
					'url_new_window',
					// 'use_overlay',
				),
				'toggle_slug'      => 'link',
				'description'      => esc_html__( 'Here you can choose whether or not the image should open in Lightbox. Note: if you select to open the image in Lightbox, url options below will be ignored.', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'url'                             => array(
				'label'           => esc_html__( 'Image Link URL', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'depends_show_if' => 'off',
				'affects'         => array(
					// 'use_overlay',
				),
				'description'     => esc_html__( 'If you would like your image to be a link, input your destination URL here. No link will be created if this field is left blank.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'link',
				'dynamic_content' => 'url',
			),
			'url_new_window'                  => array(
				'label'            => esc_html__( 'Image Link Target', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'In The Same Window', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'In The New Tab', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'off',
				'depends_show_if'  => 'off',
				'toggle_slug'      => 'link',
				'description'      => esc_html__( 'Here you can choose whether or not your link opens in a new window', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'dsm_tilt_mobile'                 => array(
				'label'            => esc_html__( 'Disable on Mobile', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'layout',
				'options'          => array(
					'off' => esc_html__( 'Off', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'On', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'off',
				'default'          => 'off',
				'toggle_slug'      => 'tilt_settings',
				'description'      => esc_html__( 'This will disable the Tilt effect On mobile devices.', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'dsm_tilt_perspective'            => array(
				'label'            => esc_html__( 'Perspective', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'layout',
				'toggle_slug'      => 'tilt_settings',
				// 'mobile_options'  => true,
				'validate_unit'    => true,
				'default'          => '1000px',
				'default_unit'     => 'px',
				'default_on_front' => '1000px',
				'range_settings'   => array(
					'min'  => '500',
					'max'  => '1500',
					'step' => '1',
				),
				'description'      => esc_html__( 'Transform perspective, the lower the more extreme the tilt gets.', 'dsm-supreme-modules-pro-for-divi' ),
				// 'responsive'      => true,
			),
			'dsm_tilt_scale'                  => array(
				'label'            => esc_html__( 'Scale on Hover', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'layout',
				'toggle_slug'      => 'tilt_settings',
				// 'mobile_options'  => true,
				'validate_unit'    => true,
				'unitless'         => true,
				'default'          => '1',
				'default_unit'     => '',
				'default_on_front' => '1',
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '2',
					'step' => '0.1',
				),
				'description'      => esc_html__( 'Scale on hover. 2 = 200%, 1.5 = 150%.', 'dsm-supreme-modules-pro-for-divi' ),
				// 'hover'             => 'tabs',
				// 'responsive'      => true,
			),
			'dsm_tilt_max'                    => array(
				'label'            => esc_html__( 'Max Rotation', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'layout',
				'toggle_slug'      => 'tilt_settings',
				// 'mobile_options'  => true,
				'validate_unit'    => true,
				'unitless'         => true,
				'default'          => '35',
				'default_unit'     => '',
				'default_on_front' => '35',
				'range_settings'   => array(
					'min'  => '10',
					'max'  => '50',
					'step' => '1',
				),
				'description'      => esc_html__( 'The Max Tilt Rotation. The lower the less rotation the tilt gets.', 'dsm-supreme-modules-pro-for-divi' ),
				// 'responsive'      => true,
			),
			'dsm_tilt_speed'                  => array(
				'label'            => esc_html__( 'Speed', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'layout',
				'toggle_slug'      => 'tilt_settings',
				// 'mobile_options'  => true,
				'validate_unit'    => true,
				'unitless'         => true,
				'default'          => '300',
				'default_unit'     => '',
				'default_on_front' => '300',
				'range_settings'   => array(
					'min'  => '50',
					'max'  => '500',
					'step' => '1',
				),
				'description'      => esc_html__( 'The Speed of the enter/exit transition.', 'dsm-supreme-modules-pro-for-divi' ),
				// 'responsive'      => true,
			),
			'dsm_use_glare'                   => array(
				'label'            => esc_html__( 'Use Glare', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'layout',
				'options'          => array(
					'off' => esc_html__( 'Off', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'On', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'off',
				'toggle_slug'      => 'tilt_settings',
				'description'      => esc_html__( 'If enabled, it will have a "glare" effect on hover.', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'dsm_tilt_reverse'                => array(
				'label'            => esc_html__( 'Reverse', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'layout',
				'options'          => array(
					'off' => esc_html__( 'Off', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'On', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'on',
				'default'          => 'on',
				'toggle_slug'      => 'tilt_settings',
				'description'      => esc_html__( 'This will reverse the tilt direction.', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'dsm_tilt_glare'                  => array(
				'label'            => esc_html__( 'Glare', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'layout',
				'toggle_slug'      => 'tilt_settings',
				// 'mobile_options'  => true,
				'validate_unit'    => true,
				'unitless'         => true,
				'default'          => '1',
				'default_unit'     => '',
				'default_on_front' => '1',
				'range_settings'   => array(
					'min'  => '0.1',
					'max'  => '1',
					'step' => '0.1',
				),
				'show_if'          => array(
					'dsm_use_glare' => 'on',
				),
				'description'      => esc_html__( 'The glare opacity.', 'dsm-supreme-modules-pro-for-divi' ),
				// 'responsive'      => true,
			),
			'dsm_use_parallax'                => array(
				'label'            => esc_html__( 'Use 3D Pop Out Effect', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'layout',
				'options'          => array(
					'off' => esc_html__( 'Off', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'On', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'off',
				'toggle_slug'      => 'tilt_settings',
				'description'      => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'dsm_tilt_parallax'               => array(
				'label'            => esc_html__( 'Overlay 3D Pop out', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'layout',
				'toggle_slug'      => 'tilt_settings',
				// 'mobile_options'  => true,
				'validate_unit'    => true,
				'default'          => '30px',
				'default_unit'     => 'px',
				'default_on_front' => '30px',
				'range_settings'   => array(
					'min'  => '20',
					'max'  => '100',
					'step' => '1',
				),
				'show_if'          => array(
					'dsm_use_parallax' => 'on',
				),
				'description'      => esc_html__( 'The overlay pop out effect between the image and the overlay.', 'dsm-supreme-modules-pro-for-divi' ),
				// 'responsive'      => true,
			),
			'use_overlay'                     => array(
				'label'            => esc_html__( 'Use Icon', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'layout',
				'options'          => array(
					'off' => esc_html__( 'Off', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'On', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'off',
				'default'          => 'off',
				'affects'          => array(
					'overlay_icon_color',
					'icon',
					'use_icon_font_size',
				),
				// 'depends_show_if'   => 'on',
				'toggle_slug'      => 'overlay_text',
				'description'      => esc_html__( 'If enabled, an overlay color and icon will be displayed when a visitors hovers over the image', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'overlay_icon_color'              => array(
				'label'           => esc_html__( 'Overlay Icon Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'color-alpha',
				'custom_color'    => true,
				'depends_show_if' => 'on',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'overlay',
				'description'     => esc_html__( 'Here you can define a custom color for the overlay icon', 'dsm-supreme-modules-pro-for-divi' ),
				'hover'           => 'tabs',
				'mobile_options'  => true,
			),
			'icon'                            => array(
				'label'           => esc_html__( 'Icon', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select_icon',
				'option_category' => 'configuration',
				'default'         => 'P',
				'class'           => array( 'et-pb-font-icon' ),
				'depends_show_if' => 'on',
				'toggle_slug'     => 'overlay_text',
				'description'     => esc_html__( 'Here you can define a custom icon for the overlay', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'dsm_overlay_title'               => array(
				'label'           => esc_html__( 'Overlay Title', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'overlay_text',
				'hover'           => 'tabs',
				'dynamic_content' => 'text',
			),
			'content'                         => array(
				'label'           => esc_html__( 'Overlay Content', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'overlay_text',
				'dynamic_content' => 'text',
			),
			'dsm_overlay_on_hover'            => array(
				'label'            => esc_html__( 'Show on Hover', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'layout',
				'options'          => array(
					'off' => esc_html__( 'Off', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'On', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'off',
				'default'          => 'off',
				'mobile_options'   => true,
				'toggle_slug'      => 'overlay_text',
				'description'      => esc_html__( 'If enabled, overlay text will only show up on hover.', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'dsm_overlay_content_orientation' => array(
				'label'            => esc_html__( 'Text Vertical Alignment', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'layout',
				'options'          => array(
					'flex-start' => esc_html__( 'Top', 'dsm-supreme-modules-pro-for-divi' ),
					'center'     => esc_html__( 'Center', 'dsm-supreme-modules-pro-for-divi' ),
					'flex-end'   => esc_html__( 'Bottom', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'center',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'overlay_text_design',
				'description'      => esc_html__( 'This setting determines the vertical alignment of your content. Your content can either be vertically centered, or aligned to the bottom.', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'dsm_overlay_color'               => array(
				'label'          => esc_html__( 'Overlay Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'custom_color'   => true,
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'overlay',
				'description'    => esc_html__( 'Here you can define a custom color for the overlay', 'dsm-supreme-modules-pro-for-divi' ),
				'hover'          => 'tabs',
				'mobile_options' => true,
			),
			'use_icon_font_size'              => array(
				'label'            => esc_html__( 'Use Icon Font Size', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'font_option',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'affects'          => array(
					'icon_font_size',
				),
				'depends_show_if'  => 'on',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'overlay',
				'default_on_front' => 'off',
			),
			'icon_font_size'                  => array(
				'label'            => esc_html__( 'Icon Font Size', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'font_option',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'overlay',
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
				'hover'            => 'tabs',
			),
			'align'                           => array(
				'label'            => esc_html__( 'Image Alignment', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text_align',
				'option_category'  => 'layout',
				'options'          => et_builder_get_text_orientation_options( array( 'justified' ) ),
				'default_on_front' => 'left',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'alignment',
				'description'      => esc_html__( 'Here you can choose the image alignment.', 'dsm-supreme-modules-pro-for-divi' ),
				'options_icon'     => 'module_align',
				'mobile_options'   => true,
			),
			'force_fullwidth'                 => array(
				'label'            => esc_html__( 'Force Fullwidth', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'layout',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'off',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'width',
				'affects'          => array(
					'max_width',
				),
			),
		);
	}

	public function get_alignment( $device = 'desktop' ) {
		$is_desktop = 'desktop' === $device;
		$suffix     = ! $is_desktop ? "_{$device}" : '';
		$alignment  = $is_desktop && isset( $this->props['align'] ) ? $this->props['align'] : '';

		if ( ! $is_desktop && et_pb_responsive_options()->is_responsive_enabled( $this->props, 'align' ) ) {
			$alignment = et_pb_responsive_options()->get_any_value( $this->props, "align{$suffix}" );
		}

		return et_pb_get_alignment( $alignment );
	}

	public function get_transition_fields_css_props() {
		$fields                       = parent::get_transition_fields_css_props();
		$fields['overlay_icon_color'] = array(
			'color' => '%%order_class%% .dsm_tilt_overlay .et-pb-icon',
		);

		$fields['dsm_overlay_color'] = array(
			'background-color' => '%%order_class%% .dsm_image_overlay',
		);

		$fields['icon_font_size'] = array(
			'font-size' => '%%order_class%% .dsm_tilt_overlay .et-pb-icon',
		);

		$fields['dsm_overlay_on_hover'] = array(
			'opacity' => '%%order_class%% .dsm_tilt_overlay',
		);

		if ( et_pb_hover_options()->is_enabled( 'dsm_overlay_title', $this->props ) ) {
			$fields['dsm_overlay_title'] = array(
				'opacity' => '%%order_class%% .dsm_tilt_overlay_title_hover_on .dsm_tilt_overlay_title>span, %%order_class%% .dsm_tilt_overlay_title_hover_on .dsm_tilt_overlay_title:before, %%order_class%% .dsm_tilt_overlay_title_hover_on .dsm_tilt_overlay_title:after',
			);
		}

		return $fields;
	}

	public function render( $attrs, $content = null, $render_slug ) {
		$src              = $this->props['src'];
		$alt              = $this->props['alt'];
		$title_text       = $this->props['title_text'];
		$url              = $this->props['url'];
		$url_new_window   = $this->props['url_new_window'];
		$show_in_lightbox = $this->props['show_in_lightbox'];
		$align            = $this->get_alignment();
		$align_tablet     = $this->get_alignment( 'tablet' );
		$align_phone      = $this->get_alignment( 'phone' );
		$force_fullwidth  = $this->props['force_fullwidth'];

		$overlay_icon_color_hover       = $this->get_hover_value( 'overlay_icon_color' );
		$overlay_icon_color             = $this->props['overlay_icon_color'];
		$overlay_icon_color_tablet      = $this->props['overlay_icon_color_tablet'];
		$overlay_icon_color_phone       = $this->props['overlay_icon_color_phone'];
		$overlay_icon_color_last_edited = $this->props['overlay_icon_color_last_edited'];

		$icon                             = $this->props['icon'];
		$use_icon_font_size               = $this->props['use_icon_font_size'];
		$icon_font_size                   = $this->props['icon_font_size'];
		$icon_font_size_hover             = $this->get_hover_value( 'icon_font_size' );
		$icon_font_size_tablet            = $this->props['icon_font_size_tablet'];
		$icon_font_size_phone             = $this->props['icon_font_size_phone'];
		$icon_font_size_last_edited       = $this->props['icon_font_size_last_edited'];
		$use_overlay                      = $this->props['use_overlay'];
		$animation_style                  = $this->props['animation_style'];
		$box_shadow_style                 = $this->props['box_shadow_style'];
		$header_level                     = $this->props['header_level'];
		$background_layout                = $this->props['background_layout'];
		$background_layout_hover          = et_pb_hover_options()->get_value( 'background_layout', $this->props, 'dark' );
		$background_layout_hover_enabled  = et_pb_hover_options()->is_enabled( 'background_layout', $this->props );
		$dsm_tilt_mobile                  = $this->props['dsm_tilt_mobile'];
		$dsm_tilt_perspective             = floatval( $this->props['dsm_tilt_perspective'] );
		$dsm_tilt_scale                   = floatval( $this->props['dsm_tilt_scale'] );
		$dsm_tilt_max                     = floatval( $this->props['dsm_tilt_max'] );
		$dsm_tilt_speed                   = floatval( $this->props['dsm_tilt_speed'] );
		$dsm_tilt_reverse                 = $this->props['dsm_tilt_reverse'];
		$dsm_use_glare                    = $this->props['dsm_use_glare'];
		$dsm_tilt_glare                   = floatval( $this->props['dsm_tilt_glare'] );
		$dsm_use_parallax                 = $this->props['dsm_use_parallax'];
		$dsm_tilt_parallax                = $this->props['dsm_tilt_parallax'];
		$dsm_overlay_title                = $this->props['dsm_overlay_title'];
		$dsm_overlay_title__hover         = $this->get_hover_value( 'dsm_overlay_title' );
		$dsm_overlay_title_hover_enabled  = et_pb_hover_options()->is_enabled( 'dsm_overlay_title', $this->props );
		$dsm_overlay_on_hover             = $this->props['dsm_overlay_on_hover'];
		$dsm_overlay_on_hover_tablet      = $this->props['dsm_overlay_on_hover_tablet'];
		$dsm_overlay_on_hover_phone       = $this->props['dsm_overlay_on_hover_phone'];
		$dsm_overlay_on_hover_last_edited = $this->props['dsm_overlay_on_hover_last_edited'];
		// $dsm_overlay_content = $this->props['dsm_overlay_content'];
		$dsm_overlay_content_orientation = $this->props['dsm_overlay_content_orientation'];
		$dsm_overlay_color               = $this->props['dsm_overlay_color'];
		$dsm_overlay_color_hover         = $this->get_hover_value( 'dsm_overlay_color' );
		$dsm_overlay_color_tablet        = $this->props['dsm_overlay_color_tablet'];
		$dsm_overlay_color_phone         = $this->props['dsm_overlay_color_phone'];
		$dsm_overlay_color_last_edited   = $this->props['dsm_overlay_color_last_edited'];
		$video_background                = $this->video_background();
		$parallax_image_background       = $this->get_parallax_image_background();

		$image_style_hover = '';
		$icon_selector     = "{$this->main_css_element} .dsm_tilt_overlay .et-pb-icon";

		// Handle svg image behaviour
		$src_pathinfo = pathinfo( $src );
		$is_src_svg   = isset( $src_pathinfo['extension'] ) ? 'svg' === $src_pathinfo['extension'] : false;

		// overlay can be applied only if image has link or if lightbox enabled
		$is_overlay_applied = 'on' === $use_overlay || ( 'on' === $show_in_lightbox || ( 'off' === $show_in_lightbox && '' !== $url ) ) ? 'on' : 'off';

		if ( 'on' === $force_fullwidth ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%',
					'declaration' => 'max-width: 100% !important;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .et_pb_image_wrap, %%order_class%% img',
					'declaration' => 'width: 100%;',
				)
			);
		}

		// Responsive Image Alignment.
		// Set CSS properties and values for the image alignment.
		// 1. Text Align is necessary, just set it from current image alignment value.
		// 2. Margin {Side} is optional. Used to pull the image to right/left side.
		// 3. Margin Left and Right are optional. Used by Center to reset custom margin of point 2.
		$align_values = array(
			'desktop' => array(
				'text-align'      => esc_html( $align ),
				"margin-{$align}" => ! empty( $align ) && 'center' !== $align ? '0' : '',
			),
			'tablet'  => array(
				'text-align'             => esc_html( $align_tablet ),
				'margin-left'            => 'left' !== $align_tablet ? 'auto' : '',
				'margin-right'           => 'left' !== $align_tablet ? 'auto' : '',
				"margin-{$align_tablet}" => ! empty( $align_tablet ) && 'center' !== $align_tablet ? '0' : '',
			),
			'phone'   => array(
				'text-align'            => esc_html( $align_phone ),
				'margin-left'           => 'left' !== $align_phone ? 'auto' : '',
				'margin-right'          => 'left' !== $align_phone ? 'auto' : '',
				"margin-{$align_phone}" => ! empty( $align_phone ) && 'center' !== $align_phone ? '0' : '',
			),
		);

		et_pb_responsive_options()->generate_responsive_css( $align_values, '%%order_class%%', '', $render_slug, '', 'alignment' );

		if ( 'center' !== $align ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%',
					'declaration' => sprintf(
						'margin-%1$s: 0;',
						esc_html( $align )
					),
				)
			);
		}

		if ( 'center' !== $dsm_overlay_content_orientation ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_tilt_overlay',
					'declaration' => sprintf(
						'align-items: %1$s;',
						esc_html( $dsm_overlay_content_orientation )
					),
				)
			);
		}

		if ( 'on' === $use_overlay ) {
			if ( '' !== $overlay_icon_color ) {
				$icon_style        = sprintf( 'color: %1$s;', esc_attr( $overlay_icon_color ) );
				$icon_tablet_style = '' !== $overlay_icon_color_tablet ? sprintf( 'color: %1$s;', esc_attr( $overlay_icon_color_tablet ) ) : '';
				$icon_phone_style  = '' !== $overlay_icon_color_phone ? sprintf( 'color: %1$s;', esc_attr( $overlay_icon_color_phone ) ) : '';
				$icon_style_hover  = '';

				if ( et_builder_is_hover_enabled( 'overlay_icon_color', $this->props ) ) {
					$icon_style_hover = sprintf( 'color: %1$s;', esc_attr( $overlay_icon_color_hover ) );
				}

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => $icon_selector,
						'declaration' => $icon_style,
					)
				);

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
		}

		if ( '' !== $dsm_overlay_color ) {
			$overlay_color_style        = sprintf( 'background-color: %1$s;', esc_html( $dsm_overlay_color ) );
			$overlay_color_tablet_style = '' !== $dsm_overlay_color_tablet ? sprintf( 'background-color: %1$s;', esc_html( $dsm_overlay_color_tablet ) ) : '';
			$overlay_color_phone_style  = '' !== $dsm_overlay_color_phone ? sprintf( 'background-color: %1$s;', esc_html( $dsm_overlay_color_phone ) ) : '';
			$overlay_color_style_hover  = '';

			if ( et_builder_is_hover_enabled( 'dsm_overlay_color', $this->props ) ) {
				$overlay_color_style_hover = sprintf( 'background-color: %1$s;', esc_html( $dsm_overlay_color_hover ) );
			}

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_image_overlay',
					'declaration' => $overlay_color_style,
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_image_overlay',
					'declaration' => $overlay_color_tablet_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_image_overlay',
					'declaration' => $overlay_color_phone_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			if ( '' !== $overlay_color_style_hover ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => $this->add_hover_to_order_class( '%%order_class%% .dsm_image_overlay' ),
						'declaration' => $overlay_color_style_hover,
					)
				);
			}
		}

		$data_icon = '' !== $icon
			? sprintf(
				'%1$s',
				esc_attr( et_pb_process_font_icon( $icon ) )
			)
			: '';

		$overlay_icon_output = sprintf(
			'<span class="et-pb-icon">%1$s</span>',
			$data_icon
		);

		$overlay_output = '';

		if ( 'off' !== $use_overlay || '' !== $dsm_overlay_title || '' !== $content ) {
			$overlay_output = sprintf(
				'<div class="dsm_tilt_overlay%3$s%4$s">
					<div class="dsm_tilt_overlay_wrapper">
						%5$s
						%1$s
						%2$s
					</div>
				</div>',
				( '' !== $dsm_overlay_title ? sprintf(
					'<%1$s class="dsm_tilt_overlay_title"%3$s><span>%2$s</span></%1$s>',
					et_pb_process_header_level( $header_level, 'h4' ),
					esc_attr( $dsm_overlay_title ),
					( $dsm_overlay_title_hover_enabled ? sprintf(
						' data-overlay-title-hover="%1$s"%',
						esc_attr( $dsm_overlay_title__hover )
					) : '' )
				) : '' ),
				( '' !== $this->content ? sprintf(
					'<div class="dsm_tilt_overlay_content">%1$s</div>',
					$this->content
				) : '' ),
				esc_attr( " et_pb_bg_layout_{$background_layout}" ),
				$this->get_text_orientation_classname(),
				'off' !== $use_overlay ? $overlay_icon_output : ''
			);
		}

		// Set display block for svg image to avoid disappearing svg image
		if ( $is_src_svg ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .et_pb_image_wrap',
					'declaration' => 'display: block;',
				)
			);
		}

		$box_shadow_overlay_wrap_class = 'none' !== $box_shadow_style
			? 'has-box-shadow-overlay'
			: '';

		$box_shadow_overlay_element = 'none' !== $box_shadow_style
			? '<div class="box-shadow-overlay"></div>'
			: '';

		$output = sprintf(
			'<span class="et_pb_image_wrap %5$s">%7$s%6$s<img src="%1$s" alt="%2$s"%3$s />%4$s</span>',
			esc_attr( $src ),
			esc_attr( $alt ),
			( '' !== $title_text ? sprintf( ' title="%1$s"', esc_attr( $title_text ) ) : '' ),
			'on' === $is_overlay_applied || 'off' !== $use_overlay || '' !== $dsm_overlay_title || '' !== $content ? $overlay_output : '',
			$box_shadow_overlay_wrap_class,
			$box_shadow_overlay_element,
			//( '' !== $dsm_overlay_title || '' !== $content ? $overlay_output : '' ),
			( '' !== $dsm_overlay_color ? sprintf( '<span class="dsm_image_overlay"></span>' ) : '' )
		);

		if ( 'off' !== $use_icon_font_size ) {

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
		}

		if ( 'on' === $dsm_use_parallax ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tilt-image-wrapper',
					'declaration' => 'transform-style: preserve-3d; -webkit-transform-style: preserve-3d;',
				)
			);
			if ( 'on' === $is_overlay_applied ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .et_overlay',
						'declaration' => sprintf(
							'transform: translateZ(%1$s);',
							esc_html( $dsm_tilt_parallax )
						),
					)
				);
			}
			if ( '' !== $dsm_overlay_title || '' !== $content ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm_tilt_overlay',
						'declaration' => sprintf(
							'transform: translateZ(%1$s);',
							esc_html( $dsm_tilt_parallax )
						),
					)
				);
			}
		}

		if ( '' !== $dsm_overlay_on_hover || '' !== $dsm_overlay_on_hover_tablet || '' !== $dsm_overlay_on_hover_phone ) {
			$dsm_overlay_on_hover_active = et_pb_get_responsive_status( $dsm_overlay_on_hover_last_edited );

			$dsm_overlay_on_hover_values = array(
				'desktop' => $dsm_overlay_on_hover,
				'tablet'  => $dsm_overlay_on_hover_active ? $dsm_overlay_on_hover_tablet : '',
				'phone'   => $dsm_overlay_on_hover_active ? $dsm_overlay_on_hover_phone : '',
			);

			if ( 'off' === $dsm_overlay_on_hover ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm_tilt_overlay',
						'declaration' => 'opacity: 1;',
					)
				);
			}

			if ( 'off' === $dsm_overlay_on_hover_tablet ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm_tilt_overlay',
						'declaration' => 'opacity: 1;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			} else {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm_tilt_overlay:hover',
						'declaration' => 'opacity: 1;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}
			if ( 'off' === $dsm_overlay_on_hover_phone ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm_tilt_overlay',
						'declaration' => 'opacity: 1;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			} else {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm_tilt_overlay:hover',
						'declaration' => 'opacity: 1;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}
			if ( 'off' === $dsm_overlay_on_hover_tablet && 'on' === $dsm_overlay_on_hover_phone ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm_tilt_overlay:hover',
						'declaration' => 'opacity: 0;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}
		}

		wp_enqueue_script( 'dsm-tilt-image' );

		// Module classnames
		$class = 'dsm-tilt-image-wrapper';
		if ( ! in_array( $animation_style, array( '', 'none' ) ) ) {
			$this->add_classname( 'et-waypoint' );
		}

		if ( 'on' === $is_overlay_applied ) {
			$class .= ' et_pb_has_overlay';
		}

		if ( 'on' === $dsm_overlay_on_hover ) {
			$class .= ' dsm_overlay_on_hover';
		}

		if ( $dsm_overlay_title_hover_enabled && 'off' === $dsm_overlay_on_hover ) {
			$class .= ' dsm_tilt_overlay_title_hover_on';
		}

		// Render module content
		$output = sprintf(
			'<%7$s%3$s class="%2$s%9$s%10$s"%6$s%8$s%11$s>
				%5$s
				%4$s
				%1$s
			</%7$s>',
			$output,
			esc_attr( $class ),
			$this->module_id(),
			$video_background,
			$parallax_image_background,
			sprintf(
				' data-tilt data-tilt-max="%1$s" data-tilt-speed="%2$s" data-tilt-perspective="%3$s" data-tilt-scale="%4$s" data-tilt-mobile-disable="%7$s"%5$s%6$s',
				esc_attr( $dsm_tilt_max ),
				esc_attr( $dsm_tilt_speed ),
				esc_attr( $dsm_tilt_perspective ),
				esc_attr( $dsm_tilt_scale ),
				( 'off' !== $dsm_use_glare ? esc_attr( " data-tilt-glare data-tilt-max-glare=$dsm_tilt_glare" ) : '' ),
				( 'off' !== $dsm_tilt_reverse ? ' data-tilt-reverse="true"' : ' data-tilt-reverse="false"' ),
				esc_attr( $dsm_tilt_mobile )
			),
			( '' !== $url || 'on' === $show_in_lightbox ? 'a' : 'div' ),
			( '' !== $url ? sprintf(
				' href="%1$s"%2$s',
				esc_url( $url ),
				( 'on' === $url_new_window ? ' target="_blank"' : '' )
			) : '' ),
			( '' !== $url ? ' dsm_tilt_image_link' : '' ),
			( 'on' === $show_in_lightbox ? ' et_pb_lightbox_image dsm_tilt_image_link' : '' ),
			( 'on' === $show_in_lightbox ? sprintf(
				' href="%1$s" title="%2$s"',
				esc_attr( $src ),
				esc_attr( $alt )
			) : '' )
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

new DSM_Tilt_Image();
