<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2020 Elicus Technologies Private Limited
 * @version     1.4.2
 */
class DIPL_LogoSlider extends ET_Builder_Module {

	public $slug       = 'dipl_logo_slider';
	public $child_slug = 'dipl_logo_slider_item';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name = esc_html__( 'DP Logo Slider', 'divi-plus' );
	}

	public function get_settings_modal_toggles() {
		return array(
			'general'  => array(
				'toggles' => array(
					'main_content' => array(
						'title'    => esc_html__( 'Slider Content', 'divi-plus' ),
						'priority' => 1,
					),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'slider_arrow_control'      => array(
						'title'    => esc_html__( 'Slider Arrow', 'divi-plus' ),
						'priority' => 1,
					),
					'slider_pagination_control' => array(
						'title'    => esc_html__( 'Slider Pagination', 'divi-plus' ),
						'priority' => 2,
					),
					'slider_slide_control'      => array(
						'title'    => esc_html__( 'Slide Styling', 'divi-plus' ),
						'priority' => 3,
					),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'                 => false,
			'text'                  => false,
			'link_options'          => false,
			'custom_margin_padding' => array(
				'css' => array(
					'main'      => '%%order_class%%',
					'important' => 'all',
				),
			),
		);
	}

	public function get_fields() {

		return array(
			'logo_per_slide'               => array(
				'label'           => esc_html__( 'Number of Logo Per View', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'1'  => esc_html__( '1', 'divi-plus' ),
					'2'  => esc_html__( '2', 'divi-plus' ),
					'3'  => esc_html__( '3', 'divi-plus' ),
					'4'  => esc_html__( '4', 'divi-plus' ),
					'5'  => esc_html__( '5', 'divi-plus' ),
					'6'  => esc_html__( '6', 'divi-plus' ),
					'7'  => esc_html__( '7', 'divi-plus' ),
					'8'  => esc_html__( '8', 'divi-plus' ),
					'9'  => esc_html__( '9', 'divi-plus' ),
					'10' => esc_html__( '10', 'divi-plus' ),
				),
				'default'         => '6',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can choose the number of logos you want to display per slide.', 'divi-plus' ),
			),
			'show_arrow'                   => array(
				'label'           => esc_html__( 'Show Arrows', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default'         => 'on',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'slider_arrow_control',
				'description'     => esc_html__( 'Here you can choose whether or not to display previous & next arrow on the slider.', 'divi-plus' ),
			),
			'show_arrow_on_hover'          => array(
				'label'           => esc_html__( 'Show Arrows Only On Hover', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'show_if'         => array(
					'show_arrow' => 'on',
				),
				'default'         => 'off',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'slider_arrow_control',
				'description'     => esc_html__( 'Here you can choose whether or not to display previous and next arrow on hover.', 'divi-plus' ),
			),
			'arrow_font_size'              => array(
				'label'           => esc_html__( 'Arrow Font Size', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'range_settings'  => array(
					'min'  => '10',
					'max'  => '100',
					'step' => '1',
				),
				'show_if'         => array(
					'show_arrow' => 'on',
				),
				'show_if_not'     => array(
					'show_arrow' => 'off',
				),
				'default'         => '18px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'slider_arrow_control',
				'description'     => esc_html__( 'Move the slider or input the value to increse or decrease the size of arrows.', 'divi-plus' ),
			),
			'arrow_color'                  => array(
				'label'        => esc_html__( 'Arrow Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if'      => array(
					'show_arrow' => 'on',
				),
				'show_if_not'  => array(
					'show_arrow' => 'off',
				),
				'default'      => '#007aff',
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'slider_arrow_control',
				'description'  => esc_html__( 'Here you can choose a custom color to be used for arrows.', 'divi-plus' ),
			),
			'use_arrow_background'         => array(
				'label'           => esc_html__( 'Select Arrow Shape', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'show_if'         => array(
					'show_arrow' => 'on',
				),
				'default'         => 'off',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'slider_arrow_control',
				'description'     => esc_html__( 'Here you can choose whehter or not to apply shape on arrows.', 'divi-plus' ),
			),
			'arrow_background_color'       => array(
				'label'        => esc_html__( 'Arrow Background', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if'      => array(
					'show_arrow'           => 'on',
					'use_arrow_background' => 'on',
				),
				'show_if_not'  => array(
					'show_arrow' => 'off',
				),
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'slider_arrow_control',
				'description'  => esc_html__( 'Here you can choose a custom color to be used for the shape background of arrows.', 'divi-plus' ),
			),
			'arrow_background_border_size' => array(
				'label'           => esc_html__( 'Arrow Background Border', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '10',
					'step' => '1',
				),
				'show_if'         => array(
					'show_arrow'           => 'on',
					'use_arrow_background' => 'on',
				),
				'show_if_not'     => array(
					'show_arrow' => 'off',
				),
				'default'         => '0px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'slider_arrow_control',
				'description'     => esc_html__( 'Move the slider or input the value to increase or decrease the border size of the arrow background.', 'divi-plus' ),
			),
			'arrow_shape_border_color'     => array(
				'label'        => esc_html__( 'Arrow Shape Border Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if'      => array(
					'show_arrow'           => 'on',
					'use_arrow_background' => 'on',
				),
				'show_if_not'  => array(
					'show_arrow' => 'off',
				),
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'slider_arrow_control',
				'description'  => esc_html__( 'Here you can choose a custom color to be used for the arrow shape border', 'divi-plus' ),
			),
			'show_control_dot'             => array(
				'label'           => esc_html__( 'Show Pagination', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default'         => 'on',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'slider_pagination_control',
				'description'     => esc_html__( 'Here you choose whether or not to display pagination on the logo slider.', 'divi-plus' ),
			),
			'control_dot_active_color'     => array(
				'label'        => esc_html__( 'Active Pagination Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if'      => array(
					'show_control_dot' => 'on',
				),
				'show_if_not'  => array(
					'show_control_dot' => 'off',
				),
				'default'      => '#000000',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'slider_pagination_control',
				'description'  => esc_html__( 'Here you can choose a custom color to be used for the pagination of an active item.', 'divi-plus' ),
			),
			'control_dot_inactive_color'   => array(
				'label'        => esc_html__( 'Inactive Pagination Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if'      => array(
					'show_control_dot' => 'on',
				),
				'show_if_not'  => array(
					'show_control_dot' => 'off',
				),
				'default'      => '#007aff',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'slider_pagination_control',
				'description'  => esc_html__( 'Here you can choose a custom color to be used for the pagination of inactive items.', 'divi-plus' ),
			),
			'slider_loop'                  => array(
				'label'           => esc_html__( 'Enable Loop', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default'         => 'off',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'animation',
				'description'     => esc_html__( 'Here you can choose whether or not to enable loop for the logo slider.', 'divi-plus' ),
			),
			'autoplay'                     => array(
				'label'           => esc_html__( 'Autoplay', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default'         => 'on',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'animation',
				'description'     => esc_html__( 'Here you can choose whether or not to autoplay logo slider.', 'divi-plus' ),
			),
			'autoplay_speed'               => array(
				'label'           => esc_html__( 'Autoplay Delay', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'default'         => '3000',
				'show_if'         => array(
					'autoplay' => 'on',
				),
				'show_if_not'     => array(
					'autoplay' => 'off',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'animation',
				'description'     => esc_html__( 'Here you can input the value to delay autoplay after a complete transition of the logo slider.', 'divi-plus' ),
			),
			'transition_duration'          => array(
				'label'           => esc_html__( 'Transition Duration', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'default'         => '1000',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'animation',
				'description'     => esc_html__( 'Here you can input the value to delay each slide in a transition.', 'divi-plus' ),
			),
			'pause_on_hover'               => array(
				'label'           => esc_html__( 'Pause On Hover', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default'         => 'on',
				'show_if'         => array(
					'autoplay' => 'on',
				),
				'show_if_not'     => array(
					'autoplay' => 'off',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'animation',
				'description'     => esc_html__( 'Here you can choose whether or not to pause slides on mouse hover.', 'divi-plus' ),
			),
			'slide_alignment'              => array(
				'label'           => esc_html__( 'Slide Image Aligmnet', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'top'    => esc_html__( 'Top', 'divi-plus' ),
					'center' => esc_html__( 'Center', 'divi-plus' ),
					'bottom' => esc_html__( 'Bottom', 'divi-plus' ),
				),
				'default'         => 'center',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'slider_slide_control',
				'description'     => esc_html__( 'Here you can place logo images at top, center, and bottom of the slider.', 'divi-plus' ),
			),
			'slide_image_width'            => array(
				'label'           => esc_html__( 'Slide Image Width', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'range_settings'  => array(
					'min'  => '100',
					'max'  => '500',
					'step' => '1',
				),
				'default'         => '150px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'slider_slide_control',
				'description'     => esc_html__( 'Move the slider or input the value to increase or decrease width of the slide images.', 'divi-plus' ),
			),
			'slide_image_height'           => array(
				'label'           => esc_html__( 'Slide Image Container Height', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'range_settings'  => array(
					'min'  => '100',
					'max'  => '500',
					'step' => '1',
				),
				'default'         => '150px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'slider_slide_control',
				'description'     => esc_html__( 'Move the slider or input the value to increase or decrease height of the slide image container.', 'divi-plus' ),
			),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {

		$show_arrow                     = esc_attr( $this->props['show_arrow'] );
		$show_arrow_on_hover            = esc_attr( $this->props['show_arrow_on_hover'] );
		$arrow_color                    = esc_attr( $this->props['arrow_color'] );
		$arrow_color_hover              = esc_attr( $this->get_hover_value( 'arrow_color' ) );
		$use_arrow_background           = esc_attr( $this->props['use_arrow_background'] );
		$arrow_background_color         = esc_attr( $this->props['arrow_background_color'] );
		$arrow_background_color_hover   = esc_attr( $this->get_hover_value( 'arrow_background_color' ) );
		$arrow_background_border_size   = esc_attr( $this->props['arrow_background_border_size'] );
		$arrow_shape_border_color       = esc_attr( $this->props['arrow_shape_border_color'] );
		$arrow_shape_border_color_hover = esc_attr( $this->get_hover_value( 'arrow_shape_border_color' ) );
		$show_control                   = esc_attr( $this->props['show_control_dot'] );
		$control_dot_active_color       = esc_attr( $this->props['control_dot_active_color'] );
		$control_dot_inactive_color     = esc_attr( $this->props['control_dot_inactive_color'] );
		$slide_alignment                = esc_attr( $this->props['slide_alignment'] ) ? esc_attr( $this->props['slide_alignment'] ) : 'center';
		$slide_image_width              = esc_attr( $this->props['slide_image_width'] );
		$slide_image_height             = esc_attr( $this->props['slide_image_height'] );
		$order_class                    = $this->get_module_order_class( $render_slug );
		$order_number                   = esc_attr( preg_replace( '/[^0-9]/', '', esc_attr( $order_class ) ) );

		wp_enqueue_script( 'elicus-swiper-script' );
		wp_enqueue_style( 'elicus-swiper-style' );

		$arrow_font_size_values = et_pb_responsive_options()->get_property_values( $this->props, 'arrow_font_size' );
		if ( ! empty( array_filter( $arrow_font_size_values ) ) ) {
			et_pb_responsive_options()->generate_responsive_css( $arrow_font_size_values, '%%order_class%% .swiper-button-prev::after', 'font-size', $render_slug, '', 'type' );
			et_pb_responsive_options()->generate_responsive_css( $arrow_font_size_values, '%%order_class%% .swiper-button-next::after', 'font-size', $render_slug, '', 'type' );
		}

		if ( '' !== $slide_image_width ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-slide img',
					'declaration' => sprintf( 'width: %1$s;', esc_attr( $slide_image_width ) ),
				)
			);
		}

		if ( '' !== $slide_image_height ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-slide',
					'declaration' => sprintf( 'min-height: %1$s;', esc_attr( $slide_image_height ) ),
				)
			);
		}

		if ( '' !== $arrow_color ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-button-prev::after, %%order_class%% .swiper-button-next::after',
					'declaration' => sprintf( 'color: %1$s;', esc_attr( $arrow_color ) ),
				)
			);
		}

		if ( '' !== $arrow_color_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%:hover .swiper-button-prev::after, %%order_class%%:hover .swiper-button-next::after',
					'declaration' => sprintf( 'color: %1$s;', esc_attr( $arrow_color_hover ) ),
				)
			);
		}

		if ( 'on' === $use_arrow_background ) {
			if ( '' !== $arrow_background_color ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-button-prev::after, %%order_class%% .swiper-button-next::after',
						'declaration' => sprintf( 'background: %1$s;', esc_attr( $arrow_background_color ) ),
					)
				);
			}

			if ( '' !== $arrow_background_color_hover ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%%:hover .swiper-button-prev::after, %%order_class%%:hover .swiper-button-next::after',
						'declaration' => sprintf( 'background: %1$s;', esc_attr( $arrow_background_color_hover ) ),
					)
				);
			}

			if ( '' !== $arrow_background_border_size ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-button-prev::after, %%order_class%% .swiper-button-next::after',
						'declaration' => sprintf( 'border-width: %1$s;', esc_attr( $arrow_background_border_size ) ),
					)
				);
			}

			if ( '' !== $arrow_shape_border_color ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-button-prev::after, %%order_class%% .swiper-button-next::after',
						'declaration' => sprintf( 'border-color: %1$s;', esc_attr( $arrow_shape_border_color ) ),
					)
				);
			}

			if ( '' !== $arrow_shape_border_color_hover ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%%:hover .swiper-button-prev::after, %%order_class%%:hover .swiper-button-next::after',
						'declaration' => sprintf( 'border-color: %1$s;', esc_attr( $arrow_shape_border_color_hover ) ),
					)
				);
			}
		}

		if ( 'on' === $show_control ) {
			if ( '' !== $control_dot_inactive_color ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-pagination-bullet',
						'declaration' => sprintf( 'background: %1$s;', esc_attr( $control_dot_inactive_color ) ),
					)
				);
			}

			if ( '' !== $control_dot_active_color ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-pagination-bullet.swiper-pagination-bullet-active',
						'declaration' => sprintf( 'background: %1$s;', esc_attr( $control_dot_active_color ) ),
					)
				);
			}
		}

		$output = sprintf(
			'<div class="dipl_logo_slider_wrapper dipl_slide_%2$s"><div class="swiper-container"><div class="swiper-wrapper">%1$s</div></div></div>',
			$this->content,
			$slide_alignment
		);
		if ( 'on' === $show_arrow && 'on' === $show_arrow_on_hover ) {
			$output .= sprintf( '<div class="swiper-button-next arrow_on_hover"></div><div class="swiper-button-prev arrow_on_hover"></div>' );
		} elseif ( 'on' === $show_arrow && 'off' === $show_arrow_on_hover ) {
			$output .= sprintf( '<div class="swiper-button-next"></div><div class="swiper-button-prev"></div>' );
		}
		if ( 'on' === $show_control ) {
			$output .= sprintf( '<div class="swiper-pagination"></div>' );
		}

		$script = $this->el_render_logo_slider_script( $order_class, $order_number, $this->props );
		return $output . $script;
	}

	/**
	 * This function dynamically creates script parameters according to the user settings
	 *
	 * @param string  $order_class order class of module.
	 * @param integer $order_number order number of module.
	 * @param array   $props module setting values.
	 * @return string
	 * */
	public function el_render_logo_slider_script( $order_class, $order_number, $props ) {
		$order_class     	= $this->get_module_order_class( 'dipl_logo_slider' );
		$show_arrow          = esc_attr( $props['show_arrow'] );
		$show_control        = esc_attr( $props['show_control_dot'] );
		$loop                = esc_attr( $props['slider_loop'] );
		$autoplay            = esc_attr( $props['autoplay'] );
		$autoplay_speed      = (int) esc_attr( $props['autoplay_speed'] );
		$transition_duration = (int) esc_attr( $props['transition_duration'] );
		$pause_on_hover      = esc_attr( $props['pause_on_hover'] );
		$logo_per_slide      = esc_attr( $props['logo_per_slide'] );

		$logo_per_view        = $logo_per_slide;
		$logo_per_view_ipad   = ( 4 > $logo_per_slide ) ? $logo_per_slide : 3;
		$logo_per_view_mobile = 1;
		$logo_space_between   = 15;

		$autoplay_speed      = '' !== $autoplay_speed ? $autoplay_speed : 3000;
		$transition_duration = '' !== $transition_duration ? $transition_duration : 1000;
		$loop_param          = ( 'on' === $loop ) ? 'true' : 'false';

		if ( 'on' === $show_arrow ) {
			$show_arrow = "{    
                                nextEl: '." . esc_attr( $order_class ) . " .swiper-button-next',
                    			prevEl: '." . esc_attr( $order_class ) . " .swiper-button-prev',
                            }";
		} else {
			$show_arrow = 'false';
		}

		if ( 'on' === $show_control ) {
			$show_control = "{
                        el: '." . esc_attr( $order_class ) . " .swiper-pagination',
                        clickable: true,
                    }";
		} else {
			$show_control = 'false';
		}

		if ( 'on' === $autoplay ) {
			if ( 'on' === $pause_on_hover ) {
				$autoplay_param = '{
                                delay:' . $autoplay_speed . ',
                                disableOnInteraction: true,
                            }';
			} else {
				$autoplay_param = '{
	                                delay:' . $autoplay_speed . ',
	                                disableOnInteraction: false,
	                            }';
			}
		} else {
			$autoplay_param = 0;
		}

		$script  = '<script>';
		$script .= 'jQuery(function($) {';
		$script .= 'var ' . esc_attr( $order_class ) . '_swiper = new Swiper(\'.' . esc_attr( $order_class ) . ' .swiper-container\', {
                            slidesPerView: ' . $logo_per_view . ',
                            autoplay: ' . $autoplay_param . ',
                            spaceBetween: ' . $logo_space_between . ',
                            speed: ' . $transition_duration . ',
                            loop: ' . $loop_param . ',
                            pagination: ' . $show_control . ',
                            navigation: ' . $show_arrow . ',
                            grabCursor: \'true\',
                            breakpoints: {
                            	1080: {
		                          slidesPerView: ' . $logo_per_view . ',
		                          spaceBetween: ' . $logo_space_between . '
		                        },
		                        767: {
		                          slidesPerView: ' . $logo_per_view_ipad . ',
		                          spaceBetween: ' . $logo_space_between . '
		                        },
		                        0: {
		                          slidesPerView: ' . $logo_per_view_mobile . ',
		                          spaceBetween: ' . $logo_space_between . '
		                        }
		                    },
                    });';


		if ( 'on' === $pause_on_hover && 'on' === $autoplay ) {
			$script .= 'jQuery(".' . esc_attr( $order_class ) . ' .swiper-container").on("mouseenter", function(e) {
							if ( typeof ' . esc_attr( $order_class ) . '_swiper.autoplay.stop === "function" ) {
								' . esc_attr( $order_class ) . '_swiper.autoplay.stop();
							}
                        });';
            $script .= 'jQuery(".' . esc_attr( $order_class ) . ' .swiper-container").on("mouseleave", function(e) {
        					if ( typeof ' . esc_attr( $order_class ) . '_swiper.autoplay.start === "function" ) {
                            	' . esc_attr( $order_class ) . '_swiper.autoplay.start();
                            }
                        });';
		}

		if ( 'on' !== $loop ) {
			$script .=  esc_attr( $order_class ) . '_swiper.on(\'reachEnd\', function(){
                            ' . esc_attr( $order_class ) . '_swiper.autoplay = false;
                        });';
		}

		$script .= '});</script>';

		return $script;
	}

	public function add_new_child_text() {
		return esc_html__( 'Add New Logo', 'divi-plus' );
	}
}

$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
    $modules = explode( ',', $plugin_options['dipl-modules'] );
    if ( in_array( 'dipl_logo_slider', $modules ) ) {
        new DIPL_LogoSlider();
    }
} else {
    new DIPL_LogoSlider();
}