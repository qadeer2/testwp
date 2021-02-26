<?php

class DSM_Business_Hours extends ET_Builder_Module {

	public $slug       = 'dsm_business_hours';
	public $vb_support = 'on';
	public $child_slug = 'dsm_business_hours_child';

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name      = esc_html__( 'Supreme Business Hours', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path = plugin_dir_path( __FILE__ ) . 'icon.svg';
		// Toggle settings
		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Business Days & Timings', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'separator' => array(
						'title'    => esc_html__( 'Separator', 'dsm-supreme-modules-pro-for-divi' ),
						'priority' => 70,
					),
					'divider'   => array(
						'title'    => esc_html__( 'Divider', 'dsm-supreme-modules-pro-for-divi' ),
						'priority' => 70,
					),
					/*
					'image'          => array(
						'title'    => esc_html__( 'Image', 'dsm-supreme-modules-pro-for-divi' ),
						'priority' => 69,
					),*/
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'          => array(
				'text'   => array(
					'label'             => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
					'css'               => array(
						'main' => '%%order_class%% .dsm_business_hours_child',
					),
					'font_size'         => array(
						'default' => '14px',
					),
					'line_height'       => array(
						'default' => '1.7em',
					),
					'letter_spacing'    => array(
						'default' => '0px',
					),
					'hide_header_level' => true,
					'hide_text_align'   => true,
					'hide_text_shadow'  => true,
					'tab_slug'          => 'advanced',
					'toggle_slug'       => 'text',
				),
				'header' => array(
					'label'             => esc_html__( 'Day', 'dsm-supreme-modules-pro-for-divi' ),
					'css'               => array(
						'main' => '%%order_class%% .dsm-business-hours-day',
					),
					'font_size'         => array(
						'default' => '14px',
					),
					'line_height'       => array(
						'default' => '1.7em',
					),
					'letter_spacing'    => array(
						'default' => '0px',
					),
					'hide_header_level' => true,
					'hide_text_align'   => true,
				),
				'time'   => array(
					'label'           => esc_html__( 'Time', 'dsm-supreme-modules-pro-for-divi' ),
					'css'             => array(
						'main' => '%%order_class%% .dsm-business-hours-time',
					),
					'font_size'       => array(
						'default' => '14px',
					),
					'line_height'     => array(
						'default' => '1.7em',
					),
					'letter_spacing'  => array(
						'default' => '0px',
					),
					'hide_text_align' => true,
				),
			),
			'text'           => array(
				'use_text_orientation'  => false,
				'use_background_layout' => false,
				'css'                   => array(
					'text_shadow' => '%%order_class%% .dsm_business_hours_child',
				),
			),
			'margin_padding' => array(
				'css' => array(
					'important' => 'all',
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
				/*
				'image'   => array(
					'css'             => array(
						'main' => array(
							'border_radii' => "%%order_class%% .dsm-business-hours-image img",
							'border_styles' => "%%order_class%% .dsm-business-hours-image img",
						)
					),
					'label_prefix'    => esc_html__( 'Image', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'          => 'advanced',
					'toggle_slug'       => 'image',
				),*/
			),
			'box_shadow'     => array(
				'default' => array(
					'css' => array(
						'main' => '%%order_class%%',
					),
				),
				/*
				'image'   => array(
					'label'               => esc_html__( 'Image Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'option_category'     => 'layout',
					'tab_slug'          => 'advanced',
					'toggle_slug'       => 'image',
					'css'                 => array(
						'main' => '%%order_class%% .dsm-business-hours-image img',
					),
					'default_on_fronts'  => array(
						'color'    => '',
						'position' => '',
					),
				),*/
			),
		);
	}

	public function get_fields() {
		return array(
			'content_orientation'               => array(
				'label'           => esc_html__( 'Vertical Alignment', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'flex-start' => esc_html__( 'Top', 'dsm-supreme-modules-pro-for-divi' ),
					'center'     => esc_html__( 'Center', 'dsm-supreme-modules-pro-for-divi' ),
					'flex-end'   => esc_html__( 'Bottom', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'         => 'center',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'text',
				'description'     => esc_html__( 'This setting determines the vertical alignment of your content. Your content can either be align to the top, vertically centered, or aligned to the bottom.', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'separator_style'                   => array(
				'label'           => esc_html__( 'Style', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'none'   => esc_html__( 'None', 'dsm-supreme-modules-pro-for-divi' ),
					'solid'  => esc_html__( 'Solid', 'dsm-supreme-modules-pro-for-divi' ),
					'dotted' => esc_html__( 'Dotted', 'dsm-supreme-modules-pro-for-divi' ),
					'dashed' => esc_html__( 'Dashed', 'dsm-supreme-modules-pro-for-divi' ),
					'double' => esc_html__( 'Double', 'dsm-supreme-modules-pro-for-divi' ),
					'groove' => esc_html__( 'Groove', 'dsm-supreme-modules-pro-for-divi' ),
					'ridge'  => esc_html__( 'Ridge', 'dsm-supreme-modules-pro-for-divi' ),
					'inset'  => esc_html__( 'Inset', 'dsm-supreme-modules-pro-for-divi' ),
					'outset' => esc_html__( 'Outset', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'         => 'none',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'separator',
			),
			'separator_weight'                  => array(
				'label'            => esc_html__( 'Weight', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'default'          => '2px',
				'default_on_front' => '2px',
				'default_unit'     => 'px',
				'range_settings'   => array(
					'min'  => '0',
					'max'  => '10',
					'step' => '1',
				),
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'separator',
				'show_if_not'      => array(
					'separator_style' => 'none',
				),
			),
			'separator_color'                   => array(
				'default'     => '#333',
				'label'       => esc_html__( 'Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( 'Here you can define a custom color for your separator.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'separator',
				'show_if_not' => array(
					'separator_style' => 'none',
				),
			),
			'separator_gap'                     => array(
				'label'            => esc_html__( 'Gap Spacing', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'default'          => '10px',
				'default_on_front' => '10px',
				'default_unit'     => 'px',
				'range_settings'   => array(
					'min'  => '0',
					'max'  => '40',
					'step' => '1',
				),
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'separator',
			),
			'divider_style'                     => array(
				'label'           => esc_html__( 'Style', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'none'   => esc_html__( 'None', 'dsm-supreme-modules-pro-for-divi' ),
					'solid'  => esc_html__( 'Solid', 'dsm-supreme-modules-pro-for-divi' ),
					'dotted' => esc_html__( 'Dotted', 'dsm-supreme-modules-pro-for-divi' ),
					'dashed' => esc_html__( 'Dashed', 'dsm-supreme-modules-pro-for-divi' ),
					'double' => esc_html__( 'Double', 'dsm-supreme-modules-pro-for-divi' ),
					'groove' => esc_html__( 'Groove', 'dsm-supreme-modules-pro-for-divi' ),
					'ridge'  => esc_html__( 'Ridge', 'dsm-supreme-modules-pro-for-divi' ),
					'inset'  => esc_html__( 'Inset', 'dsm-supreme-modules-pro-for-divi' ),
					'outset' => esc_html__( 'Outset', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'         => 'none',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'divider',
			),
			'divider_weight'                    => array(
				'label'            => esc_html__( 'Weight', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'default'          => '1px',
				'default_on_front' => '1px',
				'default_unit'     => 'px',
				'range_settings'   => array(
					'min'  => '0',
					'max'  => '20',
					'step' => '1',
				),
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'divider',
				'show_if_not'      => array(
					'divider_style' => 'none',
				),
			),
			'divider_color'                     => array(
				'default'     => 'rgba(0,0,0,0.12)',
				'label'       => esc_html__( 'Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( 'Here you can define a custom color for your divider.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'divider',
				'show_if_not' => array(
					'divider_style' => 'none',
				),
			),
			'item_padding'                      => array(
				'label'           => esc_html__( 'Item Padding', 'et_builder' ),
				'type'            => 'custom_padding',
				'mobile_options'  => true,
				'option_category' => 'layout',
				'description'     => esc_html__( 'Adjust padding to specific values, or leave blank to use the default padding.', 'et_builder' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'margin_padding',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
			),
			'background_striped'                => array(
				'label'            => esc_html__( 'Use Striped Background', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'          => 'off',
				'default_on_front' => 'off',
				'toggle_slug'      => 'background',
				'description'      => esc_html__( 'Here you can choose whether or not the background of each row should be in zebra-striping.', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'background_striped_odd_row_color'  => array(
				'default'     => '#f9f9f9',
				'label'       => esc_html__( 'Striped Odd Background Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( 'Here you can define a custom color for your odd row.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug' => 'background',
				'show_if'     => array(
					'background_striped' => 'on',
				),
			),
			'background_striped_even_row_color' => array(
				'default'     => '#fff',
				'label'       => esc_html__( 'Striped Even Background Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( 'Here you can define a custom color for your even row.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug' => 'background',
				'show_if'     => array(
					'background_striped' => 'on',
				),
			),
			/*
			'image_max_width' => array(
				'label'           => esc_html__( 'Image Width', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'image',
				'mobile_options'  => true,
				'validate_unit'   => true,
				'depends_show_if' => 'off',
				'default'         => '50%',
				'default_unit'    => '%',
				'default_on_front'=> '',
				'allow_empty'     => true,
				'range_settings'  => array(
					'min'  => '0',
					'max'  => '50',
					'step' => '1',
				),
				'responsive'      => true,
			),
			'image_spacing' => array(
				'label'           => esc_html__( 'Image Gap Spacing', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'image',
				'mobile_options'  => true,
				'validate_unit'   => true,
				'default'         => '25px',
				'default_unit'    => 'px',
				'default_on_front'=> '',
				'allow_empty'     => true,
				'range_settings'  => array(
					'min'  => '0',
					'max'  => '50',
					'step' => '1',
				),
				'responsive'      => true,
			),*/
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		$separator_style                   = $this->props['separator_style'];
		$separator_weight                  = $this->props['separator_weight'];
		$separator_color                   = $this->props['separator_color'];
		$separator_gap                     = $this->props['separator_gap'];
		$divider_style                     = $this->props['divider_style'];
		$divider_weight                    = $this->props['divider_weight'];
		$divider_color                     = $this->props['divider_color'];
		$content_orientation               = $this->props['content_orientation'];
		$background_striped                = $this->props['background_striped'];
		$background_striped_odd_row_color  = $this->props['background_striped_odd_row_color'];
		$background_striped_even_row_color = $this->props['background_striped_even_row_color'];
		/*
		$image_max_width             = $this->props['image_max_width'];
		$image_max_width_tablet      = $this->props['image_max_width_tablet'];
		$image_max_width_phone       = $this->props['image_max_width_phone'];
		$image_max_width_last_edited = $this->props['image_max_width_last_edited'];
		$image_spacing = $this->props['image_spacing'];
		$image_spacing_tablet      = $this->props['image_spacing_tablet'];
		$image_spacing_phone       = $this->props['image_spacing_phone'];
		$image_spacing_last_edited = $this->props['image_spacing_last_edited'];
		*/
		$item_padding_hover       = $this->get_hover_value( 'item_padding' );
		$item_padding             = $this->props['item_padding'];
		$item_padding_tablet      = $this->props['item_padding_tablet'];
		$item_padding_phone       = $this->props['item_padding_phone'];
		$item_padding_last_edited = $this->props['item_padding_last_edited'];

		/*
		if ( '' !== $image_max_width_tablet || '' !== $image_max_width_phone || '' !== $image_max_width ) {
			$image_max_width_responsive_active = et_pb_get_responsive_status( $image_max_width_last_edited );

			$image_max_width_values = array(
				'desktop' => $image_max_width,
				'tablet'  => $image_max_width_responsive_active ? $image_max_width_tablet : '',
				'phone'   => $image_max_width_responsive_active ? $image_max_width_phone : '',
			);

			et_pb_generate_responsive_css( $image_max_width_values, '%%order_class%% .dsm-business-hours-image', 'max-width', $render_slug );
		}

		if ( '' !== $image_spacing_tablet || '' !== $image_spacing_phone || '' !== $image_spacing ) {
			$image_spacing_responsive_active = et_pb_get_responsive_status( $image_spacing_last_edited );

			$image_spacing_values = array(
				'desktop' => $image_spacing,
				'tablet'  => $image_spacing_responsive_active ? $image_spacing_tablet : '',
				'phone'   => $image_spacing_responsive_active ? $image_spacing_phone : '',
			);

			et_pb_generate_responsive_css( $image_spacing_values, '%%order_class%% .dsm-business-hours-image', 'margin-right', $render_slug );
		}*/

		$this->apply_custom_margin_padding(
			$render_slug,
			'item_padding',
			'padding',
			'%%order_class%% .dsm_business_hours_item_wrapper'
		);

		if ( 'none' !== $separator_style ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-business-hours-separator',
					'declaration' => sprintf(
						'border-bottom-style: %1$s;',
						esc_attr( $separator_style )
					),
				)
			);
		}

		if ( '2px' !== $separator_weight ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-business-hours-separator',
					'declaration' => sprintf(
						'border-bottom-width: %1$s;',
						esc_attr( $separator_weight )
					),
				)
			);
		}

		if ( '' !== $separator_color ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-business-hours-separator',
					'declaration' => sprintf(
						'border-bottom-color: %1$s;',
						esc_html( $separator_color )
					),
				)
			);
		}

		if ( '10px' !== $separator_gap ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-business-hours-separator',
					'declaration' => sprintf(
						'margin-left: %1$s; margin-right: %1$s;',
						esc_attr( $separator_gap )
					),
				)
			);
		}

		if ( 'none' !== $divider_style ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_business_hours_child:not(:last-child)',
					'declaration' => sprintf(
						'border-bottom-style: %1$s;',
						esc_attr( $divider_style )
					),
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_business_hours_child:not(:last-child)',
					'declaration' => sprintf(
						'border-bottom-width: %1$s;',
						esc_attr( $divider_weight )
					),
				)
			);
		}

		if ( '' !== $divider_color ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_business_hours_child:not(:last-child)',
					'declaration' => sprintf(
						'border-bottom-color: %1$s;',
						esc_html( $divider_color )
					),
				)
			);
		}

		if ( 'center' !== $content_orientation ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_business_hours_child>div',
					'declaration' => sprintf(
						'align-items: %1$s;',
						esc_attr( $content_orientation )
					),
				)
			);
		}

		if ( 'off' !== $background_striped ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_business_hours_child:nth-of-type(odd)',
					'declaration' => sprintf(
						'background-color: %1$s;',
						esc_html( $background_striped_odd_row_color )
					),
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_business_hours_child:nth-of-type(even)',
					'declaration' => sprintf(
						'background-color: %1$s;',
						esc_html( $background_striped_even_row_color )
					),
				)
			);
		}

		// Render module content
		$output = sprintf(
			'%1$s',
			et_core_sanitized_previously( $this->content )
		);

		return $output;
	}
	/*credits https://github.com/elegantthemes/create-divi-extension/issues/125#issuecomment-445442095*/
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
	}
}

new DSM_Business_Hours();
