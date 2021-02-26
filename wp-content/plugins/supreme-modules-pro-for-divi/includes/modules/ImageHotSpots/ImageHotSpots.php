<?php

class DSM_Image_Hotspots extends ET_Builder_Module {

	public $slug       = 'dsm_image_hotspots';
	public $vb_support = 'on';
	public $child_slug = 'dsm_image_hotspots_child';

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name             = esc_html__( 'Supreme Image Hotspots', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path        = plugin_dir_path( __FILE__ ) . 'icon.svg';
		$this->main_css_element = '%%order_class%%';
		// Toggle settings
		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Image', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'hotspot_fonts'    => esc_html__( 'Hotspot Text', 'dsm-supreme-modules-pro-for-divi' ),
					'hotspot_settings' => esc_html__( 'Hotspot Settings', 'dsm-supreme-modules-pro-for-divi' ),
					'icon_settings'    => esc_html__( 'Hotspot Icon', 'dsm-supreme-modules-pro-for-divi' ),
					'tooltip_settings' => esc_html__( 'Tooltip Settings', 'dsm-supreme-modules-pro-for-divi' ),
					'header'           => array(
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
					'body'             => array(
						'title'    => esc_html__( 'Tooltip Body', 'dsm-supreme-modules-pro-for-divi' ),
						'priority' => 49,
					),
					'text'             => array(
						'title'    => esc_html__( 'Text', 'dsm-supreme-modules-pro-for-divi' ),
						'priority' => 49,
					),
					'image_settings'   => array(
						'title'    => esc_html__( 'Image', 'dsm-supreme-modules-pro-for-divi' ),
						'priority' => 70,
					),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'        => array(
				'text'            => array(
					'label'             => esc_html__( 'Hotspot Text', 'dsm-supreme-modules-pro-for-divi' ),
					'css'               => array(
						'main' => '%%order_class%% .dsm_image_hotspots_child .dsm_image_hotspots_wrapper .dsm_image_hotspots_text',
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
					'text_color'        => array(
						'default' => '#ffffff',
					),
					'hide_header_level' => true,
					'hide_text_align'   => true,
					'hide_text_shadow'  => false,
					'tab_slug'          => 'advanced',
					'toggle_slug'       => 'hotspot_fonts',
				),
				'header'          => array(
					'label'       => esc_html__( 'Heading', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => "{$this->main_css_element} .dsm_image_hotspot_tooltip_wrapper.tippy-tooltip h1",
					),
					'font_size'   => array(
						'default' => absint( et_get_option( 'body_header_size', '30' ) ) . 'px',
					),
					'toggle_slug' => 'header',
					'sub_toggle'  => 'h1',
				),
				'header_2'        => array(
					'label'       => esc_html__( 'Heading 2', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => "{$this->main_css_element} .dsm_image_hotspot_tooltip_wrapper.tippy-tooltip h2",
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
				'header_3'        => array(
					'label'       => esc_html__( 'Heading 3', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => "{$this->main_css_element} .dsm_image_hotspot_tooltip_wrapper.tippy-tooltip h3",
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
				'header_4'        => array(
					'label'       => esc_html__( 'Heading 4', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => "{$this->main_css_element} .dsm_image_hotspot_tooltip_wrapper.tippy-tooltip h4",
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
				'header_5'        => array(
					'label'       => esc_html__( 'Heading 5', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => "{$this->main_css_element} .dsm_image_hotspot_tooltip_wrapper.tippy-tooltip h5",
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
				'header_6'        => array(
					'label'       => esc_html__( 'Heading 6', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => "{$this->main_css_element} .dsm_image_hotspot_tooltip_wrapper.tippy-tooltip h6",
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
				'body'            => array(
					'label'          => esc_html__( 'Tooltip Body', 'et_builder' ),
					'css'            => array(
						'main'        => "{$this->main_css_element} .dsm_image_hotspot_tooltip_wrapper.tippy-tooltip .dsm_image_tooltip_content",
						'line_height' => "{$this->main_css_element} .dsm_image_hotspot_tooltip_wrapper.tippy-tooltip p",
						'text_align'  => "{$this->main_css_element} .dsm_image_hotspot_tooltip_wrapper.tippy-tooltip",
						'text_shadow' => "{$this->main_css_element} .dsm_image_hotspot_tooltip_wrapper.tippy-tooltip",
					),
					'block_elements' => array(
						'tabbed_subtoggles' => true,
						'bb_icons_support'  => true,
						'css'               => array(
							'main' => "{$this->main_css_element} .dsm_image_hotspot_tooltip_wrapper.tippy-tooltip",
						),
					),
				),
				'tooltip_content' => array(
					'label'             => esc_html__( 'Tooltip Content', 'dsm-supreme-modules-pro-for-divi' ),
					'css'               => array(
						'main' => '%%order_class%% .dsm_image_hotspot_tooltip_wrapper.tippy-tooltip .dsm_image_tooltip_content',
					),
					'font_size'         => array(
						'default' => '14px',
					),
					'line_height'       => array(
						'default' => '1.4em',
					),
					'letter_spacing'    => array(
						'default' => '0px',
					),
					'hide_header_level' => true,
					'hide_text_shadow'  => false,
					'tab_slug'          => 'advanced',
					'toggle_slug'       => 'tooltip_fonts',
				),
			),
			'borders'      => array(
				'default' => array(
					'css' => array(
						'main' => array(
							'border_radii'  => '%%order_class%%:not(.tippy-popper)',
							'border_styles' => '%%order_class%%:not(.tippy-popper)',
						),
					),
				),
				'hotspot' => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dsm_image_hotspots_child .dsm_image_hotspots_wrapper',
							'border_styles' => '%%order_class%% .dsm_image_hotspots_child .dsm_image_hotspots_wrapper',
						),
					),
					'defaults'     => array(
						'border_radii' => 'on|50px|50px|50px|50px',
					),
					'label_prefix' => esc_html__( 'Hotspot', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'hotspot_settings',
				),

			),
			'box_shadow'   => array(
				'default' => array(
					'css' => array(
						'main' => '%%order_class%%:not(.tippy-popper)',
					),
				),
				'image'   => array(
					'label'             => esc_html__( 'Image Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'option_category'   => 'layout',
					'tab_slug'          => 'advanced',
					'toggle_slug'       => 'image_settings',
					'css'               => array(
						'main' => '%%order_class%% img.dsm_image_hotspots_img',
					),
					'default_on_fronts' => array(
						'color'    => '',
						'position' => '',
					),
				),
			),
			'text'         => false,
			'text_shadow'  => array(
				// Don't add text-shadow fields since they already are via font-options
				'default' => false,
			),
			'button'       => false,
			'link_options' => false,

		);
	}

	public function get_fields() {
		$et_accent_color = et_builder_accent_color();
		return array(
			'src'                      => array(
				'label'              => esc_html__( 'Image', 'dsm-supreme-modules-pro-for-divi' ),
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
				'toggle_slug'        => 'main_content',
				'dynamic_content'    => 'image',
				'mobile_options'     => true,
				'hover'              => 'tabs',
			),
			'alt'                      => array(
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
			'title_text'               => array(
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
			'align'                    => array(
				'label'            => esc_html__( 'Image Alignment', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text_align',
				'option_category'  => 'layout',
				'options'          => et_builder_get_text_orientation_options( array( 'justified' ) ),
				'default_on_front' => 'left',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'image_settings',
				'description'      => esc_html__( 'Here you can choose the image alignment.', 'dsm-supreme-modules-pro-for-divi' ),
				'options_icon'     => 'module_align',
				'mobile_options'   => true,
			),
			'force_fullwidth'          => array(
				'label'            => esc_html__( 'Force Fullwidth', 'dsm-supreme-modules-pro-for-divi' ),
				'description'      => esc_html__( "When enabled, this will force your image to extend 100% of the width of the column it's in.", 'dsm-supreme-modules-pro-for-divi' ),
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
					'width',
				),
			),
			'hotspot_event'            => array(
				'label'            => esc_html__( 'Trigger Event', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'layout',
				'options'          => array(
					'mouseenter' => esc_html__( 'Hover', 'dsm-supreme-modules-pro-for-divi' ),
					'click'      => esc_html__( 'Click', 'dsm-supreme-modules-pro-for-divi' ),
					// 'show' => esc_html__( 'Show Always', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'hotspot_settings',
				'description'      => esc_html__( 'Here you can choose whether to show the tooltip by hovering or clicking.', 'dsm-supreme-modules-pro-for-divi' ),
				'default_on_front' => 'mouseenter',
				'default'          => 'mouseenter',
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
			'icon_color'               => array(
				'label'          => esc_html__( 'Icon Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( 'Here you can define a custom color for your icon.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'icon_settings',
				'hover'          => 'tabs',
				'mobile_options' => true,
				'default'        => '#ffffff',
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
			'tooltip_delay'            => array(
				'label'            => esc_html__( 'Tooltip Delay Show', 'dsm-supreme-modules-pro-for-divi' ),
				'description'      => esc_html__( 'Adjust the delay of the tooltip showing.' ),
				'type'             => 'range',
				'option_category'  => 'layout',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'tooltip_settings',
				'validate_unit'    => false,
				'default_on_front' => '50',
				'default'          => '50',
				'default_unit'     => '',
				'allowed_units'    => array( '' ),
				'allow_empty'      => false,
				'range_settings'   => array(
					'min'  => '0',
					'max'  => '1000',
					'step' => '1',
				),
			),
			'tooltip_delay_hide'       => array(
				'label'            => esc_html__( 'Tooltip Delay Hide', 'dsm-supreme-modules-pro-for-divi' ),
				'description'      => esc_html__( 'Adjust the delay of the tooltip hiding.' ),
				'type'             => 'range',
				'option_category'  => 'layout',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'tooltip_settings',
				'validate_unit'    => false,
				'default_on_front' => '50',
				'default'          => '50',
				'default_unit'     => '',
				'allowed_units'    => array( '' ),
				'allow_empty'      => false,
				'range_settings'   => array(
					'min'  => '0',
					'max'  => '1000',
					'step' => '1',
				),
			),
			/*
			'pulse_animation' => array(
				'label'           => esc_html__( 'Use Pulse Animation', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'animation',
				'description' => esc_html__( 'Here you can choose whether hotspot should have pulse animation.', 'dsm-supreme-modules-pro-for-divi' ),
				'default_on_front'=> 'off',
				'affects'         => array(
					'border_radii_pulse',
					'border_styles_pulse',
					'pulse_background_color',
				),
			),
			'pulse_background_color' => array(
				'default'           => $et_accent_color,
				'label'             => esc_html__( 'Background Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'              => 'color-alpha',
				'description'       => esc_html__( 'Here you can define a custom background color for your pulse animtion.', 'dsm-supreme-modules-pro-for-divi' ),
				'depends_show_if'   => 'on',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'animation',
				'hover'             => 'tabs',
				'mobile_options'    => true,
				'depends_show_if' => 'on',
			),*/
		);
	}

	public function get_transition_fields_css_props() {
		$icon_selector = '%%order_class%% .dsm_image_hotspots_child .dsm_image_hotspots_icon';

		$fields = parent::get_transition_fields_css_props();

		$fields['icon_color'] = array(
			'color' => $icon_selector,
		);

		$fields['icon_font_size'] = array(
			'font-size' => $icon_selector,
		);

		return $fields;
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


	public function render( $attrs, $content = null, $render_slug ) {
		$multi_view      = et_pb_multi_view_options( $this );
		$src             = $this->props['src'];
		$alt             = $this->props['alt'];
		$title_text      = $this->props['title_text'];
		$align           = $this->get_alignment();
		$align_tablet    = $this->get_alignment( 'tablet' );
		$align_phone     = $this->get_alignment( 'phone' );
		$force_fullwidth = $this->props['force_fullwidth'];

		$hotspot_event               = $this->props['hotspot_event'];
		$hotspot_padding             = $this->props['hotspot_padding'];
		$hotspot_padding_hover       = $this->get_hover_value( 'hotspot_padding' );
		$hotspot_padding_values      = et_pb_responsive_options()->get_property_values( $this->props, 'hotspot_padding' );
		$hotspot_padding_tablet      = isset( $hotspot_padding_values['tablet'] ) ? $hotspot_padding_values['tablet'] : '';
		$hotspot_padding_phone       = isset( $hotspot_padding_values['phone'] ) ? $hotspot_padding_values['phone'] : '';
		$hotspot_padding_last_edited = $this->props['hotspot_padding_last_edited'];

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

		$tooltip_background_color        = $this->props['tooltip_background_color'];
		$tooltip_background_color_tablet = $this->props['tooltip_background_color_tablet'];
		$tooltip_background_color_phone  = $this->props['tooltip_background_color_phone'];

		$tooltip_padding             = $this->props['tooltip_padding'];
		$tooltip_padding_hover       = $this->get_hover_value( 'tooltip_padding' );
		$tooltip_padding_values      = et_pb_responsive_options()->get_property_values( $this->props, 'tooltip_padding' );
		$tooltip_padding_tablet      = isset( $tooltip_padding_values['tablet'] ) ? $tooltip_padding_values['tablet'] : '';
		$tooltip_padding_phone       = isset( $tooltip_padding_values['phone'] ) ? $tooltip_padding_values['phone'] : '';
		$tooltip_padding_last_edited = $this->props['tooltip_padding_last_edited'];

		$tooltip_max_width             = $this->props['tooltip_max_width'];
		$tooltip_max_width_hover       = $this->get_hover_value( 'tooltip_max_width' );
		$tooltip_max_width_values      = et_pb_responsive_options()->get_property_values( $this->props, 'tooltip_max_width' );
		$tooltip_max_width_tablet      = isset( $tooltip_max_width_values['tablet'] ) ? $tooltip_max_width_values['tablet'] : '';
		$tooltip_max_width_phone       = isset( $tooltip_max_width_values['phone'] ) ? $tooltip_max_width_values['phone'] : '';
		$tooltip_max_width_last_edited = $this->props['tooltip_max_width_last_edited'];

		$tooltip_delay      = $this->props['tooltip_delay'];
		$tooltip_delay_hide = $this->props['tooltip_delay_hide'];
		/*
		$pulse_animation                = $this->props['pulse_animation'];
		$pulse_background_color = $this->props['pulse_background_color'];
		*/

		$box_shadow_style = self::$_->array_get( $this->props, 'box_shadow_style', '' );

		$video_background          = $this->video_background();
		$parallax_image_background = $this->get_parallax_image_background();

		$content = $this->content;

		$hotspot_selector                  = '%%order_class%% .dsm_image_hotspots_child';
		$hotspot_wrapper_selector          = '%%order_class%% .dsm_image_hotspots_child .dsm_image_hotspots_wrapper';
		$icon_selector                     = '%%order_class%% .dsm_image_hotspots_child .dsm_image_hotspots_icon, .et-db #et-boc .et-l %%order_class%% .dsm_image_hotspots_child .et-pb-icon.dsm_image_hotspots_icon';
		$pulse_selector                    = '%%order_class%% .dsm_image_hotspots_child .dsm_image_hotspots_wrapper.dsm_image_hotspot_pulse:before';
		$tooltip_background_color_selector = '%%order_class%% .dsm_image_hotspot_tooltip_wrapper.tippy-tooltip';
		$tooltip_selector                  = '%%order_class%% .dsm_image_hotspot_tooltip_wrapper .tippy-content';

		// Handle svg image behaviourv
		$src_pathinfo = pathinfo( $src );
		$is_src_svg   = isset( $src_pathinfo['extension'] ) ? 'svg' === $src_pathinfo['extension'] : false;

		if ( 'on' === $force_fullwidth ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_image_hotspots_img_wrap, %%order_class%% .dsm_image_hotspots_img_wrap img',
					'declaration' => 'width: 100%; max-width: 100% !important;',
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

		// Set display block for svg image to avoid disappearing svg image
		if ( $is_src_svg ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_image_hotspots_img_wrap',
					'declaration' => 'display: block;',
				)
			);
		}

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

		// Tooltip
		$tooltip_max_width_style        = sprintf( 'max-width: %1$s;', esc_attr( $tooltip_max_width ) );
		$tooltip_max_width_tablet_style = '' !== $tooltip_max_width_tablet ? sprintf( 'max-width: %1$s;', esc_attr( $tooltip_max_width_tablet ) ) : '';
		$tooltip_max_width_phone_style  = '' !== $tooltip_max_width_phone ? sprintf( 'max-width: %1$s;', esc_attr( $tooltip_max_width_phone ) ) : '';

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => $tooltip_selector,
				'declaration' => $tooltip_max_width_style,
			)
		);

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
					'selector'    => '%%order_class%% .dsm_image_hotspot_tooltip_wrapper.tippy-tooltip[data-placement^=left]>.tippy-arrow',
					'declaration' => sprintf(
						'border-left-color: %1$s;',
						esc_html( $tooltip_background_color )
					),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_image_hotspot_tooltip_wrapper.tippy-tooltip[data-placement^=right]>.tippy-arrow',
					'declaration' => sprintf(
						'border-right-color: %1$s;',
						esc_html( $tooltip_background_color )
					),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_image_hotspot_tooltip_wrapper.tippy-tooltip[data-placement^=bottom]>.tippy-arrow',
					'declaration' => sprintf(
						'border-bottom-color: %1$s;',
						esc_html( $tooltip_background_color )
					),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_image_hotspot_tooltip_wrapper.tippy-tooltip[data-placement^=top]>.tippy-arrow',
					'declaration' => sprintf(
						'border-top-color: %1$s;',
						esc_html( $tooltip_background_color )
					),
				)
			);

		}

		$box_shadow_overlay_wrap_class = 'none' !== $box_shadow_style
			? ' has-box-shadow-overlay'
			: '';

		$box_shadow_overlay_element = 'none' !== $box_shadow_style
			? '<div class="box-shadow-overlay"></div>'
			: '';

		$image_html = $multi_view->render_element(
			array(
				'tag'      => 'img',
				'attrs'    => array(
					'src'   => '{{src}}',
					'alt'   => '{{alt}}',
					'title' => '{{title_text}}',
				),
				'required' => 'src',
			)
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
			$tooltip_selector
		);

		$output = sprintf(
			'<div class="dsm_image_hotspots_wrap%2$s" data-dsm-hotspot="%8$s" data-tippy-delay="[%5$s, %6$s]" data-tippy-trigger="%7$s">%3$s<div class="dsm_image_hotspots_img_wrap">%1$s</div>%4$s</div>',
			$image_html,
			$box_shadow_overlay_wrap_class,
			$box_shadow_overlay_element,
			$content,
			esc_attr( $tooltip_delay ),
			esc_attr( $tooltip_delay_hide ),
			'mouseenter' === $hotspot_event ? 'mouseenter focus' : 'click',
			ET_Builder_Element::get_module_order_class( $render_slug )
		);

		wp_enqueue_script( 'dsm-image-hotspots' );
		// Render module content.
		$output = sprintf(
			'%3$s
			%2$s
			%1$s
			',
			$output,
			$video_background,
			$parallax_image_background
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

new DSM_Image_Hotspots();
