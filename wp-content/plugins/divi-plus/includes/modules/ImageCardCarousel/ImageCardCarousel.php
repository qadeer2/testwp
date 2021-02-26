<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.6.4
 */
class DIPL_ImageCardCarousel extends ET_Builder_Module {
	public $slug       = 'dipl_image_card_carousel';
	public $child_slug = 'dipl_image_card_carousel_item';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name             = esc_html__( 'DP Image Card Carousel', 'divi-plus' );
		$this->child_item_text  = esc_html__( 'Image Card', 'divi-plus' );
		$this->main_css_element = '%%order_class%%';
	}

	public function get_settings_modal_toggles() {
		return array(
			'general'  => array(
				'toggles' => array(
					'main_content' => array(
						'title' => esc_html__( 'Slider', 'divi-plus' ),
					),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'text'  => array(
						'title' => esc_html__( 'Text', 'divi-plus' ),
					),
					'text_settings' => array(
						'title' => esc_html__( 'Title & Content', 'divi-plus' ),
						'sub_toggles'   => array(
                            'title' => array(
                                'name' => 'Title',
                            ),
                            'content' => array(
                                'name' => 'Content',
                            ),
                        ),
                        'tabbed_subtoggles' => true,
					),
					'slider_styles' => array(
						'title'    => esc_html__( 'Slider', 'divi-plus' ),
					),
				),
			),
		);
	}


	public function get_advanced_fields_config() {
		return array(
			'fonts' => array(
				'title' => array(
					'label'          => esc_html__( 'Title', 'divi-plus' ),
					'font_size'      => array(
						'default_on_front' => '16px',
						'range_settings'   => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'    => true,
					),
					'line_height'    => array(
						'default_on_front' => '1.2em',
						'range_settings'   => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'letter_spacing' => array(
						'default_on_front' => '0px',
						'range_settings'   => array(
							'min'  => '0',
							'max'  => '10',
							'step' => '1',
						),
						'validate_unit'    => true,
					),
					'header_level'  => array(
						'default'   => 'h4',
					),
					'css'            => array(
						'main' => '%%order_class%% .dipl_image_card_title',
					),
					'tab_slug' => 'advanced',
					'toggle_slug' => 'text_settings',
					'sub_toggle' => 'title',
				),
				'content' => array(
					'label'          => esc_html__( 'Content', 'divi-plus' ),
					'font_size'      => array(
						'default_on_front' => '14px',
						'range_settings'   => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'    => true,
					),
					'line_height'    => array(
						'default_on_front' => '1.5em',
						'range_settings'   => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'letter_spacing' => array(
						'default_on_front' => '0px',
						'range_settings'   => array(
							'min'  => '0',
							'max'  => '10',
							'step' => '1',
						),
						'validate_unit'    => true,
					),
					'css'            => array(
						'main' => '%%order_class%% .dipl_image_card_content',
					),
					'tab_slug' => 'advanced',
					'toggle_slug' => 'text_settings',
					'sub_toggle' => 'content',
				),
			),
			'borders' => array(
				'default' => array(
					'css' => array(
						'main' => array(
							'border_radii'  => $this->main_css_element,
							'border_styles' => $this->main_css_element,
						),
					),
				),
			),
			'box_shadow' => array(
				'default' => array(
					'css' => array(
						'main' => $this->main_css_element,
						'important' => 'all',
					),
				),
			),
			'background' => array(
				'css' => array(
					'main' => $this->main_css_element,
				),
			),
			'margin_padding' => array(
				'css' => array(
					'main'      => $this->main_css_element,
					'important' => 'all',
				),
			),
			'text' => array(
				'css' => array(
					'main' => '%%order_class%%',
				),
				'options'               => array(
					'text_orientation'  => array(
						'default' => 'left',
						'default_on_front' => 'left',
					),
				),
			),
			'filters'        => false,
			'link_options'   => false,
		);

	}

	public function get_fields() {
		return array(
			'slide_effect' => array(
				'label'           => esc_html__( 'Carousel Effect', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'slide'     => esc_html__( 'Slide', 'divi-plus' ),
					'cube'      => esc_html__( 'Cube', 'divi-plus' ),
					'coverflow' => esc_html__( 'Coverflow', 'divi-plus' ),
					'flip'      => esc_html__( 'Flip', 'divi-plus' ),
				),
				'default'         => 'slide',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can choose the slide animation effect.', 'divi-plus' ),
			),
			'cards_per_slide' => array(
				'label'           => esc_html__( 'Number of Cards Per View', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'1' => esc_html__( '1', 'divi-plus' ),
					'2' => esc_html__( '2', 'divi-plus' ),
					'3' => esc_html__( '3', 'divi-plus' ),
					'4' => esc_html__( '4', 'divi-plus' ),
					'5' => esc_html__( '5', 'divi-plus' ),
				),
				'default'         => '3',
				'show_if'         => array(
					'slide_effect' => 'slide',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can choose the number of cards to display per slide.', 'divi-plus' ),
			),
			'enable_coverflow_shadow' => array(
				'label'            => esc_html__( 'Enable Slide Shadow', 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default'          => 'off',
				'show_if'          => array(
					'slide_effect' => 'coverflow',
				),
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Enable Slide Shadow For Coverflow Effect.', 'divi-plus' ),
			),
			'coverflow_shadow_color' => array(
				'label'        	   => esc_html__( 'Shadow Color', 'divi-plus' ),
				'type'         	   => 'color-alpha',
				'custom_color' 	   => true,
				'show_if'          => array(
					'slide_effect' => 'coverflow',
					'enable_coverflow_shadow' => 'on',
				),
				'default'      	   => '#ccc',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Here you can select color for the Shadow.', 'divi-plus' ),
			),
			'coverflow_rotate' => array(
				'label'            => esc_html__( 'Coverflow Rotate', 'divi-plus' ),
				'type'             => 'range',
				'option_category'  => 'font_option',
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '360',
					'step' => '1',
				),
				'unitless'         => true,
				'show_if'          => array(
					'slide_effect' => 'coverflow',
				),
				'default'          => '40',
				'mobile_options'   => true,
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Coverflow Rotate Slide.', 'divi-plus' ),
			),
			'coverflow_depth' => array(
				'label'            => esc_html__( 'Coverflow Depth', 'divi-plus' ),
				'type'             => 'range',
				'option_category'  => 'font_option',
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '1000',
					'step' => '1',
				),
				'unitless'         => true,
				'show_if'          => array(
					'slide_effect' => 'coverflow',
				),
				'default'          => '100',
				'mobile_options'   => true,
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Coverflow Depth Slide.', 'divi-plus' ),
			),
			'slider_loop' => array(
				'label'            => esc_html__( 'Enable Loop', 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default'          => 'off',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Here you can enable loop for the slides.', 'divi-plus' ),
			),
			'autoplay' => array(
				'label'            => esc_html__( 'Autoplay', 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default'          => 'on',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'This controls the auto play of the card carousel.', 'divi-plus' ),
			),
			'autoplay_speed' => array(
				'label'            => esc_html__( 'Autoplay Delay', 'divi-plus' ),
				'type'             => 'text',
				'option_category'  => 'configuration',
				'default'          => '3000',
				'show_if'          => array(
					'autoplay' => 'on',
				),
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'This controls the time of the slide before the transition.', 'divi-plus' ),
			),
			'pause_on_hover' => array(
				'label'            => esc_html__( 'Pause On Hover', 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default'          => 'on',
				'show_if'          => array(
					'autoplay' => 'on',
				),
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Control for pausing slides on mouse hover.', 'divi-plus' ),
			),
			'slide_transition_duration' => array(
				'label'           => esc_html__( 'Transition Duration', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'default'         => '1000',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can specify the duration of transition for each slide in miliseconds.', 'divi-plus' ),
			),
			'show_arrow' => array(
				'label'            => esc_html__( 'Show Arrows', 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default'          => 'off',
				'default_on_front' => 'off',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Choose whether or not the previous & next arrows should be visible.', 'divi-plus' ),
			),
			'show_arrow_on_hover' => array(
				'label'            => esc_html__( 'Show Arrows On Hover', 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'show_if'          => array(
					'show_arrow' => 'on',
				),
				'default'          => 'off',
				'default_on_front' => 'off',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Choose whether or not the previous and next arrows should be visible.', 'divi-plus' ),
			),
			'show_control_dot' => array(
				'label'            => esc_html__( 'Show Dots Pagination', 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default'          => 'off',
				'default_on_front' => 'off',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'This setting will turn on and off the pagination of the slider.', 'divi-plus' ),
			),
			'control_dot_style' => array(
				'label'            => esc_html__( 'Dots Pagination Style', 'divi-plus' ),
				'type'             => 'select',
				'option_category'  => 'layout',
				'options'          => array(
					'solid_dot'       => esc_html__( 'Solid Dot', 'divi-plus' ),
					'transparent_dot' => esc_html__( 'Transparent Dot', 'divi-plus' ),
					'stretched_dot'   => esc_html__( 'Stretched Dot', 'divi-plus' ),
					'line'            => esc_html__( 'Line', 'divi-plus' ),
					'rounded_line'    => esc_html__( 'Rounded Line', 'divi-plus' ),
					'square_dot'      => esc_html__( 'Squared Dot', 'divi-plus' ),
				),
				'show_if'          => array(
					'show_control_dot' => 'on',
				),
				'default'          => 'solid_dot',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'control dot style', 'divi-plus' ),
			),
			'arrow_font_size' => array(
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
				'default'         => '24px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'slider_styles',
				'description'     => esc_html__( 'Here you can choose the arrow font size.', 'divi-plus' ),
			),
			'arrow_color' => array(
				'label'        => esc_html__( 'Arrow Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if'      => array(
					'show_arrow' => 'on',
				),
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'slider_styles',
				'description'  => esc_html__( 'Here you can define color for the arrow', 'divi-plus' ),
			),
			'control_dot_active_color' => array(
				'label'        	   => esc_html__( 'Active Dot Pagination Color', 'divi-plus' ),
				'type'         	   => 'color-alpha',
				'custom_color'     => true,
				'show_if'          => array(
					'show_control_dot' => 'on',
				),
				'default'      	   => '#000000',
				'tab_slug'     	   => 'advanced',
				'toggle_slug'  	   => 'slider_styles',
				'description'  	   => esc_html__( 'Here you can define color for the active pagination item.', 'divi-plus' ),
			),
			'control_dot_inactive_color' => array(
				'label'        	   => esc_html__( 'Inactive Dot Pagination Color', 'divi-plus' ),
				'type'         	   => 'color-alpha',
				'custom_color'     => true,
				'show_if'      	   => array(
					'show_control_dot' => 'on',
				),
				'default'      	   => '#cccccc',
				'tab_slug'     	   => 'advanced',
				'toggle_slug'  	   => 'slider_styles',
				'description'  	   => esc_html__( 'Here you can define color for the inactive pagination item.', 'divi-plus' ),
			),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {

		$slide_effect 						= $this->props['slide_effect'];
		$cards_per_slide					= $this->props['cards_per_slide'];
		$enable_coverflow_shadow 			= $this->props['enable_coverflow_shadow'];
		$coverflow_shadow_color 			= $this->props['coverflow_shadow_color'];
		$coverflow_rotate 					= $this->props['coverflow_rotate'];
		$coverflow_depth 					= $this->props['coverflow_depth'];
		$slider_loop 						= $this->props['slider_loop'];
		$autoplay 							= $this->props['autoplay'];
		$autoplay_speed 					= $this->props['autoplay_speed'];
		$pause_on_hover 					= $this->props['pause_on_hover'];
		$show_arrow 						= $this->props['show_arrow'];
		$show_arrow_on_hover 				= $this->props['show_arrow_on_hover'];
		$show_control_dot 					= $this->props['show_control_dot'];
		$control_dot_style 					= $this->props['control_dot_style'];
		$coverflow_shadow_color				= $this->props['coverflow_shadow_color'];
		$control_dot_active_color 			= $this->props['control_dot_active_color'];
		$control_dot_inactive_color 		= $this->props['control_dot_inactive_color'];
		$slide_transition_duration			= $this->props['slide_transition_duration'];
		$arrow_font_size					= $this->props['arrow_font_size'];
		$arrow_color						= $this->props['arrow_color'];

		if ( $this->content && '' !== $this->content ) {

			wp_enqueue_script( 'elicus-swiper-script' );
			wp_enqueue_style( 'elicus-swiper-style' );

			$carousel  = '<div class="dipl_image_card_carousel_layout ' . $control_dot_style . '">';
			$carousel .= '<div class="swiper-container">';
			$carousel .= '<div class="swiper-wrapper">';
			$carousel .= $this->content;
			$carousel .= '</div> <!-- swiper-wrapper -->';

			if ( 'on' === $show_arrow ) {
				$carousel .= '<div class="swiper-button-next"></div>';
				$carousel .= '<div class="swiper-button-prev"></div>';
			}

			$carousel .= '</div> <!-- swiper-container -->';

			if ( 'on' === $show_control_dot ) {
				$carousel .= '<div class="swiper-pagination"></div>';
			}

			$carousel .= '</div> <!-- dipl_image_card_carousel_layout -->';

			$script = $this->dipl_render_slider_script();

			$output = $carousel . $script;

			if( 'on' === $enable_coverflow_shadow ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-container-3d .swiper-slide-shadow-left',
						'declaration' => sprintf( 'background-image: linear-gradient(to left,%1$s,rgba(0,0,0,0));', esc_attr( $coverflow_shadow_color ) ),
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-container-3d .swiper-slide-shadow-right',
						'declaration' => sprintf( 'background-image: linear-gradient(to right,%1$s,rgba(0,0,0,0));', esc_attr( $coverflow_shadow_color ) ),
					)
				);
			} else {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-container-3d .swiper-slide-shadow-left, %%order_class%% .swiper-container-3d .swiper-slide-shadow-right',
						'declaration' => 'background-image: none;',
					)
				);
			}

			if ( 'on' === $show_control_dot ) {
				if ( $control_dot_inactive_color ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .swiper-pagination-bullet',
							'declaration' => sprintf( 'background: %1$s;', esc_attr( $control_dot_inactive_color ) ),
						)
					);

					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .transparent_dot .swiper-pagination-bullet',
							'declaration' => sprintf( 'border-color: %1$s;', esc_attr( $control_dot_inactive_color ) ),
						)
					);
				}

				if ( $control_dot_active_color ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .swiper-pagination-bullet.swiper-pagination-bullet-active',
							'declaration' => sprintf( 'background: %1$s;', esc_attr( $control_dot_active_color ) ),
						)
					);
				}

				if ( 'stretched_dot' === $control_dot_style && $slide_transition_duration ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .stretched_dot .swiper-pagination-bullet',
							'declaration' => sprintf( 'transition: all %1$sms ease;', intval( $slide_transition_duration ) ),
						)
					);
				}
			}

			if ( 'on' === $show_arrow ) {
				if ( $arrow_color ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .swiper-button-prev, %%order_class%% .swiper-button-next',
							'declaration' => sprintf( 'color: %1$s;', esc_attr( $arrow_color ) ),
						)
					);
				}

				if ( $arrow_font_size ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .swiper-button-prev::after, %%order_class%% .swiper-button-next::after',
							'declaration' => sprintf( 'font-size: %1$s;', esc_attr( $arrow_font_size ) ),
						)
					);
				}

				if ( 'on' === $show_arrow_on_hover ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .swiper-button-prev',
							'declaration' => 'visibility: hidden; opacity: 0; transform: translateX(40px); transition: all 300ms ease;',
						)
					);
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .swiper-button-next',
							'declaration' => 'visibility: hidden; opacity: 0; transform: translateX(-40px); transition: all 300ms ease;',
						)
					);
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .swiper-container:hover .swiper-button-prev, %%order_class%% .swiper-container:hover .swiper-button-next',
							'declaration' => 'visibility: visible; opacity: 1; transform: translateX(0);',
						)
					);
				}
			}	

		} else {
			$output  = '<div class="entry">';
			$output  = '<h1>' . esc_html__( 'No Result Found!', 'divi-plus' ) . '</h1>';
			$output .= '<p>' . esc_html__( 'The carousel you requested could not be found. Try changing your module settings or add some new cards.', 'divi-plus' ) . '</p>';
			$output .= '</div>';
		}

		$this->add_classname(
			array(
				$this->get_text_orientation_classname(),
			)
		);
		
		return et_core_intentionally_unescaped( $output, 'html' );
	}

	/**
	 * This function dynamically creates script parameters according to the user settings
	 *
	 * @return string
	 * */
	public function dipl_render_slider_script() {
		$order_class     			= $this->get_module_order_class( 'dipl_image_card_carousel' );
		$slide_effect          		= esc_attr( $this->props['slide_effect'] );
		$show_arrow            		= esc_attr( $this->props['show_arrow'] );
		$show_control_dot          	= esc_attr( $this->props['show_control_dot'] );
		$loop                  		= esc_attr( $this->props['slider_loop'] );
		$autoplay              		= esc_attr( $this->props['autoplay'] );
		$autoplay_speed        		= intval( $this->props['autoplay_speed'] );
		$transition_duration  		= intval( $this->props['slide_transition_duration'] );
		$pause_on_hover        		= esc_attr( $this->props['pause_on_hover'] );
		$cards_per_slide 			= esc_attr( $this->props['cards_per_slide'] );
		$enable_coverflow_shadow 	= 'on' === $this->props['enable_coverflow_shadow'] ? 'true' : 'false';
		$coverflow_rotate 	   		= intval( $this->props['coverflow_rotate'] );
		$coverflow_depth 	   		= intval( $this->props['coverflow_depth'] );

		if ( 'slide' === $slide_effect && $cards_per_slide ) {
			$cards_per_view        = $cards_per_slide;
			$cards_per_view_ipad   = $cards_per_slide < 3 ? $cards_per_slide : 2;
			$cards_per_view_mobile = 1;
			$cards_space_between   = 20;
		} else if ( 'coverflow' === $slide_effect ) {
			$cards_per_view        = 3;
			$cards_per_view_ipad   = 3;
			$cards_per_view_mobile = 1;
			$cards_space_between   = 20;
		} else {
			$cards_per_view        = 1;
			$cards_per_view_ipad   = 1;
			$cards_per_view_mobile = 1;
			$cards_space_between   = 0;
		}

		$autoplay_speed      	= '' !== $autoplay_speed || 0 !== $autoplay_speed ? $autoplay_speed : 3000;
		$transition_duration 	= '' !== $transition_duration || 0 !== $transition_duration ? $transition_duration : 1000;
		$loop          			= 'on' === $loop ? 'true' : 'false';
		$arrows 				= 'false';
		$dots 					= 'false';
		$autoplaySlides			= 0;
		$cube 					= 'false';
		$coverflow 				= 'false';

		if ( 'on' === $show_arrow ) {
			$arrows = "{    
                            nextEl: '." . esc_attr( $order_class ) . " .swiper-button-next',
                            prevEl: '." . esc_attr( $order_class ) . " .swiper-button-prev',
                    }";
		}

		if ( 'on' === $show_control_dot ) {
			$dots = "{
                        el: '." . esc_attr( $order_class ) . " .swiper-pagination',
                        clickable: true,
                    }";
		}

		if ( 'on' === $autoplay ) {
			if ( 'on' === $pause_on_hover ) {
				$autoplaySlides = '{
                                delay:' . $autoplay_speed . ',
                                disableOnInteraction: true,
                            }';
			} else {
				$autoplaySlides = '{
                                delay:' . $autoplay_speed . ',
                                disableOnInteraction: false,
                            }';
			}
		}

		if ( 'cube' === $slide_effect ) {
			$cube = '{
                        shadow: false,
                        slideShadows: false,
                    }';
		}

		if ( 'coverflow' === $slide_effect ) {
			$coverflow = '{
                            rotate: ' . $coverflow_rotate . ',
                            stretch: 0,
                            depth: ' . $coverflow_depth . ',
                            modifier: 1,
                            slideShadows : ' . $enable_coverflow_shadow . ',
                        }';
		} 

		$script  = '<script type="text/javascript">';
		$script .= 'jQuery(function($) {';
		$script .= 'var ' . esc_attr( $order_class ) . '_swiper = new Swiper(\'.' . esc_attr( $order_class ) . ' .swiper-container\', {
                            slidesPerView: ' . $cards_per_view . ',
                            autoplay: ' . $autoplaySlides . ',
                            spaceBetween: ' . $cards_space_between . ',
                            effect: "' . $slide_effect . '",
                            cubeEffect: ' . $cube . ',
                            coverflowEffect: ' . $coverflow . ',
                            speed: ' . $transition_duration . ',
                            loop: ' . $loop . ',
                            pagination: ' . $dots . ',
                            navigation: ' . $arrows . ',
                            grabCursor: \'true\',
                            breakpoints: {
                            	1080: {
		                          slidesPerView: ' . $cards_per_view . ',
		                          spaceBetween: ' . $cards_space_between . '
		                        },
		                        767: {
		                          slidesPerView: ' . $cards_per_view_ipad . ',
		                          spaceBetween: ' . $cards_space_between . '
		                        },
		                        0: {
		                          slidesPerView: ' . $cards_per_view_mobile . ',
		                          spaceBetween: ' . $cards_space_between . '
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

		if ( 'true' !== $loop ) {
			$script .=  esc_attr( $order_class ) . '_swiper.on(\'reachEnd\', function(){
                            ' . esc_attr( $order_class ) . '_swiper.autoplay = false;
                        });';
		}

		$script .= '});</script>';

		return $script;
	}

}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
	$modules = explode( ',', $plugin_options['dipl-modules'] );
	if ( in_array( 'dipl_image_card_carousel', $modules, true ) ) {
		new DIPL_ImageCardCarousel();
	}
} else {
	new DIPL_ImageCardCarousel();
}