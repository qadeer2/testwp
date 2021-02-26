<?php

class DSM_Icon_Divider extends ET_Builder_Module {

	public $slug       = 'dsm_icon_divider';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name      = esc_html__( 'Supreme Icon Divider', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path = plugin_dir_path( __FILE__ ) . 'icon.svg';

		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'image'      => esc_html__( 'Image & Icon', 'dsm-supreme-modules-pro-for-divi' ),
					'visibility' => esc_html__( 'Visibility', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'icon_settings' => esc_html__( 'Image & Icon', 'dsm-supreme-modules-pro-for-divi' ),
					'alignment'     => esc_html__( 'Alignment', 'dsm-supreme-modules-pro-for-divi' ),
					'color'         => esc_html__( 'Color', 'dsm-supreme-modules-pro-for-divi' ),
					'styles'        => esc_html__( 'Styles', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
		);

		$style_option_name    = sprintf( '%1$s-divider_style', $this->slug );
		$global_divider_style = ET_Global_Settings::get_value( $style_option_name );

		$this->defaults = array(
			'divider_style' => $global_divider_style && '' !== $global_divider_style ? $global_divider_style : 'solid',
		);

	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'          => false,
			'borders'        => array(
				'default' => array(),
				'image'   => array(
					'css'             => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dsm-icon-divider-image .dsm-icon-divider-image-wrap',
							'border_styles' => '%%order_class%% .dsm-icon-divider-image .dsm-icon-divider-image-wrap',
						),
					),
					'label_prefix'    => esc_html__( 'Image', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'icon_settings',
					'depends_on'      => array( 'use_icon' ),
					'depends_show_if' => 'off',
				),
			),
			'box_shadow'     => array(
				'default' => array(),
				'image'   => array(
					'label'             => esc_html__( 'Image Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'option_category'   => 'layout',
					'tab_slug'          => 'advanced',
					'toggle_slug'       => 'icon_settings',
					'depends_show_if'   => 'off',
					'css'               => array(
						'main'        => '%%order_class%% .dsm-icon-divider-image .dsm-icon-divider-image-wrap',
						'show_if_not' => array(
							'use_icon' => 'on',
						),
					),
					'default_on_fronts' => array(
						'color'    => '',
						'position' => '',
					),
				),
			),
			'margin_padding' => array(
				'css' => array(
					'important' => array( 'custom_margin' ), // needed to overwrite last module margin-bottom styling
				),
			),
			'text'           => false,
			'filters'        => array(
				'child_filters_target' => array(
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'icon_settings',
					'depends_show_if' => 'off',
				),
			),
			'icon_settings'  => array(
				'css' => array(
					'main' => '%%order_class%% .dsm-icon-divider-image',
				),
			),
			'button'         => false,
		);
	}

	public function get_fields() {
		$et_accent_color = et_builder_accent_color();

		/*
		$image_icon_placement = array(
			'top' => esc_html__( 'Top', 'dsm-supreme-modules-pro-for-divi' ),
		);

		if ( ! is_rtl() ) {
			$image_icon_placement['left'] = esc_html__( 'Left', 'dsm-supreme-modules-pro-for-divi' );
		} else {
			$image_icon_placement['right'] = esc_html__( 'Right', 'dsm-supreme-modules-pro-for-divi' );
		}*/

		return array(
			'use_icon'            => array(
				'label'            => esc_html__( 'Use Icon', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'basic_option',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'image',
				'affects'          => array(
					'border_radii_image',
					'border_styles_image',
					'box_shadow_style_image',
					'font_icon',
					'image_max_width',
					'use_icon_font_size',
					'use_circle',
					'icon_color',
					'image',
					'alt',
					'child_filter_hue_rotate',
					'child_filter_saturate',
					'child_filter_brightness',
					'child_filter_contrast',
					'child_filter_invert',
					'child_filter_sepia',
					'child_filter_opacity',
					'child_filter_blur',
					'child_mix_blend_mode',
				),
				'description'      => esc_html__( 'Here you can choose whether icon set below should be used.', 'dsm-supreme-modules-pro-for-divi' ),
				'default_on_front' => 'off',
			),
			'font_icon'           => array(
				'label'           => esc_html__( 'Icon', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select_icon',
				'option_category' => 'basic_option',
				'class'           => array( 'et-pb-font-icon' ),
				'toggle_slug'     => 'image',
				'description'     => esc_html__( 'Choose an icon to display with your blurb.', 'dsm-supreme-modules-pro-for-divi' ),
				'depends_show_if' => 'on',
			),
			'icon_color'          => array(
				'default'         => $et_accent_color,
				'label'           => esc_html__( 'Icon Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'color-alpha',
				'description'     => esc_html__( 'Here you can define a custom color for your icon.', 'dsm-supreme-modules-pro-for-divi' ),
				'depends_show_if' => 'on',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'icon_settings',
			),
			'use_circle'          => array(
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
			'circle_color'        => array(
				'default'         => $et_accent_color,
				'label'           => esc_html__( 'Circle Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'color-alpha',
				'description'     => esc_html__( 'Here you can define a custom color for the icon circle.', 'dsm-supreme-modules-pro-for-divi' ),
				'depends_show_if' => 'on',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'icon_settings',
			),
			'use_circle_border'   => array(
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
			'circle_border_color' => array(
				'default'         => $et_accent_color,
				'label'           => esc_html__( 'Circle Border Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'color-alpha',
				'description'     => esc_html__( 'Here you can define a custom color for the icon circle border.', 'dsm-supreme-modules-pro-for-divi' ),
				'depends_show_if' => 'on',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'icon_settings',
			),
			'image'               => array(
				'label'              => esc_html__( 'Image', 'dsm-supreme-modules-pro-for-divi' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'upload_button_text' => esc_attr__( 'Upload an image', 'dsm-supreme-modules-pro-for-divi' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'dsm-supreme-modules-pro-for-divi' ),
				'update_text'        => esc_attr__( 'Set As Image', 'dsm-supreme-modules-pro-for-divi' ),
				'depends_show_if'    => 'off',
				'description'        => esc_html__( 'Upload an image to display at the top of your blurb.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'        => 'image',
			),
			'alt'                 => array(
				'label'           => esc_html__( 'Image Alt Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Define the HTML ALT text for your image here.', 'dsm-supreme-modules-pro-for-divi' ),
				'depends_show_if' => 'off',
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'attributes',
			),
			/*
			'icon_placement' => array(
				'label'             => esc_html__( 'Image/Icon Placement', 'dsm-supreme-modules-pro-for-divi' ),
				'type'              => 'select',
				'option_category'   => 'layout',
				'options'           => $image_icon_placement,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'icon_settings',
				'description'       => esc_html__( 'Here you can choose where to place the icon.', 'dsm-supreme-modules-pro-for-divi' ),
				'default_on_front'  => 'top',
			),
			*/
			'image_max_width'     => array(
				'label'            => esc_html__( 'Image Width', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'layout',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'width',
				'mobile_options'   => true,
				'validate_unit'    => true,
				'depends_show_if'  => 'off',
				'default'          => '50%',
				'default_unit'     => '%',
				'default_on_front' => '',
				'allow_empty'      => true,
				'range_settings'   => array(
					'min'  => '0',
					'max'  => '100',
					'step' => '1',
				),
				'responsive'       => true,
			),
			'use_icon_font_size'  => array(
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
				'toggle_slug'      => 'icon_settings',
				'default_on_front' => 'off',
			),
			'icon_font_size'      => array(
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
			'align'               => array(
				'label'            => esc_html__( 'Alignment', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text_align',
				'option_category'  => 'layout',
				'options'          => et_builder_get_text_orientation_options( array( 'justified' ) ),
				'default_on_front' => 'center',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'alignment',
				'description'      => esc_html__( 'Here you can choose the divider alignment.', 'dsm-supreme-modules-pro-for-divi' ),
				'options_icon'     => 'module_align',
			),
			'color'               => array(
				'default'     => et_builder_accent_color(),
				'label'       => esc_html__( 'Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'tab_slug'    => 'advanced',
				'description' => esc_html__( 'This will adjust the color of the 1px divider line.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug' => 'color',
			),
			'divider_style'       => array(
				'label'           => esc_html__( 'Divider Style', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => et_builder_get_border_styles(),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'styles',
				'default'         => $this->defaults['divider_style'],
			),
			'divider_position'    => array(
				'label'           => esc_html__( 'Divider Position', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'flex-start' => esc_html__( 'Top', 'dsm-supreme-modules-pro-for-divi' ),
					'center'     => esc_html__( 'Vertically Centered', 'dsm-supreme-modules-pro-for-divi' ),
					'flex-end'   => esc_html__( 'Bottom', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'styles',
				'default'         => 'center',
			),
			'divider_weight'      => array(
				'label'           => esc_html__( 'Divider Weight', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'depends_show_if' => 'on',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'width',
				'default_unit'    => 'px',
				'default'         => '1px',
			),
			'icon_gap'            => array(
				'label'           => esc_html__( 'Icon Gap', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'depends_show_if' => 'on',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'width',
				'default_unit'    => 'px',
				'default'         => '10px',
			),
			/*
			'height' => array(
				'label'           => esc_html__( 'Height', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'width',
				'description'     => esc_html__( 'Define how much space should be added below the divider.', 'dsm-supreme-modules-pro-for-divi' ),
				'default'         => '23px',
				'default_unit'    => 'px',
				'default_on_front' => '23px',
			),*/
		);
	}

	public function get_alignment() {
		$alignment = isset( $this->props['align'] ) ? $this->props['align'] : '';

		return et_pb_get_alignment( $alignment );
	}

	public function render( $attrs, $content = null, $render_slug ) {
		$image = $this->props['image'];
		$alt   = $this->props['alt'];
		//$icon_placement        = $this->props['icon_placement'];
		$font_icon                   = $this->props['font_icon'];
		$use_icon                    = $this->props['use_icon'];
		$use_circle                  = $this->props['use_circle'];
		$use_circle_border           = $this->props['use_circle_border'];
		$icon_color                  = $this->props['icon_color'];
		$circle_color                = $this->props['circle_color'];
		$circle_border_color         = $this->props['circle_border_color'];
		$use_icon_font_size          = $this->props['use_icon_font_size'];
		$icon_font_size              = $this->props['icon_font_size'];
		$icon_font_size_tablet       = $this->props['icon_font_size_tablet'];
		$icon_font_size_phone        = $this->props['icon_font_size_phone'];
		$icon_font_size_last_edited  = $this->props['icon_font_size_last_edited'];
		$image_max_width             = $this->props['image_max_width'];
		$image_max_width_tablet      = $this->props['image_max_width_tablet'];
		$image_max_width_phone       = $this->props['image_max_width_phone'];
		$image_max_width_last_edited = $this->props['image_max_width_last_edited'];
		$color                       = $this->props['color'];
		//$height           = $this->props['height'];
		$divider_style    = $this->props['divider_style'];
		$divider_position = $this->props['divider_position'];
		$divider_weight   = $this->props['divider_weight'];
		$icon_gap         = $this->props['icon_gap'];
		$align            = $this->get_alignment();

		$video_background          = $this->video_background();
		$parallax_image_background = $this->get_parallax_image_background();

		$image_pathinfo = pathinfo( $image );
		$is_image_svg   = isset( $image_pathinfo['extension'] ) ? 'svg' === $image_pathinfo['extension'] : false;

		if ( 'off' !== $use_icon_font_size ) {
			$font_size_responsive_active = et_pb_get_responsive_status( $icon_font_size_last_edited );

			$font_size_values = array(
				'desktop' => $icon_font_size,
				'tablet'  => $font_size_responsive_active ? $icon_font_size_tablet : '',
				'phone'   => $font_size_responsive_active ? $icon_font_size_phone : '',
			);

			et_pb_responsive_options()->generate_responsive_css( $font_size_values, '%%order_class%% .et-pb-icon', 'font-size', $render_slug );
		}

		if ( '' !== $image_max_width_tablet || '' !== $image_max_width_phone || '' !== $image_max_width || $is_image_svg ) {
			$is_size_px = false;

			// If size is given in px, we want to override parent width
			if (
				false !== strpos( $image_max_width, 'px' ) ||
				false !== strpos( $image_max_width_tablet, 'px' ) ||
				false !== strpos( $image_max_width_phone, 'px' )
			) {
				$is_size_px = true;
			}
			// SVG image overwrite. SVG image needs its value to be explicit
			if ( '' === $image_max_width && $is_image_svg ) {
				$image_max_width = '100%';
			}

			$image_max_width_selector = $is_image_svg ? '%%order_class%% .dsm-icon-divider-image' : '%%order_class%% .dsm-icon-divider-image';
			$image_max_width_property = ( $is_image_svg || $is_size_px ) ? 'width' : 'max-width';

			$image_max_width_responsive_active = et_pb_get_responsive_status( $image_max_width_last_edited );

			$image_max_width_values = array(
				'desktop' => $image_max_width,
				'tablet'  => $image_max_width_responsive_active ? $image_max_width_tablet : '',
				'phone'   => $image_max_width_responsive_active ? $image_max_width_phone : '',
			);

			et_pb_responsive_options()->generate_responsive_css( $image_max_width_values, $image_max_width_selector, $image_max_width_property, $render_slug );
		}

		/*
		if ( 'center' !== $content_orientation) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%%',
				'declaration' => sprintf(
					'align-items: %1$s;',
					esc_attr( $content_orientation )
				),
			) );
		}*/

		if ( 'off' === $use_icon ) {
			$image = ( '' !== trim( $image ) ) ? sprintf(
				'<img src="%1$s" alt="%2$s" />',
				esc_url( $image ),
				esc_attr( $alt )
				//esc_attr( " et_pb_animation_{$animation}" )
			) : '';
		} else {
			$icon_style = sprintf( 'color: %1$s;', esc_attr( $icon_color ) );

			if ( 'on' === $use_circle ) {
				$icon_style .= sprintf( ' background-color: %1$s;', esc_attr( $circle_color ) );

				if ( 'on' === $use_circle_border ) {
					$icon_style .= sprintf( ' border-color: %1$s;', esc_attr( $circle_border_color ) );
				}
			}

			$image = ( '' !== $font_icon ) ? sprintf(
				'<span class="et-pb-icon%2$s%3$s" style="%4$s">%1$s</span>',
				esc_attr( et_pb_process_font_icon( $font_icon ) ),
				//esc_attr( " et_pb_animation_{$animation}" ),
				( 'on' === $use_circle ? ' et-pb-icon-circle' : '' ),
				( 'on' === $use_circle && 'on' === $use_circle_border ? ' et-pb-icon-circle-border' : '' ),
				$icon_style
			) : '';
		}

		// Images: Add CSS Filters and Mix Blend Mode rules (if set)
		$generate_css_image_filters = '';
		if ( $image && array_key_exists( 'icon_settings', $this->advanced_fields ) && array_key_exists( 'css', $this->advanced_fields['icon_settings'] ) ) {
			$generate_css_image_filters = $this->generate_css_filters(
				$render_slug,
				'child_',
				self::$data_utils->array_get( $this->advanced_fields['icon_settings']['css'], 'main', '%%order_class%%' )
			);
		}

		$image = $image ? sprintf( '<span class="dsm-icon-divider-image-wrap">%1$s</span>', $image ) : '';
		$image = $image ? sprintf(
			'<div class="dsm-icon-divider-image%2$s">%1$s</div>',
			$image,
			esc_attr( $generate_css_image_filters )
		) : '';

		if ( '' !== $color ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-divider',
					'declaration' => sprintf(
						'border-top-color: %1$s;',
						esc_html( $color )
					),
				)
			);
		}

		if ( '' !== $divider_style ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-divider',
					'declaration' => sprintf(
						'border-top-style: %1$s;',
						esc_attr( $divider_style )
					),
				)
			);
		}

		if ( '' !== $divider_weight ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-divider',
					'declaration' => sprintf(
						'border-top-width: %1$s;',
						esc_attr( $divider_weight )
					),
				)
			);
		}

		if ( '10px' !== $icon_gap ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-icon-divider-image',
					'declaration' => sprintf(
						'margin: 0 %1$s;',
						esc_attr( $icon_gap )
					),
				)
			);
		}

		if ( 'left' === $align ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-icon-divider-image',
					'declaration' => sprintf(
						'margin: 0 %1$s 0 0;',
						esc_attr( $icon_gap )
					),
				)
			);
		}

		if ( 'right' === $align ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-icon-divider-image',
					'declaration' => sprintf(
						'margin: 0 0 0 %1$s;',
						esc_attr( $icon_gap )
					),
				)
			);
		}

		if ( 'center' !== $divider_position ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-icon-divider-image',
					'declaration' => sprintf(
						'align-items: %1$s;',
						esc_attr( $divider_position )
					),
				)
			);
		}

		/*
		if ( '' !== $height ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .dsm-icon-divider-wrapper',
				'declaration' => sprintf(
					'height: %1$s;',
					esc_attr( et_builder_process_range_value( $height ) )
				),
			) );
		}*/

		$class = "dsm-icon-divider-wrapper dsm-icon-divider-align-{$align}";

		// Render module content
		$output = sprintf(
			'<div%3$s class="%2$s">
				%5$s
				%4$s
				<div class="dsm-icon-divider-before dsm-divider"></div>
				%1$s
				<div class="dsm-icon-divider-after dsm-divider"></div>
			</div>',
			$image,
			esc_attr( $class ),
			$this->module_id(),
			$video_background,
			$parallax_image_background
		);

		return $output;
		//return $this->_render_module_wrapper( $output, $render_slug );
	}
}

new DSM_Icon_Divider;
