<?php

class DSM_Star_Rating extends ET_Builder_Module {

	public $slug       = 'dsm_star_rating';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name      = esc_html__( 'Supreme Star Rating', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path = plugin_dir_path( __FILE__ ) . 'icon.svg';
		// Toggle settings
		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Rating', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'stars' => esc_html__( 'Stars', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'          => array(
				'header'        => array(
					'label'           => esc_html__( 'Title', 'dsm-supreme-modules-pro-for-divi' ),
					'css'             => array(
						'main' => '%%order_class%% h1.et_pb_module_header, %%order_class%% h2.et_pb_module_header, %%order_class%% h3.et_pb_module_header, %%order_class%% h4.et_pb_module_header, %%order_class%% h5.et_pb_module_header, %%order_class%% h6.et_pb_module_header',
					),
					'font_size'       => array(
						'default' => '18px',
					),
					'line_height'     => array(
						'default' => '1em',
					),
					'letter_spacing'  => array(
						'default' => '0px',
					),
					'header_level'    => array(
						'default' => 'h4',
					),
					'hide_text_align' => true,
				),
				'rating_number' => array(
					'label'           => esc_html__( 'Rating Number', 'dsm-supreme-modules-pro-for-divi' ),
					'css'             => array(
						'main' => '%%order_class%% .dsm-star-rating-text',
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
				),
			),
			'text'           => array(
				'use_text_orientation'  => true,
				'use_background_layout' => true,
				'css'                   => array(
					'text_shadow' => '%%order_class%% .dsm-star-rating-title',
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
					'main' => '%%order_class%%',
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
			),
			'box_shadow'     => array(
				'default' => array(
					'css' => array(
						'main' => '%%order_class%%',
					),
				),
			),
		);
	}

	static function get_starrating( $args = array() ) {
		$defaults = array(
			'rating_scale' => '',
			'rating'       => '',
			'show_number'  => '',
		);

		$args = wp_parse_args( $args, $defaults );

		$int_rating               = (int) $args['rating'];
		$stars_rating_html_output = '';

		for ( $stars = 1; $stars <= $args['rating_scale']; $stars++ ) {
			if ( $stars <= $int_rating ) {
				$stars_rating_html_output .= '<i class="dsm-star-full">☆</i>';
			} elseif ( $int_rating + 1 === $stars && $args['rating'] !== $int_rating ) {
				$stars_rating_html_output .= '<i class="dsm-star-' . ( $args['rating'] - $int_rating ) * 10 . '">☆</i>';
			} else {
				$stars_rating_html_output .= '<i class="dsm-star-empty">☆</i>';
			}
		}

		if ( 'on' === $args['show_number'] ) {
			$stars_rating_html_output .= ' <span class="dsm-star-rating-text">(' . $int_rating . '/' . $args['rating_scale'] . ')</span>';
		}

		return $stars_rating_html_output;
	}

	public function get_fields() {
		$et_accent_color = et_builder_accent_color();
		return array(
			'rating_scale'       => array(
				'label'            => esc_html__( 'Rating Scale', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'default'          => '5',
				'options'          => array(
					'5'  => esc_html__( '0 - 5', 'dsm-supreme-modules-pro-for-divi' ),
					'10' => esc_html__( '0 - 10', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'main_content',
				'computed_affects' => array(
					'__starrating',
				),
			),
			'rating'             => array(
				'label'            => esc_html__( 'Rating', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'option_category'  => 'basic_option',
				'default'          => '5',
				'default_on_front' => '5',
				'toggle_slug'      => 'main_content',
				'computed_affects' => array(
					'__starrating',
				),
				'dynamic_content'  => 'text',
			),
			'title'              => array(
				'label'           => esc_html__( 'Title', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'main_content',
				'dynamic_content' => 'text',
			),
			'title_gap'          => array(
				'label'            => esc_html__( 'Gap', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'layout',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'header',
				'mobile_options'   => true,
				'validate_unit'    => true,
				'default'          => '7px',
				'default_unit'     => 'px',
				'default_on_front' => '',
				'allow_empty'      => false,
				'responsive'       => true,
				'description'      => esc_html__( 'Here you can define a gap between the title and the star rating', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'stars_display_type' => array(
				'label'            => esc_html__( 'Display Type', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'layout',
				'options'          => array(
					'inline-block' => esc_html__( 'Inline', 'dsm-supreme-modules-pro-for-divi' ),
					'block'        => esc_html__( 'Stacked', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'inline-block',
				'toggle_slug'      => 'main_content',
			),
			'stars_size'         => array(
				'label'           => esc_html__( 'Size', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'stars',
				'mobile_options'  => true,
				'validate_unit'   => true,
				'default'         => '14px',
				'default_unit'    => 'px',
				'allow_empty'     => false,
				'responsive'      => true,
			),
			'stars_gap'          => array(
				'label'            => esc_html__( 'Gap', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'layout',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'stars',
				'mobile_options'   => true,
				'validate_unit'    => true,
				'default'          => '0',
				'default_unit'     => 'px',
				'default_on_front' => '',
				'allow_empty'      => true,
				'responsive'       => true,
				'description'      => esc_html__( 'Here you can define a gap between each star', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'stars_color'        => array(
				'label'        => esc_html__( 'Stars Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'default'      => '#f0ad4e',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'stars',
				'hover'        => 'tabs',
			),
			'show_number'        => array(
				'label'            => esc_html__( 'Show Rating Number', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'et_builder' ),
					'off' => esc_html__( 'No', 'et_builder' ),
				),
				'description'      => esc_html__( 'This will display the rating number after the stars.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'      => 'main_content',
				'computed_affects' => array(
					'__starrating',
				),
			),
			'__starrating'       => array(
				'type'                => 'computed',
				'computed_callback'   => array( 'DSM_Star_Rating', 'get_starrating' ),
				'computed_depends_on' => array(
					'rating_scale',
					'rating',
					'show_number',
				),
			),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		$title                  = $this->props['title'];
		$title_gap              = $this->props['title_gap'];
		$title_gap_tablet       = $this->props['title_gap_tablet'];
		$title_gap_phone        = $this->props['title_gap_phone'];
		$title_gap_last_edited  = $this->props['title_gap_last_edited'];
		$rating_scale           = (int) $this->props['rating_scale'];
		$rating                 = (float) $this->props['rating'];
		$show_number            = $this->props['show_number'];
		$stars_display_type     = $this->props['stars_display_type'];
		$stars_size             = $this->props['stars_size'];
		$stars_size_tablet      = $this->props['stars_size_tablet'];
		$stars_size_phone       = $this->props['stars_size_phone'];
		$stars_size_last_edited = $this->props['stars_size_last_edited'];
		$stars_color            = $this->props['stars_color'];
		$stars_gap              = $this->props['stars_gap'];
		$stars_gap_tablet       = $this->props['stars_gap_tablet'];
		$stars_gap_phone        = $this->props['stars_gap_phone'];
		$stars_gap_last_edited  = $this->props['stars_gap_last_edited'];
		$background_layout      = $this->props['background_layout'];
		$header_level           = $this->props['header_level'];

		$stars_output = self::get_starrating(
			array(
				'rating_scale' => $rating_scale,
				'rating'       => $rating,
				'show_number'  => $show_number,
			)
		);

		if ( '' !== $title ) {
			$title = sprintf(
				'<%1$s class="dsm-star-rating-title et_pb_module_header">%2$s</%1$s>',
				et_pb_process_header_level( $header_level, 'h4' ),
				$title
			);
		}

		if ( 'inline-block' === $stars_display_type ) {
			if ( '' !== $title_gap_tablet || '' !== $title_gap_phone || '7px' !== $title_gap ) {
				$title_gap_responsive_active = et_pb_get_responsive_status( $title_gap_last_edited );

				$title_gap_values = array(
					'desktop' => $title_gap,
					'tablet'  => $title_gap_responsive_active ? $title_gap_tablet : '',
					'phone'   => $title_gap_responsive_active ? $title_gap_phone : '',
				);
				et_pb_responsive_options()->generate_responsive_css( $title_gap_values, '%%order_class%% .dsm-star-rating-title', 'margin-right', $render_slug );
			}
		} else {
			if ( '' !== $title_gap_tablet || '' !== $title_gap_phone || '7px' !== $title_gap ) {
				$title_gap_responsive_active = et_pb_get_responsive_status( $title_gap_last_edited );

				$title_gap_values = array(
					'desktop' => $title_gap,
					'tablet'  => $title_gap_responsive_active ? $title_gap_tablet : '',
					'phone'   => $title_gap_responsive_active ? $title_gap_phone : '',
				);
				et_pb_responsive_options()->generate_responsive_css( $title_gap_values, '%%order_class%% .dsm-star-rating-title', 'margin-bottom', $render_slug );
			}
		}

		if ( '' !== $stars_size_tablet || '' !== $stars_size_phone || '14px' !== $stars_size ) {
			$stars_size_responsive_active = et_pb_get_responsive_status( $stars_size_last_edited );

			$stars_size_values = array(
				'desktop' => $stars_size,
				'tablet'  => $stars_size_responsive_active ? $stars_size_tablet : '',
				'phone'   => $stars_size_responsive_active ? $stars_size_phone : '',
			);
			et_pb_responsive_options()->generate_responsive_css( $stars_size_values, '%%order_class%% .dsm-star-rating', 'font-size', $render_slug );
		}

		if ( '' !== $stars_gap_tablet || '' !== $stars_gap_phone || '' !== $stars_gap ) {
			$stars_gap_responsive_active = et_pb_get_responsive_status( $stars_gap_last_edited );

			$stars_gap_values = array(
				'desktop' => $stars_gap,
				'tablet'  => $stars_gap_responsive_active ? $stars_gap_tablet : '',
				'phone'   => $stars_gap_responsive_active ? $stars_gap_phone : '',
			);
			et_pb_responsive_options()->generate_responsive_css( $stars_gap_values, '%%order_class%% .dsm-star-rating i:not(:last-of-type)', 'margin-right', $render_slug );
		}

		if ( '#f0ad4e' !== $stars_color ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-star-rating, %%order_class%% .dsm-star-rating i:before',
					'declaration' => sprintf(
						'color: %1$s;',
						esc_html( $stars_color )
					),
				)
			);
		}

		$this->add_classname(
			array(
				$this->get_text_orientation_classname(),
				"et_pb_bg_layout_{$background_layout}",
			)
		);

		// Render module content
		$output = sprintf(
			'<div class="dsm-star-rating-wrapper dsm-star-display-type-%5$s">
				%1$s
				<div class="dsm-star-rating" itemtype="http://schema.org/Rating" title="%2$s/%3$s" itemscope="" itemprop="reviewRating">
					%4$s
				</div>
			</div>',
			$title,
			esc_attr( $rating ),
			esc_attr( $rating_scale ),
			$stars_output,
			esc_attr( $stars_display_type )
		);

		return $output;
	}
}

new DSM_Star_Rating;
